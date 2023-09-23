<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

    public function prestamos()
    {
        $user = auth()->user(); 
        $prestamos = $user->prestamos; 

        return view('usuarios.prestamos', compact('prestamos'));
    }

}