<?php

namespace App\Http\Controllers;

use App\Models\Jeep;
use App\Models\SafariPackage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $jeeps = Jeep::take(3)->get();
        $packages = \App\Models\SafariPackage::all();
        return view('home', compact('jeeps', 'packages'));
    }
}