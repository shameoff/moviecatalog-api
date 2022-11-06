<?php

namespace controllers;

use core\Controller;
use core\Http\Response;
use core\Service;
use models\LoginModel;
use models\UserRegisterModel;

class AccountController extends Controller
{
    private Service $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new \services\AccountService();
    }

    function index()
    {
        echo "Available Methods:\n" . json_encode(get_class_methods($this));
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
        $registered = $this->service->register($userRegisterModel);
        if ($registered) {
            $this->response->setStatus(200);
        }
        else {
            $this->response->setStatus(409);
        }
    }

    function login()
    {
        $req_data = $this->request->input();
        $loginModel = new LoginModel($req_data["username"], $req_data["password"]);
        $token = $this->service->login($loginModel);
        if (!$token){
            $this->response->setStatus(400);
        }
        else{
            $this->response->setHeader($token);
        }

    }

    function logout()
    {
        $this->request->
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
