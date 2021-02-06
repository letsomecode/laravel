<?php

namespace Tests\Unit\Services;

use App\Http\Controllers\UserService;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    public function test_register()
    {
        str_after();
        // snake_case
        // underscore

        // $user_email
        // find_user_by_id
        // find_user_email
        $user = $repository->find_user_by_id();

        // camelCase
        $user = $repository->findUserById();

        // PascalCase
        // StudlyCase
        Str::studly();
        $user = $repository->FindUserById();
    }
}
