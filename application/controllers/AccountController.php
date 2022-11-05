<?php

namespace controllers;

use core\Controller;
use models\LoginModel;
use models\UserRegisterModel;

class AccountController extends Controller
{
    private $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new \services\AccountService();
    }

    function index()
    {
        echo "Available Methods:";
    }

    function register()
    {
        $req_data = $this->request->input();

        $userRegisterModel = new UserRegisterModel(
            $req_data["email"],
            $req_data["name"],
            $req_data["password"],
            $req_data["userName"],
            $req_data["birthDate"],
            $req_data["gender"]
        );
        $this->service->register($userRegisterModel);
    }

    function login()
    {
        $req_data = $this->request->input();

        $loginModel = new LoginModel($req_data["username"], $req_data["password"]);
        $this->service->login($loginModel);

        echo "Login action of Account Controller";
    }

    function logout()
    {
        $this->service->logout();
        echo "Logout action of Account Controller";
    }

    function getUserInfo()
    {
        $this->view = "getUserInfo action of Account Controller";
        echo "getUserInfo action of Account Controller";
    }

    function editUserInfo()
    {
        $this->view = "editUserInfo action of Account Controller";
        echo "editUserInfo action of Account Controller";
    }
}
