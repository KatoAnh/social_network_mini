<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Illuminate\Http\Request;

class HomeControler extends Controller
{
    public function index()
    {
        if(!auth()->check()){
            return Inertia::render('Welcome');
        }
        return Inertia::render('Home');
    }
}
