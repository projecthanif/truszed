<?php

namespace App\Actions;

use App\Models\Agent;

class CreateAgentAction
{
    /**
     *  Create a new agent
     */
    public static function register(array $agentInfo)
    {
        Agent::create($agentInfo);
    }
}
