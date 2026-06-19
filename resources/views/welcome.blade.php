<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RentCar - Premium Vehicle Rental</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
        }
        .hero-gradient {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%);
        }
        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-900 antialiased selection:bg-blue-600 selection:text-white">
    <!-- Navbar -->
    <nav class="bg-white/80 backdrop-blur-md border-b border-white/20 shadow-sm fixed w-full z-50 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-10">
                    <a href="{{ route('home') }}" class="flex items-center gap-2 cursor-pointer">
                        <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
                        <span class="text-2xl font-extrabold tracking-tight text-slate-900">Rent<span class="text-blue-600">Car</span></span>
                    </a>
                    
                    <div class="hidden sm:-my-px sm:flex space-x-8 h-16">
                        @auth
                            <x-nav-link :href="route('dashboard')" :active="false" class="text-sm font-semibold text-gray-500 hover:text-gray-900">
                                Dashboard
                            </x-nav-link>
                        @endauth
                        <x-nav-link :href="route('home')" :active="true" class="text-sm font-semibold text-gray-900">
                            Home
                        </x-nav-link>
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <x-nav-link :href="route('admin.vehicles.index')" :active="false" class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                                    Manage Vehicles
                                </x-nav-link>
                                <x-nav-link :href="route('admin.users.index')" :active="false" class="text-sm font-semibold text-blue-600 hover:text-blue-800">
                                    Manage Users
                                </x-nav-link>
                            @endif
                        @endauth
                    </div>
                </div>
                <div class="flex items-center space-x-6">
                    @auth
                        <div class="hidden sm:flex sm:items-center sm:ms-6">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button class="inline-flex items-center px-4 py-2 border border-slate-200 shadow-sm text-sm leading-4 font-semibold rounded-full text-slate-600 bg-white/80 hover:text-slate-800 hover:bg-slate-50 focus:outline-none transition ease-in-out duration-150 backdrop-blur-md">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')" class="font-medium text-sm">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                                onclick="event.preventDefault();
                                                            this.closest('form').submit();" class="font-medium text-sm text-red-600 hover:text-red-700">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-700 hover:text-blue-600 transition-colors">Sign In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm font-semibold bg-gray-900 text-white px-5 py-2.5 rounded-full hover:bg-gray-800 transition-all shadow-md hover:shadow-lg">Create Account</a>
                        @endif
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 hero-gradient overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1485291571150-772bcfc10da5?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover opacity-20" alt="Hero Background">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-5xl font-extrabold text-white sm:text-6xl md:text-7xl tracking-tight mb-6">
                Drive Your <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Dream</span> Today.
            </h1>
            <p class="mt-4 max-w-2xl text-lg text-slate-300 mx-auto font-light leading-relaxed mb-10">
                Experience the ultimate freedom on the road. Premium vehicles, seamless booking, and transparent pricing tailored just for you.
            </p>
            
        </div>
    </div>

    <!-- Livewire Vehicle Search Component -->
    <livewire:vehicle-search />

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-12">
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
                    <span class="text-xl font-bold text-gray-900">Rent<span class="text-blue-600">Car</span></span>
                </div>
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} RentCar Booking System. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
