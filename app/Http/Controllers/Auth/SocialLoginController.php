<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Social_Login;
use Socialite,Auth;

class SocialLoginController extends Controller
{
    /**
     * Login Facebook
     *
     * @return void
     */

    public function redirectToProviderFacebook() {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook() {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect('login/facebook');
        }
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    private function findOrCreateUser($facebookUser) {
        $authUser = User::where('email', $facebookUser->email)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'password'   => str_random(20),
            'firstname' =>  $facebookUser->name,
            'avatar'     => $facebookUser->avatar,
            'email'      => $facebookUser->email,
            'level'      => 2,
            'status'     => 'on'
        ]);
    }

    /**
     * Login Google
     *
     * @return void
     */


    public function redirectToProviderGoogle() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle() {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return redirect('login/google');
        }
        $authUser = $this->findOrCreateUser($user);

        Auth::login($authUser, true);

        return redirect('/');
    }

    private function findOrCreateUserGoogle($googleUser) {
        $authUser = User::where('email', $googleUser->email)->first();

        if ($authUser){
            return $authUser;
        }

        return User::create([
            'password'   => str_random(20),
            'firstname' =>  $googleUser->name,
            'avatar'     => $googleUser->avatar,
            'email'      => $googleUser->email,
            'level'      => 2,
            'status'     => 'on'
        ]);
    }
}
