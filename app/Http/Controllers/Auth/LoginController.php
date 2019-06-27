<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\User;
use View;
use Redirect;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


        public function redirectToProvider()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $guser = Socialite::driver('google')->stateless()->user();

        $user=User::where('providerId',$guser->id)->first();
        if(!$user){
            $user=new User;
            $user->name=$guser->getName();
            $user->email=$guser->getEmail();
            $user->providerId=$guser->getId();
            $user->save();
        }

        Auth::login($user,true);
        // echo "success";
        $notification = array(
                'message' => 'Successfully Logged in',
                'alert-type' => 'success'
            );
       return Redirect::to('/')->with($notification);
        // return redirect($this->redirectTo);
        // return $guser->id;
    }
}
