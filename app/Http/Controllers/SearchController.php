<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search()
    {
        $properties = Property::where([
            'admin_permission' => true
        ])->filter(\request(['search']))->get();

        return view('search', [
            'properties' => $properties
        ]);
    }
}
