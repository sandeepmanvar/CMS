<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\SocialAccount;
use Illuminate\Support\Str;

use Socialite;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        //return $request->only($this->username(), 'password');
        return ['email' => $request->{$this->username()}, 'password' => $request->password, 'status' => 1];
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $rules = [];

        $rules += [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ];

        if (config('settings.security.enable_captcha_form') == 'Y') {
            if (config('settings.security.captcha_type') == 'invisible_recaptcha') {
                $rules += ['g-recaptcha-response' => 'required|recaptcha'];
            } else {
                $rules += ['captcha' => 'required|captcha'];
            }
        }

        $request->validate($rules);
    }

    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($service)
    {
        return Socialite::driver($service)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($service)
    {
        if ($service == 'google') {
            $providerUser = Socialite::driver($service)->stateless()->user();
        } else {
            $providerUser = Socialite::driver($service)->user();
        }

        $authUser = $this->findOrCreateUser($providerUser, $service);

        Auth::login($authUser);

        return redirect()->route('home');
    }

    public function findOrCreateUser($providerUser, $service)
    {
        $account = SocialAccount::where('provider_user_id', $providerUser->getId())
            ->where('provider', $service)
            ->first();

        if ($account) {
            return $account->user;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => $service,
                'access_token' => $providerUser->token,
                'nickname' => $providerUser->getNickname(),
                'name' => $providerUser->getName(),
                'email' => $providerUser->getEmail(),
                'avatar' => $providerUser->getAvatar()
            ]);

            $user = User::where('email', $providerUser->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $providerUser->getName(),
                    'email' => $providerUser->getEmail(),
                    'password' => Hash::make(Str::random(10))
                ]);
            }

            $account->user()->associate($user);
            $account->save();

            return $user;
        }
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('login');
    }
}
