<?php

namespace core;

class Controller
{
    public $request;
    public $response;

    public $model;
    public $view;

    private $dbAdapter;

    public function __construct()
    {
        $this->request = $GLOBALS['request'];
        $this->response = $GLOBALS['response'];
        $this->dbAdapter = new DatabaseAdapter();
        $this->view = "Default View of ControllerClass";
    }
    function action_index()
    {
    }
}