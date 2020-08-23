<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationFormRequest;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //
    public function register(RegistrationFormRequest $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password']),
        ]);

        $credentials = request(['name', 'email', 'password']);
        dd($credentials);

        if (! $token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
        
    }
}
