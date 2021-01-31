<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $user = new User($request->input());
        $user->password = bcrypt($user->password);
        $user->save();

        return response()
            ->json([
               'message' => 'De gebruiker is aangemaakt',
                'email' => $user->email
            ], 201);
    }

    public function login(Request $request)
    {
        $token = auth('api')->attempt($request->only(['email','password']));
        if (!$token) {
            return response()->json(['error' => 'Vekeerde combinatie gebruikersnaam en wachtwoord'], 401);
        }

        $tokenData = $this->createNewToken($token);
        return response()->json([
            'token' => $tokenData,
            'user' => auth('api')->user()
        ],200);
    }

    public function logout()
    {
        auth('api')->logout();

        return response()->json(['message' => 'De gebruiker is uitgelogd']);
    }

    public function refresh()
    {
        return response()->json($this->createNewToken(auth('api')->refresh()));
    }

    protected function createNewToken($token)
    {
        return [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60
        ];
    }
}
