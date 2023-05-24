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

        @yield('content')

      </div>
    </div>
  </div>

  </x-jet-authentication-card>
</x-guest-layout>