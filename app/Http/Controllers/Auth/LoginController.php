<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home#/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', '']);
    }

    /**
     * Get OAuth login providers
     *
     * @param integer $columns
     *
     * @return array
     */
    private function oauthProviders($columns = 1)
    {
        $providers = [];
        $i = -1;
        foreach (config('services') as $key => $provider) {
            if (isset($provider['client_id'])
                && isset($provider['client_secret'])
                && isset($provider['redirect'])
            ) {
                $provider['key'] = $key;
                if ($columns > 1) {
                    if (!isset($providers[$i]) || count($providers[$i]) === $columns) {
                        $i++;
                        $providers[$i] = [];
                    }
                    $providers[$i][] = $provider;
                } else {
                    $providers[] = $provider;
                }
            }
        }
        return $providers;
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login', ['oauthProviders' => $this->oauthProviders(2)]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(Request $request, $provider)
    {
        $providerUser = Socialite::driver($provider)->stateless()->user();
        $user = User::where('provider', $provider)
            ->where('provider_id', $providerUser->getId())
            ->first();
        if ($user) {
            Auth::login($user);
        } else {
            $user = User::create([
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => ['url' => $providerUser->getAvatar()],
                'role' => 'user',
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
            ]);
            Auth::login($user);
        }
        return $this->sendLoginResponse($request);
    }
}
