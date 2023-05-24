<x-guest-layout>

    <link rel="stylesheet" href="{{ asset('assets/css/plugin.min.css?' . time(), Request::secure()) }}">
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <br><br><br>
    <div class="container">
        <div class="row d-flex justify-content-left text-center">
            <div class="col-md-16">

                <x-jet-authentication-card>
                    <x-slot name="logo">
                        <x-jet-authentication-card-logo />
                    </x-slot>

            </div>
        </div>
        <div class="row d-flex justify-content-center text-left">
            <div class="col-md-4 rounded" style="border:1px solid #d9d9d9; background: white">

                <br>
                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <x-jet-validation-errors style="color:red" class="mb-4" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" style="border:1px solid #d9d9d9; outline-color: red !important" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" style="border:1px solid #d9d9d9; outline-color: blue" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="current-password" />
                    </div>

                    <div class="form-group text-left">
                        <label for="remember_me">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
                    <br>

                    <div class="form-group text-left">
                        @if (Route::has('password.request'))
                        <u><a style="font-size: 14px; color: #000080" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a></u>
                        @endif

                        <x-jet-button style="margin-left: 6px" class="col-md-4 text-left btn btn-primary">
                            {{ __('Log in') }}
                        </x-jet-button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    </x-jet-authentication-card>
</x-guest-layout>