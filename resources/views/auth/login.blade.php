<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">Selamat Datang Kembali</h2>
        <p class="text-gray-500 mt-2">Silakan masuk ke akun Anda untuk melanjutkan.</p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
            <input id="email" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
            <input id="password" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500" name="remember">
                <span class="ms-2 text-sm text-gray-600 font-medium">{{ __('Ingat saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a class="text-sm font-semibold text-blue-600 hover:text-blue-500 hover:underline" href="{{ route('password.request') }}">
                    {{ __('Lupa kata sandi?') }}
                </a>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-blue-500/30 hover:bg-blue-500 transition-all duration-200">
                Masuk
            </button>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600 font-medium">Belum punya akun? 
                <a href="{{ route('register') }}" class="text-blue-600 font-bold hover:underline">Daftar sekarang</a>
            </p>
        </div>
    </form>
</x-guest-layout>
