<?php

namespace services;

use core\Service;
use models\UserRegisterModel;
use models\LoginModel;

class AccountService extends Service{

    public function tokenizePassword($password){
        return hash("sha256", $password);
}
    public function doesUserExist($username) : bool {
        $query = $this->dbAdapter->query(
          "SELECT * FROM `User` WHERE `username`='$username'"
        );
        if (mysqli_num_rows($query) > 0) {
            return true;
        } else{
            return false;
        }
    }
    public function register(UserRegisterModel $model){
        $user = $model->getUserName();
        if ($this->doesUserExist($user)){
            throw new \Exception("User already registered");
        }
        $passwordToken = $this->tokenizePassword($model->getPassword());
        $query = $this->dbAdapter->query(
            "INSERT INTO `User`(username, login)"
        )
        echo "User doesn't exist\n";
    }
    public function login(LoginModel $model){
        if (!$this->doesUserExist($model->getUsername())){
            throw new \Exception("User doesn't exist");
        }

    }
    public function logout(){

    }
}