@extends('layouts.main')
@section('register')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="fs-1 fw-bold text-decoration-none" style="color: #8181ff;">
                CLINIC CONTROL
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nome')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Senha')" />

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
                <x-label for="password_confirmation" :value="__('Confirmar Senha')" />

                <x-input
                    id="password_confirmation"
                    class="block mt-1 w-full"
                    type="password"
                    name="password_confirmation"
                    required
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Já tem uma conta? Conecte-se') }}
                </a>

                <button
                    class="btn text-white ms-4"
                    style="background-color: #8181ff"
                >
                    {{ __('Registrar') }}
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

{{-- @endsection --}}