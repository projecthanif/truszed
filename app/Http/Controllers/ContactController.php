<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $formData = $request->validate([
            'name' => 'string',
            'email' => 'email|nullable',
            'subject' => 'string|nullable',
            'message' => 'string|nullable'
        ]);

        Contact::create($formData);

        return redirect(route('contact'));
    }
}
