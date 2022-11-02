<?php

namespace core\router;

class Route {

    private string $method; // Http Method

    private string $pattern; // path to this route

    private mixed $callback; // action or controller which point to

    private array $list_method = ['GET', 'POST', 'PUT', 'DELETE', 'HEAD']; // List of allowed Http methods

    private array $variables = [];

    public function __construct(String $method, String $pattern, $callback) {
        $this->method = $this->validateMethod(strtoupper($method));
        $this->pattern = $pattern;
//        $this->pattern = $this->processVariables($pattern);
        $this->callback = $callback;
    }

    private function validateMethod(string $method): string {
        if (in_array(strtoupper($method), $this->list_method))
            return $method;
        throw \Error('Invalid Method Name');
    }

    /**
     * If in pattern of Route was variable, write it in $variables array and change part of pattern to regex
     * @param string $pattern
     * @return string
     */
    public function processVariables(string $pattern): string{
        preg_match('/\{[A-Za-z_][_A-Za-z0-9]*}/', $pattern, $matches);
        foreach ($matches as $variable){
            $this->variables[] = str_replace(["{", "}"], "", $variable); // write in variables without "{" and "}"
            $pattern = str_replace($variable, '/[A-Za-z_][_A-Za-z0-9]*/', $pattern);
        }
        return $pattern;
    }


    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPattern(): string
    {
        return $this->pattern;
    }

    public function getCallback() {
        return $this->callback;
    }
}