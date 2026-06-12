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
            Welcome to the Person Management System
        </p>

    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email -->
        <div>

            <x-input-label for="email" :value="__('Email')" />

            <x-text-input
                id="email"
                class="block mt-1 w-full"
                type="email"
                name="email"
                :value="old('email')"
                required
                autofocus
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
                autocomplete="current-password" />

            <x-input-error
                :messages="$errors->get('password')"
                class="mt-2" />

        </div>

        <!-- Remember Me -->
        <div class="block mt-4">

            <label for="remember_me" class="inline-flex items-center">

                <input
                    id="remember_me"
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                    name="remember">

                <span class="ms-2 text-sm text-gray-600">
                    {{ __('Remember me') }}
                </span>

            </label>

        </div>

        <!-- Forgot Password -->
        @if (Route::has('password.request'))

            <div class="text-center mt-3">

                <a
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                    href="{{ route('password.request') }}">

                    Forgot your password?

                </a>

            </div>

        @endif

        <!-- Login Button -->
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
                Log In
            </button>

        </div>

        <!-- Register Button -->
        <div class="mt-3">

            <a href="{{ route('register') }}"
               style="
                    display:block;
                    width:100%;
                    text-align:center;
                    background:#16a34a;
                    color:white;
                    padding:12px;
                    border-radius:8px;
                    text-decoration:none;
                    font-weight:bold;
                    font-size:16px;
               ">
                Register New User
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