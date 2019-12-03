<?php

namespace App\Http\Controllers\Auth;

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

    protected function authenticated(){
        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('superadmin.index');
        }
        elseif (auth()->user()->role == 'admin') {
            return redirect()->route('admin.index');
        }
        elseif (auth()->user()->role == 'guru') {
            return redirect()->route('guru.index');
        }
        else{
            return redirect()->route('home');
        }
    }


    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Login username to be used by the controller.
     *
     * @var string
     */
    protected $username;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function findUsername(){
        $login = request()->input('login');
        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    /**
     * Get username property.
     *
     * @return string
     */
    public function username(){
        return $this->username;
    }

}
