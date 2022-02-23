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
        return view('about')->with('name', $name)->with('age', $age)->with('position', $position);
    }
}
