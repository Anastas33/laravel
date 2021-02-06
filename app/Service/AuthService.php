<?php


namespace App\Service;


use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login($user)
    {
        $email = $user->getEmail();
        $name = $user->getName();

        $userData = User::where('email', $email)->first();
        if($userData) {
            $userData->name = $name;
            if($userData->save()) {
                Auth::login($userData);

                return redirect()->route('account');
            }
        }

        throw new \Exception("Bad error");
    }
}
