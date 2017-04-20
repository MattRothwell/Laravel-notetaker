<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        $this->middleware('guest', ['except' => 'logout']);
    }

     public function authenticate()
    {
        if (Auth::attempt(['username' => $username, 'password' => $password])) {
            // Authentication passed...
            $user = User::where('username', $username);

            session(['username' => $username]);
            session(['user_id' => $user->id]); 
            return redirect()->intended('home');
        }
    }

    public function loginAttempt(Request $requests){
        $username = $requests->get('username');
        $password = $requests->get('password');

        $checkuser = Users::selectRaw("Count(*) as Total")->where('username', '=', $username)->first();
        if (intval($checkuser->Total) > 0)
        {
            //display if user and password is correct
            $getpass = Users::select("password")->where('username', '=', $username)->first();
            if(password_verify($password, $getpass->password))
            {
                $request->session()->set('username', $username);
                $redirectTo;
            }
            else
            {
                return redirect('/login');
            }
        }
    }
}
