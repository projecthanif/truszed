<?php

namespace App\Services;

use App\Models\Agent;

class Helpers
{
    public static function search(): ?int
    {
        $userEmail = auth()->user()->email;

        $id = Agent::where([
            'email' => $userEmail
        ])->get()->first();



        return $id?->id;
    }
}
