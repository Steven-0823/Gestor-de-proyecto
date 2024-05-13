<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" class="block text-gray-700 text-sm font-bold mb-2" />
            <x-text-input id="email" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="text-red-500 text-xs italic" />
       
        </div>

        <!-- Password -->
        <div class="mt-4">
             <x-input-label for="password" :value="__('Password')" class="block text-gray-700 text-sm font-bold mb-2" />

            <x-text-input id="password" class="appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="text-red-500 text-xs italic" />
        
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="block text-gray-700 font-bold">
                <input id="remember_me" type="checkbox" class="mr-2 leading-tight" name="remember">
                <span class="text-sm">
                    {{ __('Remember me') }}
                </span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>