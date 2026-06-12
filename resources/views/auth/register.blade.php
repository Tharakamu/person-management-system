<x-guest-layout>
<div style="text-align:center; margin-bottom:30px;">

    <h1 style="
        font-size:70px;
        font-weight:900;
        color:#2563eb;
        letter-spacing:5px;
        margin-bottom:0;
    ">
        NPP
    </h1>

    <h2 style="
        font-size:26px;
        font-weight:bold;
        color:#1e293b;
        margin-top:5px;
    ">
        PERSON MANAGEMENT SYSTEM
    </h2>

    <p style="
        color:#64748b;
        margin-top:10px;
    ">
        Create a New User Account
    </p>

</div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />

            <x-text-input
                id="name"
                class="block mt-1 w-full"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name" />

            <x-input-error
                :messages="$errors->get('name')"
                class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username" />

            <x-input-error
                :messages="$errors->get('email')"
                class="mt-2" />

        </div>

        <!-- Password -->
        <div class="mt-4">

            <x-input-label
                for="password"
                :value="__('Password')" />

            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <!-- Confirm Password -->
        <div class="mt-4">

            <x-input-label
                for="password_confirmation"
                :value="__('Confirm Password')" />

            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password" />

            <x-input-error
                :messages="$errors->get('password_confirmation')"
                class="mt-2" />

        </div>

        <!-- Register Button -->
        <div class="mt-4">

            <button type="submit"
                style="
                    width:100%;
                    background:#2563eb;
                    color:white;
                    padding:12px;
                    border:none;
                    border-radius:8px;
                    font-weight:bold;
                    font-size:16px;
                ">
                Register
            </button>

        </div>

        <!-- Back To Login Button -->
        <div class="mt-3">

            <a href="{{ route('login') }}"
               style="
                    display:block;
                    width:100%;
                    text-align:center;
                    background:#6c757d;
                    color:white;
                    padding:12px;
                    border-radius:8px;
                    text-decoration:none;
                    font-weight:bold;
                    font-size:16px;
               ">
                Back to Login
            </a>

        </div>
<!-- Footer -->

<div class="mt-6 text-center border-t pt-4">

    <p class="text-sm font-bold text-gray-700">
        Created By Tharaka Wijesinghe
    </p>

    <p class="text-sm text-gray-500">
        Contact : 0761819586
    </p>

</div>
    </form>

</x-guest-layout>