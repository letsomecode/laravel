<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserService
     */
    private $service;

    public function __construct(UserService $userService)
    {
        $this->service = $userService;
    }

    public function register(UserService $service, Request $request)
    {
        $service->register($request);
    }
}



