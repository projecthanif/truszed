<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Property;
use Illuminate\Http\Request;

class ClientRequestController extends Controller
{
    public function index(string $slug)
    {
        $propertyInfo = $this->propertyInfo($slug);
//        dd($this->propertyInfo($slug));
        return view('client.request',[
            'agent_id' => $propertyInfo->agent_id,
            'property_id' => $propertyInfo->id
        ]);
    }

    public function store(Request $request)
    {
        $formData = $request->validate([
            'property_id' => '',
            'agent_id' => '',
            'name' => 'string',
            'email' => 'email',
            'number' => 'string',
            'comment' => 'nullable'
        ]);
//        dd($formData);
        Client::create($formData);

        return redirect('/');
    }

    public function propertyInfo($slug)
    {
        return Property::where([
            'slug' => $slug
        ])->get()->first();

    }
}
