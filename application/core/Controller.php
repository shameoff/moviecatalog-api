<?php

namespace core;

class Controller
{
    public $request;
    public $response;
    private $service;
    private $dbAdapter;

    public function __construct()
    {
        $this->request = $GLOBALS['request'];
        $this->response = $GLOBALS['response'];
        $this->view = "Default View of ControllerClass";
    }

}