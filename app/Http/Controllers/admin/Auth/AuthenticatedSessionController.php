<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        //dd(Auth::guard());
        return view('admin.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequest $request)
    {

        $request->authenticate();
        $request->session()->regenerate();
        return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
    }


    // public function store(Request $request)
    // {


    //     $credentials =  $request->only('email', 'password');

    //     if (Auth::guard('admin')->attempt($credentials)) {

    //         $request->session()->regenerate();

    //         return redirect()->intended('dashboard');
    //     }



    // }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('admin')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}