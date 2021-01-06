<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;

class SocialsController extends Controller
{
    public function redirectToProvider($provider) {
        /**
     * Redirect the user to the Socail authentication page.
     *
     * @return \Illuminate\Http\Response
     */
        return Socialite::driver($provider)->redirect();
    }

        /**
     * Obtain the user information from Social.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();
        // dd($socialUser);
        $user = User::where('provider_id', $socialUser->getId())->first();
        
        if (!$user) {
            // Add User To DataBase 
            $user= User::create([
            'email' => $socialUser->getEmail(),
            'name' => $socialUser->getName(),
            'avatar' => $socialUser->getAvatar(),
            'provider_id' => $socialUser->getId(),
            'provider' => $provider
            ]);
        }
        
        // Login the User 
        Auth::login($user, true);

        return redirect('/home');
    }

}
