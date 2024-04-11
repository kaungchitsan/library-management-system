<?php

// app/Services/AuthService.php
namespace App\Services;

use App\Repositories\UserRepository;

class AuthService
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate($credentials)
    {
        return $this->userRepository->authenticate($credentials);
    }
}