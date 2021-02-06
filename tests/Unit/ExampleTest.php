<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $user = new User;
        foreach ($user as $key => $value) {
            dump($key, $value);
        }
    }
}

class User
{
    public $name = 'alice';

    public $email = 'alice@example.com';
}
