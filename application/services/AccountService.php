<?php

namespace services;

use core\Http\Response;
use core\Service;
use Exception;
use models\UserRegisterModel;
use models\LoginModel;

class AccountService extends Service
{

    private function hashPassword($password): string
    {
        return hash("sha256", $password);
    }

    public function getUserIdByToken($token): bool|array|null
    {
        $query = "SELECT id FROM `PasswordToken` WHERE token='$token'`";
        return $this->dbAdapter->query($query)->fetch_assoc();
    }

    public function doesUserExist($username): bool
    {
        $query = "SELECT * FROM `User` WHERE `username`='$username'";
        $user = $this->dbAdapter->query($query)->fetch_assoc();
        if (!is_null($user)) {
            return true;
        } else {
            return false;
        }
    }

    public function register(UserRegisterModel $model): \mysqli_result|bool
    {
        $user = $model->getUserName();
        if ($this->doesUserExist($user)) {
            return false;
        }
        $passwordHash = $this->hashPassword($model->getPassword());
        $username = $model->getUserName();
        $name = $model->getName();
        $email = $model->getEmail();
        $birthDate = $model->getBirthDate();
        $birthDate = substr($birthDate, 0, strpos($birthDate, 'T'));
        $gender = $model->getGender();
        $query = "INSERT INTO `User`(userName, `name`, email, birthDate, gender, passwordHash) 
                  VALUES ('$username', '$name', '$email', '$birthDate', '$gender', '$passwordHash')";
        return $this->dbAdapter->query($query);
    }

    public function login (LoginModel $model): bool|string
    {
        $passwordHash = $this->hashPassword($model->getPassword());
        $password = $model->getPassword();
        $username = $model->getUsername();
        $query = "SELECT * FROM `User` WHERE username='$username' AND passwordHash='$passwordHash'";
        $user = $this->dbAdapter->query($query)->fetch_assoc();
        if (!is_null($user)){

            $userID = $user["id"];
            $timestamp = date("Y-m-d H:i:s");
            $temporary_token = bin2hex(random_bytes(16));
            $query = "INSERT INTO PasswordToken(userId, created, token) VALUES ($userID, '$timestamp', '$temporary_token')";
            $tokenInsert = $this->dbAdapter->query($query);
            return $tokenInsert? $temporary_token : false;
        }
        else {
            return false;
        }
    }

    public function logout()
    {

    }
}