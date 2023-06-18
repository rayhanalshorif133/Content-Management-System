<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
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
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function showLoginForm()
    {
        return view('admin.loginView');
    }

    // loginFormSubmit
    public function loginFormSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $user = User::where('email', $request->email)->first();


        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                Session::flash('message', 'Login successful');
                Session::flash('class', 'success');
                return redirect()->route('admin.dashboard');
            } else {
                Session::flash('message', 'Invalid credentials');
                Session::flash('class', 'danger');
                return redirect()->back();
            }
        } else {
            Session::flash('message', 'User not found');
            Session::flash('class', 'danger');
            return back()->with('error', 'Invalid Login Details');
        }
    }


    // logout
    public function logout(Request $request)
    {

        Auth::logout();
        return redirect()->route('admin.login');
    }
}
