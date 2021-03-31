{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.login') }}">
@csrf

<h3 class="text-red-500">Admin Login</h3>

<!-- Email Address -->
<div>
    <x-label for="email" :value="__('Admin Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Admin Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />
</div>

<!-- Remember Me -->
<div class="block mt-4">
    <label for="remember_me" class="inline-flex items-center">
        <input id="remember_me" type="checkbox"
            class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            name="remember">
        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="flex items-center justify-end mt-4">
    @if (Route::has('admin.password.request'))
    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('admin.password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-button class="ml-3">
        {{ __('Login') }}
    </x-button>
</div>
</form>
</x-auth-card>
</x-guest-layout> --}}




@extends('admin.layouts.app')
@section('extra-css')
<link rel="stylesheet" href="{{ asset('admin-assets/login/css/login.css') }}">
@endsection

@section('content')
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="{{ asset('admin-assets/login/images/login.jpg') }}" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="{{ asset('admin-assets/login/images/logo.svg') }}" alt="logo" class="logo">

                        </div>
                        <p class="login-card-description">Sign into your account</p>
                        <form action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                    placeholder="Email address">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="***********">
                                @error('password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <!-- Remember me -->
                            <div class="form-group mb-4">
                                <label for="remember">
                                    <input id="remember" type="checkbox" name="remember">
                                    <span class="ml-2 text-sm text-gray-600"> Remember me</span>
                                </label>
                            </div>

                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                value="Login">


                            <!-- Forgot Password -->
                            <div class="flex items-center justify-end mt-4">
                                @if (Route::has('admin.password.request'))
                                <a class="text-secondary" href="{{ route('admin.password.request') }}">
                                    <u> Forgot your password?</u>
                                </a>
                                @endif
                            </div>


                        </form>
                        <nav class="login-card-footer-nav">
                            <a href="/">Return Home</a>
                            <a href="#!">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        @endsection