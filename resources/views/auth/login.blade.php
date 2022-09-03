@extends('layouts.main')
@section('login')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/" class="fs-1 fw-bold" style="color: #8181ff;">
                BUSIOS
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label class="form-label fw-bolder text-dark fs-6 mb-0">Email</label>

                <x-input
                    id="email"
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
                <div class="d-flex justify-content-between mb-2">
                    <label class="form-label fw-bolder text-dark fs-6 mb-0">Senha</label>

                    {{-- @if (Route::has('password.request'))
                        <a
                            class="fs-6 fw-bolder"
                            href="{{ route('password.request') }}"
                            style="color: #8181ff;"
                        >
                            Esqueceu sua senha?
                        </a>
                    @endif --}}
                </div>

                <x-input
                    id="password"
                    class="block mt-1 w-full"
                    type="password"
                    name="password"
                    autocomplete="current-password"
                    required
                />
            </div>

            <div class="flex items-center justify-end my-4">
            <x-button
                class="btn text-white"
                style="
                    background-color: #8181ff;
                    width: 100%;
                    justify-content: center;
                    padding: 1rem !important;
                    font-size: 13px;
                "
            >
                {{ __('Entrar') }}
            </x-button>
        </div>


            <div class="text-end">
                <a
                    class="fs-6 fw-bolder"
                    href="{{ route('register') }}"
                    style="color: #8181ff;"
                >
                    Não tem cadastro? Registre-se
                </a>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

@endsection
