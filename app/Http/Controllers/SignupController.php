<?php

namespace App\Http\Controllers;

use App\Actions\CreateAgentAction;
use App\Actions\CreateUserAction;
use App\Http\Requests\CreateAgentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('signup.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'string|required',
            'last_name' => 'string|required',
            'dob' => 'required',
            'gender' => 'string|required',
            'email' => 'email|required',
            'phone' => 'required',
            'nin' => 'numeric|required',
            'address' => 'required',
            'password' => 'required'
        ]);

        $name = $validated['first_name'] . ' ' . $validated['last_name'];

        $user = [
            'name' => $name,
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ];

        $agent = [
            'name' => $name,
            'email' => $validated['email'],
            'phone_number' => $validated['phone'],
            'address' => $validated['address'],
            'nin' => $validated['nin'],
        ];

        if ($request->hasFile('idfront')) {
            $agent['nin_thumbnail1'] = $request->file('idfront')->store('agents', 'public');

            if ($request->hasFile('idback')) {
                $agent['nin_thumbnail2'] = $request->file('idback')->store('agents', 'public');
            }
        }

        DB::transaction(function () use ($user, $agent) {
            $user = CreateUserAction::register($user);
            CreateAgentAction::register($agent);

            auth()->login($user);
        });

        return redirect(route('filament.agent.auth.login'));
    }
}
