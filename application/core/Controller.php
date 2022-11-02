<?php

namespace core;

class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = "Default Controller View";
    }

    function action_index()
    {
    }
}