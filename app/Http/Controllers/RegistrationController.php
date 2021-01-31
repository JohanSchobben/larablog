<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use App\User;

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
}
