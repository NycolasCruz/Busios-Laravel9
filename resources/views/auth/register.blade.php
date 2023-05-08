@extends('layouts.main')
@section('register')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="text-indigo-400 font-bold fs-1">
                BUSIOS
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label class="form-label font-bold fs-6 mb-0" for="name">Nome</label>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label class="form-label font-bold fs-6 mb-0" for="email">Email</label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label class="form-label font-bold fs-6 mb-0" for="password">Senha</label>

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    autocomplete="new-password"
                    required
                />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label class="form-label font-bold fs-6 mb-0" for="password-confirmation">Confirmar Senha</label>

                <x-input
                    id="password-confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="text-indigo-400 hover:text-indigo-500 fs-6 font-bold me-4" href="{{ route('login') }}">
                    Já tem uma conta? Conecte-se
                </a>

                <x-button
                    class="btn justify-center text-white"
                    style="padding: 0.55rem !important; font-size: 13px;"
                >
                    {{ __('Registrar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
