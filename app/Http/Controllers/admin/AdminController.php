<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\AdminLoginRequest;

class AdminController extends Controller
{

    // public function create()
    // {
    //     return view('admin.auth.login1');
    // }

    // public function store(AdminLoginRequest $request)
    // {
    //     $request->authenticate();

    //     $request->session()->regenerate();

    //     return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
    // }
}