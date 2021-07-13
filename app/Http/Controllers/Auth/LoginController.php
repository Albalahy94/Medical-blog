<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function face($service)
    {
        # code...
        return Socialite::driver($service)->redirect();
    }
    public function callback($service)
    {
        # code...
        $social_user = Socialite::driver($service)->user();
        // return $user->token;
        $find_user = User::where('email', $social_user->email)->first();

        if ($service != 'twitter') {
            $token = $social_user->token;
            $refreshToken = $social_user->refreshToken;
            $expiresIn = $social_user->expiresIn;

            if ($find_user) {
                Auth::login($find_user);
                return redirect('home');
            } else {

                $user = new User;
                $user->name =  $social_user->name;
                $user->email  =  $social_user->email;
                $user->password =  encrypt(1234);
                $user->save();
                // $social_user->password;
                Auth::login($user);
                return redirect('home');
            }
        } else {
            $token = $social_user->token;
            $tokenSecret = $social_user->tokenSecret;

            if ($find_user) {
                Auth::login($find_user);
                return redirect('home');
            } else {

                $user = new User;
                $user->name =  $social_user->name;
                $user->email  =  $social_user->email;
                $user->password =  encrypt(1234);
                $user->save();
                // $social_user->password;
                Auth::login($user);
                return redirect('home');
            }
        }
    }
}