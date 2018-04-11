<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Login\LoginRequest;
use App\Models\LogLogin;
use Auth,DateTime;

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

    public function getLogin () {
        if (Auth::guard('web')->check()) {
            return redirect()->route('admin.dashboard.index');
        } else {
           return view('backend.login');
        }
    }

    public function postLogin (LoginRequest $request) {
        $auth = Auth::guard('web')->attempt([
            'email'    => $request->txtEmail,
            'password' => $request->txtPass,
            'level'    => 1,
            'status'   => 'on'
        ]);
        
        if ($auth && $request->txtLock == env('LOGIN_KEY','QuocTuan.Info')) {
            $log_login             = new LogLogin;
            $log_login->browser    = $request->server('HTTP_USER_AGENT');
            $log_login->ip_address = $request->ip();
            $log_login->email      = Auth::user()->email;
            $log_login->created_at = new DateTime();
            $log_login->save();
            return redirect()->route('admin.dashboard.index');
        } else {
            Auth::guard('web')->logout();
            return redirect()->route('getLogin');
        }
    }

    public function getLogout () {
        Auth::guard('web')->logout();
        return redirect()->route('getLogin');
    }
}
