<?php

namespace App\Http\Controllers\Social;

use Auth;
use Socialite;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;


class SocialAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(['social', 'guest']);
    }


    public function redirect($service, Request $request)
    {
        return Socialite::driver($service)->redirect();
    }

    public function callback($service, Request $request)
    { 
        $serviceUser = Socialite::driver($service)->user();
        // check if user aleady exists
        $user = $this->getExistingUser($serviceUser, $service);

        if(!$user){
            $user = User::create([
                'name' => $serviceUser->getName(),
                'email' => $serviceUser->getEmail(),
                // 'slug'  => $this->slugIt($slug),
                'verify' => 1
            ]);
        }

        if($this->needSocial($user, $service)){
            $user->social()->create([
                'social_id' => $serviceUser->getId(),
                'service'   => $service 
            ]);
        }

        Auth::login($user, false);

        return redirect()->intended();
    }

     protected function needSocial(User $user, $service)
    {
        return !$user->hasSocialLinked($service);
    }

    protected function getExistingUser($serviceUser, $service)
    {
        return User::where('email', $serviceUser->getEmail())->orWhereHas('social', function($q) use ($serviceUser, $service) {
            $q->where('social_id', $serviceUser->getId())->where('service', $service);
        })->first();
    }
}
