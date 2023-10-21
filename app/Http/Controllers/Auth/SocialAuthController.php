<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use function Nette\Utils\startTag;
use function Ramsey\Uuid\Generator\timestamp;
//use App\Models\User;
//use Auth;


class SocialAuthController extends Controller
{
    public function index() {

        return view('auth.login');
    }

    public function googleRedirect() {

        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {

        $user = Socialite::driver('google')->user();
        $this -> createOrUpdateUser($user, 'google');
        return redirect()->route('/');
    }

    private  function createOrUpdateUser($data, $provider) {

        $user = User::where('email', $data->email)->first();

        if($user){
            $user->update([
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar
            ]);
        }else{
            $user = User::create([
                'name' => $data->name,
                'email' => $data->email,
                'provider' => $provider,
                'provider_id' => $data->id,
                'avatar' => $data->avatar,
                'email_verified_at' => date('Y-m-d H:i:s')
            ]);
        }

        Auth::login($user);
    }
}
