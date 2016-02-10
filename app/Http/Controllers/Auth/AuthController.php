<?php

namespace App\Http\Controllers\Auth;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\SocialAccount;
use App\Admin;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function __construct()
    {
        $this->redirectPath = route('home');
    }

    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        $data = [
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ];

        $providerName = class_basename($provider);

        $account = SocialAccount::whereProvider($providerName)
            ->whereProviderUserId($user->getId())
            ->first();

        if ($account) {

            $user = $account->user;

        } else {

            $account = new SocialAccount([
                'provider_user_id' => $user->getId(),
                'provider' => $providerName
            ]);

            $user = User::whereEmail($user->getEmail())->first();

            if (!$user) {
                $user = User::create($data);
            }

            $account->user()->associate($user);
            $account->save();

            $admins = Admin::all();

            if (count($admins) == 0) {
                Admin::create(['user_id' => $user->id]);
            }

        }

        Auth::login($user);

        return redirect($this->redirectPath());
    }
}
