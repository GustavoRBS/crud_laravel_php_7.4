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
                <div class="mb-4 text-sm text-gray-600">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
                @endif

                <x-jet-validation-errors class="mb-4" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input style="border:1px solid #d9d9d9; outline-color: blue" id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-jet-button style="margin-left: 6px;" class="text-left btn btn-primary">
                            {{ __('Email Password Reset Link') }}
                        </x-jet-button>
                    </div>
                </form>
                <br>

                </x-jet-authentication-card>
</x-guest-layout>