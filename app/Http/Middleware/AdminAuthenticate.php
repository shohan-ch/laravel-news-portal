<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    // protected function authenticate($request, array $guards)
    // {



    //     if ($this->auth->guard('admin')->check()) {
    //         return $this->auth->shouldUse('admin');
    //     }


    //     $this->unauthenticated($request, ['admin']);
    // }




    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        //dd($this->guard);
        if (!$request->expectsJson()) {
            return route('admin.login');
        }
    }
}