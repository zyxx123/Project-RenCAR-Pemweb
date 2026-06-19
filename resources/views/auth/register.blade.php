<x-guest-layout>
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-gray-900">Buat Akun Baru</h2>
        <p class="text-gray-500 mt-2">Bergabunglah dengan kami dan mulai pesan mobil premium.</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-semibold text-gray-700">Nama Lengkap</label>
            <input id="name" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <label for="email" class="block text-sm font-semibold text-gray-700">Alamat Email</label>
            <input id="email" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <label for="password" class="block text-sm font-semibold text-gray-700">Kata Sandi</label>
            <input id="password" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <label for="password_confirmation" class="block text-sm font-semibold text-gray-700">Konfirmasi Kata Sandi</label>
            <input id="password_confirmation" class="block mt-2 w-full rounded-xl border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 px-4 py-3" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="mt-8">
            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-3.5 px-4 rounded-xl shadow-lg hover:shadow-blue-500/30 hover:bg-blue-500 transition-all duration-200">
                Daftar Sekarang
            </button>
        </div>

        <div class="mt-8 text-center">
            <p class="text-sm text-gray-600 font-medium">Sudah punya akun? 
                <a href="{{ route('login') }}" class="text-blue-600 font-bold hover:underline">Masuk di sini</a>
            </p>
        </div>
    </form>
</x-guest-layout>
