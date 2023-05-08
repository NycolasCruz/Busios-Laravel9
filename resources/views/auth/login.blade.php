@extends('layouts.main')
@section('login')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="text-indigo-400 font-bold fs-1">
                BUSIOS
            </div>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label class="form-label font-bold fs-6 mb-0" for="login-email">Email</label>

                <x-input
                    id="login-email"
                    class="block mt-1 w-full"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="form-label font-bold text-dark fs-6 mb-0" for="login-password">Senha</label>

                <x-input
                    id="login-password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                />
            </div>

            <div class="flex items-center justify-end my-4">
            <x-button
                class="btn justify-center text-white"
                style=" width: 100%; padding: 1rem !important; font-size: 13px;"
            >
                {{ __('Entrar') }}
            </x-button>
        </div>


            <div class="text-end">
                <a class="text-indigo-400 hover:text-indigo-500 fs-6 font-bold" href="{{ route('register') }}">
                    Não tem cadastro? Registre-se
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
