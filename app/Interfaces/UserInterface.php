<?php

namespace App\Interfaces;

interface UserInterface 
{
    public function getAllUsers();
    public function getUserById($userId);
}