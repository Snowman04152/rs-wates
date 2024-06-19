<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

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
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request): RedirectResponse
    {
       
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('username' => $input['username'], 'password' => $input['password']))) {
            
            if (auth()->user()->level == '1') {
                return redirect()->route('dashboard');
            } else if (auth()->user()->level == '2') {
                $namaUser = auth()->user()->username;
                return redirect()->route('dashboarduser')->with('namaUser', $namaUser);
            } else if (auth()->user()->level == '3') {
                $namaUser = auth()->user()->username;
                return redirect()->route('dashboardpegawai')->with('namaUser', $namaUser);
            } else if (auth()->user()->level == '4') {
                $namaUser = auth()->user()->username;
                return redirect()->route('dashboardkepalaruang')->with('namaUser', $namaUser);
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Username dan Password salah.');
        }

    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
