<?php

namespace App\Hashing;

use Illuminate\Contracts\Mail\Mailer;

class Sha1Hasher implements Hasher
{
    private $salt;

    public function __construct($salt)
    {
//        dd($salt);
        $this->salt = $salt;
    }

    /**
     * @param string $value
     * @return string
     */
    public function make($value)
    {
        return sha1($value . $this->salt);
    }

    /**
     * @param string $value
     * @param string $hashed
     * @return boolean
     */
    public function verify($value, $hashed)
    {
        return $this->make($value) === $hashed;
    }
}
