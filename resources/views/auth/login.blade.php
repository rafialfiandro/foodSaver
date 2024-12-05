<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>foodSaver - Login</title>
</head>
<body style="background-color: #e9f0e1">
    {{-- @extends('templates.footer') --}}
    {{-- @section('content') --}}

        <div class="container-fluid d-flex flex-column" style="background-color: #e9f0e1; height: 100vh">
            <div class="text-center">
                <img src="foodSaver_logo.svg" style="width: 50vw" class="align-center">
                <p class="fs-4 fst-italic">Your food logging app</p>
            </div>
            <div name="loginBox" class="container d-flex flex-column justify-content-center rounded-5 shadow-lg" style="background-color: white">
                <p class="fs-1 fw-bold text-center m-4">Login</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mb-3">
                        <div class="container col-4">
                            <x-input-label for="email" :value="__('Email Address')" />
                            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <div class="container col-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="form-control"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Remember Me -->
                    <div class="mb-4">
                        <div class="container col-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                            <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                        </label>
                        </div>
                    </div>

                    {{-- Forgot Password  --}}
                    @if (Route::has('password.request'))
                        <div class="container col-4 mb-3">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                        </div>
                    @endif

                    {{-- Submit Button --}}
                    <div class="container col-2 mb-4">
                        <div class="d-grid gap-2">
                            <x-primary-button class="btn btn-success">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </div>

                @if (Route::has('register'))
                <div class="container col-4 mb-4 text-center">
                    <a href="{{ route('register') }}">
                    Don't have an account? Register here
                    </a>
                </div>
                @endif
            </div>
        </div>

    {{-- @endsection --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
