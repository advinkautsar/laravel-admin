<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        //validasi data
        $validateData = $request->validate([
            'name'      => 'required | max:25',
            'email'     => 'email | required | unique:users',
            'password'  => 'required | confirmed',
        ]);

        //create user 
        $user = new User([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bycrpt($request->password),
        ]);

        $user->save();

        return response()->json($user, 201);
    }
}
