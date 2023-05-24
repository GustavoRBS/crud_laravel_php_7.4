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

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <br>
                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="name" value="{{ __('Name') }}" />
                        <x-jet-input style="border:1px solid #d9d9d9; outline-color: blue !important" id="name" class="block mt-1 w-full form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    </div>

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input style="border:1px solid #d9d9d9; outline-color: blue !important" id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input style="border:1px solid #d9d9d9; outline-color: blue !important" id="password" class="block mt-1 w-full form-control" type="password" name="password" required autocomplete="new-password" />
                    </div>

                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                        <x-jet-input style="border:1px solid #d9d9d9; outline-color: blue !important" id="password_confirmation" class="block mt-1 w-full form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                    </div>

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                    <div class="form-group text-left" style="text-align: left;">
                        <x-jet-label for="terms">
                            <div class="flex items-center">
                                <x-jet-checkbox name="terms" id="terms" />

                                <div class="ml-2">
                                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                    ]) !!}
                                </div>
                            </div>
                        </x-jet-label>
                    </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a style="font-size: 14px; color: #000080" class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-jet-button style="margin-left: 6px" class="col-md-4 text-left btn btn-primary" >
                            {{ __('Register') }}
                        </x-jet-button>
                    </div>
                </form>
                <br>

            </div>
        </div>
    </div>

    </x-jet-authentication-card>
</x-guest-layout>