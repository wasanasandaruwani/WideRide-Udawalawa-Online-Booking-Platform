<?php

namespace App\Http\Controllers;

use App\Models\Jeep;
use Illuminate\Http\Request;

class JeepController extends Controller
{
    public function index()
    {
        $jeeps = Jeep::all();
        return view('jeeps.index', compact('jeeps'));
    }
    
    // Other resource methods...
}