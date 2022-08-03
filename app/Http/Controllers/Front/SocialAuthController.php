<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialAuthController extends FrontController
{
    public function redirect($service) {
        return Socialite::driver( $service)->redirect();
    }

    public function callback($service) {
        try{
            if ($service == 'facebook') {
                $client = Socialite::driver($service)->fields([
                    'id',
                    'name',
//                     'first_name',
//                     'last_name',
                    'email'
                ])->stateless()->user();

            }
            elseif($service == 'google') {

                $client = Socialite::driver($service)->user();
//            $client has all the information of the provider
            }

//       if we already have a user, grab that user....
            $user = User::where('provider_id', $client->getId())
                ->first();
// dd($user);
//...else create the user
            if (!$user) {
                if(!(User::where('email',$client->getEmail())->first())){


//        add user to database
                    $user = User::create([
                        'name' => $client->getName(),
                        'email' => $client->getEmail(),
                        'provider_id' => $client->getId(),
                    ]);
                }

                else{
                    Session::flash('error','Email Address Already In Use');
                    return redirect('/login');
                }
            }

//        log the user in
        Auth::login($user, true);
            return redirect('/');

        }
        catch (InvalidStateException $e){
            return redirect('/');
        }
    }
}
