<?php

namespace App\Http\Controllers;

class CustomerController extends Controller
{
    public function register()
    {
        return view('register.index', [
            'title' => 'Registration'
        ]);
    }
}
