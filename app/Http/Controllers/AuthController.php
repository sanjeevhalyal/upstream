<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Socialize;
use Microsoft\Graph\Graph;
use Microsoft\Graph\Model;
use App\User;
use App\Http\Controllers;

class AuthController extends Controller
{
  /**
     * Redirect the user to the Graph authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialize::with('graph')->redirect();

    }

    /**
     * Obtain the user information from graph.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request,\Exception  $exception)
    {



            $user = Socialize::driver('graph')->user();
            //Check wether the URL is consist of NUIG
            $authUser = $this->findUser($user);
            if ($authUser) {
                //login
                Auth::login($authUser, true);
                return redirect('/');
            } else {
                //registration
                $us = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'role_id' => '3'
                ]);
                Auth::login($us, true);
                return redirect('/home');
            }

    }

    /**
     * Check wether the user exists using Microsoft Auth
     * If it does, Return the user
     * If it doesnt redirect the user to registration page.
     * @return Response
     */
     public function findUser($us)
     {
       $user = User::where('email', $us->email)->first();
       if($user)
       {
         return $user;
       }
       return false;
     }


}
