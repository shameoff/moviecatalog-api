<?php

namespace models;

use core\Model;

class ProfileModel extends Model
{
    private $id;
    private $nickName;
    private $email;
    private $avatarLink;
    private $name;
    private $birthDate;
    private $gender;

    public function __construct($id, $nickName, $email, $avatarLink, $name, $birthDate, $gender)
    {

        $this->id = $id;
        $this->nickName = $nickName;
        $this->email = $email;
        $this->avatarLink = $avatarLink;
        $this->name = $name;
        $this->birthDate = $birthDate;
        $this->gender = $gender;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNickName()
    {
        return $this->nickName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAvatarLink()
    {
        return $this->avatarLink;
    }

    public function getName()
    {
        return $this->name;
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