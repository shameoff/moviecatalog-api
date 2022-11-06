<?php

namespace models;

class UserRegisterModel
{
    private string $userName; //String
    private string $name; //String
    private string $password; //String
    private string $email; //String
    private $birthDate; //Date
    private int $gender; //int

    public function __construct($userName, $name, $password, $email, $birthDate, $gender)
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