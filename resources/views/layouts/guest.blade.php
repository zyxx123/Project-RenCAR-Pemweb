<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'RentCar') }} - Authentication</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            body { font-family: 'Inter', sans-serif; }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased selection:bg-blue-600 selection:text-white">
        <div class="min-h-screen flex">
            <!-- Left Side: Image / Branding -->
            <div class="hidden lg:flex lg:w-1/2 relative bg-slate-900 items-center justify-center overflow-hidden">
                <div class="absolute inset-0">
                    <img src="{{ asset('storage/vehicles/camry.jpg') }}" class="w-full h-full object-cover opacity-40" alt="Premium Cars">
                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
                </div>
                <div class="relative z-10 px-12 text-white">
                    <a href="/" class="flex items-center gap-2 mb-8 cursor-pointer">
                        <svg class="w-10 h-10 text-blue-500" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
                        <span class="text-3xl font-extrabold tracking-tight text-white">Rent<span class="text-blue-500">Car</span></span>
                    </a>
                    <h1 class="text-4xl font-bold mb-4 leading-tight">Your Journey <br> Begins Here.</h1>
                    <p class="text-slate-300 text-lg">Sign in to access premium vehicles, track your bookings, and manage your account seamlessly.</p>
                </div>
            </div>

            <!-- Right Side: Auth Form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center bg-white p-8 sm:p-12 lg:p-24">
                <div class="w-full max-w-md">
                    <!-- Mobile Logo -->
                    <div class="lg:hidden flex items-center justify-center gap-2 mb-10">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
                        <span class="text-2xl font-extrabold tracking-tight text-gray-900">Rent<span class="text-blue-600">Car</span></span>
                    </div>

                    {{ $slot }}
                    
                </div>
            </div>
        </div>
    </body>
</html>
