<?php

namespace models;

class UserRegisterModel
{
    private $userName; //String
    private $name; //String
    private $password; //String
    private $email; //String
    private $birthDate; //Date
    private $gender; //int

    public function __constuct($userName, $name, $password, $email, $birthDate, $gender)
    {
        $this->userName = $userName;
        $this->name = $name;
        $this->password = $password;
        $this->email = $email;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function getGender()
    {
        return $this->gender;
    }

}