<?php

namespace core\router;

use Error;
use Exception;

class Router {

    private array $router = []; // list of routes

    private array $matchRouter = []; // list of found routes with current url and method

    private string $url;

    private string $http_method;

    private array $params = [];

    public function __construct(string $url, string $method) {
        $this->url = $url;
        $this->http_method = $method;
    }

    public function get($pattern, $callback): void
    {
        $this->router[] = new Route("GET", $pattern, $callback);
    }

    public function post($pattern, $callback): void
    {
        $this->router[] = new Route('POST', $pattern, $callback);
    }

    public function put($pattern, $callback): void
    {
        $this->router[] = new Route('PUT', $pattern, $callback);
    }

    public function delete($pattern, $callback): void
    {
        $this->router[] = new Route('DELETE', $pattern, $callback);
    }



    /**
     *  filter requests by http method
     */
    private function findRoute(): void
    {
        $temp = [];
        // filter available routes by current route's method
        foreach ($this->router as $route) {
            if (strtoupper($this->http_method) == $route->getMethod())
                $temp[] = $route;
        }
        // filter the remaining routes by their url
        foreach ($temp as $route) {
            if ($this->dispatch($this->url, $route->getPattern()))
                $this->matchRouter[] = $route;
        }
    }

    /**
     *  dispatch url and pattern
     */
    public function dispatch($uri, $pattern): bool
    {
        $parsUrl = explode('?', $uri);
        $url = $parsUrl[0];

        preg_match_all('@:(\w+)@', $pattern, $params, PREG_PATTERN_ORDER);

        $patternAsRegex = preg_replace_callback('@:(\w+)@', [$this, 'convertPatternToRegex'], $pattern);

        if (str_ends_with($pattern, '/')) {
            $patternAsRegex = $patternAsRegex . '?';
        }
        $patternAsRegex = '@^' . $patternAsRegex . '$@';

        // check match request url
        if (preg_match($patternAsRegex, $url, $paramsValue)) {
            array_shift($paramsValue);
            foreach ($params[0] as $key => $value) {
                $val = substr($value, 1);
                if ($paramsValue[$val]) {
                    $this->setParams($val, urlencode($paramsValue[$val]));
                }
            }

            return true;
        }

        return false;
    }

    public function getRouter(): array
    {
        return $this->router;
    }

    /**
     * Convert Pattern To Regex
     */
    private function convertPatternToRegex($matches): string
    {
        $key = str_replace(':', '', $matches[0]);
        return '(?P<' . $key . '>[a-zA-Z0-9_\-\.\!\~\*\\\'\(\)\:\@\&\=\$\+,%]+)';
    }

    /**
     *  run application
     */
    public function run(): void
    {
        if (empty($this->router))
            throw new Exception('NON-Object Route Set');

        $this->findRoute();

        if (empty($this->matchRouter)) {
            $this->sendNotFound();
        } elseif (count($this->matchRouter) > 1){
            throw new Error("Too many found routes, fix the config!");
        } else {
                $this->runController($this->matchRouter[0]->getCallback(), $this->params);
        }
    }

    /**
     * run as controller
     */
    private function runController($controller, $params): void
    {
        $parts = explode('@', $controller);
        $file = CONTROLLERS_DIR . ucfirst($parts[0]) . 'Controller.php';

        if (file_exists($file)) {
            require_once($file);

            // controller class
            $controller = "\\controllers\\" . ucfirst($parts[0]) . "Controller";

            if (class_exists( $controller))
                $controller = new $controller();
            else
                $this->sendNotFound();

            // set function in controller
            if (isset($parts[1])) {
                $method = $parts[1];

                if (!method_exists($controller, $method))
                    $this->sendNotFound();

            } else {
                $method = 'index';
            }

            // call to controller
            if (is_callable([$controller, $method])) {
                call_user_func([$controller, $method], $params);
            }
            else
                $this->sendNotFound();
        }
    }

    private function sendNotFound(): void
    {
        http_response_code(404);
        echo "Not Found";
    }
}