<?php

class AccountController extends core\Controller
{
    public $view;

    function index()
    {
        $this->view = "Available Methods:";
        echo $this->view;
    }

    function register()
    {
        echo
        $userRegisterModel = new UserRegisterModel();
    }

    function login()
    {
        $this->view = "Login action of Account Controller";
        echo $this->view;
    }

    function logout()
    {
        $this->view = "Logout action of Account Controller";
        echo $this->view;
    }

    function getUserInfo()
    {
        $this->view = "getUserInfo action of Account Controller";
        echo $this->view;
    }

    function editUserInfo()
    {
        $this->view = "editUserInfo action of Account Controller";
        echo $this->view;
    }
}
