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
    @include('layouts.navigation')

    <!-- Hero Section -->
    <div class="relative pt-32 pb-20 lg:pt-48 lg:pb-32 hero-gradient overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1485291571150-772bcfc10da5?q=80&w=2000&auto=format&fit=crop" class="w-full h-full object-cover opacity-20" alt="Hero Background">
            <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-transparent to-transparent"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-10">
            <h1 class="text-5xl font-extrabold text-white sm:text-6xl md:text-7xl tracking-tight mb-6">
                Wujudkan <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-emerald-400">Impian</span> Anda.
            </h1>
            <p class="mt-4 max-w-2xl text-lg text-slate-300 mx-auto font-light leading-relaxed mb-10">
                Rasakan kebebasan berkendara. Mobil premium, pemesanan instan, dan harga transparan khusus untuk Anda.
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
                <p class="text-gray-500 text-sm">&copy; {{ date('Y') }} Sistem Pemesanan RentCar. Hak Cipta Dilindungi.</p>
            </div>
        </div>
    </footer>
</body>
</html>
