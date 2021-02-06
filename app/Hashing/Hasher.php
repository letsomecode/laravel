<?php

namespace App\Hashing;

interface Hasher
{
    /**
     * @param string $value
     * @return string
     */
    public function make($value);

    /**
     * @param string $value
     * @param string $hashed
     * @return boolean
     */
    public function verify($value, $hashed);
}
