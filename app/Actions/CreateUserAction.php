<?php

namespace App\Actions;

use App\Models\User;

class CreateUserAction
{
    /**
     * Create a new class instance.
     */
    public static function register(array $userInfo)
    {
        return User::create($userInfo);
    }
}
