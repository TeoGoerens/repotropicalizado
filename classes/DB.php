<?php

abstract class DB
{
    abstract public function dbConnect();
    abstract public function dbEmailSearch($email);
    abstract public function createUser(User $user);
    abstract public function saveUser(User $user);
    abstract public function dbUserSearch($user);
}

?>