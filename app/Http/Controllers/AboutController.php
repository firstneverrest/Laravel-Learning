<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    function index()
    {
        $name = 'Chitsanupong';
        $age = 21;
        $position = 'front-end developer';
        return view('about', compact('name', 'age', 'position'));
    }
}
