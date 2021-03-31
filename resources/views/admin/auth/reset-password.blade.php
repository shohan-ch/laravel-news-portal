{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('admin.password.update') }}">
@csrf

<h1>Admin Reset Password</h1>

<!-- Password Reset Token -->
<input type="hidden" name="token" value="{{ $request->route('token') }}">

<!-- Email Address -->
<div>
    <x-label for="email" :value="__('Email')" />

    <x-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ $request->email }}" required
        autofocus />
</div>

<!-- Password -->
<div class="mt-4">
    <x-label for="password" :value="__('Password')" />

    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required />
</div>

<!-- Confirm Password -->
<div class="mt-4">
    <x-label for="password_confirmation" :value="__('Confirm Password')" />

    <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
        required />
</div>

<div class="flex items-center justify-end mt-4">
    <x-button>
        {{ __('Reset Password') }}
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
                        <p class="login-card-description">Reset Password</p>
                        <x-admin.message />
                        <form method="POST" action="{{ route('admin.password.update') }}">
                            @csrf

                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label for="inputPasswordOld">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $request->email }}"
                                    required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="inputPasswordNew">Password</label>
                                <input type="password" name="password" required class="form-control"
                                    id="inputPasswordNew" required="">

                            </div>
                            <div class="form-group">
                                <label for="inputPasswordNewVerify">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control"
                                    id="inputPasswordNewVerify" required="">
                            </div>

                            <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit"
                                value="Reset Password">

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