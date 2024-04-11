<?php

// app/Repositories/UserRepository.php
namespace App\Repositories;

class UserRepository
{
    public function authenticate($credentials)
    {
        if (auth()->attempt($credentials)) {
            return auth()->user();
        }
        return null;
    }
}