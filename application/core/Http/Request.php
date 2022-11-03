<?php

namespace core\Http;
class Request {
    public $cookie;
    public $request;
    public $files;

    public function __construct() {
        $this->request = $_REQUEST;
        $this->cookie = $_COOKIE;
        $this->files = $_FILES;
    }

    public function get(String $key = '') { // Get $_GET parameter
        if ($key != '')
            return $_GET[$key] ?? null;
        return  $_GET;
    }

    public function post(String $key = '') { // Get $_POST parameter
        if ($key != '')
            return $_POST[$key] ?? null;
        return  $_POST;
    }

    /**
     *  Get POST parameter
     *
     * @param String $key
     * @return string
     */
    public function input(String $key = '') {
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata, true);

        if ($key != '') {
            return $request[$key] ?? null;
        }
        return ($request);
    }

    /**
     *  Get value for server super global var
     *
     * @param String $key
     * @return string
     */
    public function server(String $key = ''): string
    {
        return $_SERVER[strtoupper($key)] ?? json_encode($_SERVER);
    }

    public function getMethod(): string
    { // Get HTTP Method of request
        return strtoupper($this->server('REQUEST_METHOD'));
    }

    public function getClientIp(): string
    { // Returns the client IP addresses
        return $this->server('REMOTE_ADDR');
    }

    public function getURI(): string
    {  // Get route after URL. E.g. www.example.com/<route which it returns>
        return $this->server('REQUEST_URI');
    }
}
