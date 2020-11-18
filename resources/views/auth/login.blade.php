<x-guest-layout>
    <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/colors.css')}}">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <a class="logo-text" href="{{url('/')}}">
                <div class="logo-img">
                    <img class="logo_ml img-responsive" style="height: 90px;" alt="Monteiro Lobato" title="Início" src="{{URL::asset('app-assets/img/logo.png')}}">
                </div>
            </a>
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="Senha" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">Lembrar de mim</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                {{-- @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif --}}

                <x-jet-button class="ml-4 btn text-white bg-danger bg-darken-2">
                    Entrar
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
