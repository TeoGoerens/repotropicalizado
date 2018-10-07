<?php

class User
{
    private $fullName;
    private $email;
    private $username;
    private $password;

    public function __construct(String $fullName, String $email, String $username, String $password)
    {
        $this->fullName = $fullName;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function getFullName()
    {
        return $this->fullName;
    }
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }
}

?>