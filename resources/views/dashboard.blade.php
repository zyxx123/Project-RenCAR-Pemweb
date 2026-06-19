<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-slate-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8">
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Welcome back, {{ auth()->user()->name }}! 👋</h3>
                    <p class="text-slate-500 mb-8">Here's what's happening with your account today.</p>

                    @if(auth()->user()->role === 'admin')
                        <!-- Admin Stat Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                                <div class="text-blue-500 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                </div>
                                <h4 class="text-2xl font-bold text-slate-900">{{ \App\Models\User::where('role', 'customer')->count() }}</h4>
                                <p class="text-sm font-medium text-slate-600 uppercase tracking-wide">Total Customers</p>
                            </div>
                            
                            <div class="bg-emerald-50 rounded-xl p-6 border border-emerald-100">
                                <div class="text-emerald-500 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                                </div>
                                <h4 class="text-2xl font-bold text-slate-900">{{ \App\Models\Booking::where('status', 'paid')->count() }}</h4>
                                <p class="text-sm font-medium text-slate-600 uppercase tracking-wide">Successful Bookings</p>
                            </div>

                            <div class="bg-amber-50 rounded-xl p-6 border border-amber-100">
                                <div class="text-amber-500 mb-2">
                                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <h4 class="text-2xl font-bold text-slate-900">Rp {{ number_format(\App\Models\Booking::where('status', 'paid')->sum('total_price'), 0, ',', '.') }}</h4>
                                <p class="text-sm font-medium text-slate-600 uppercase tracking-wide">Total Revenue</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <a href="{{ route('admin.bookings.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-all">
                                Manage Bookings
                            </a>
                            <a href="{{ route('admin.vehicles.index') }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-medium rounded-xl text-slate-700 bg-white hover:bg-slate-50 shadow-sm transition-all">
                                Manage Vehicles
                            </a>
                        </div>
                    @else
                        <!-- Customer Stats -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                            <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                                <h4 class="text-3xl font-bold text-slate-900">{{ auth()->user()->bookings()->count() }}</h4>
                                <p class="text-sm font-medium text-slate-600 uppercase tracking-wide mt-1">Total My Bookings</p>
                            </div>
                            <div class="bg-emerald-50 rounded-xl p-6 border border-emerald-100">
                                <h4 class="text-3xl font-bold text-slate-900">{{ auth()->user()->bookings()->where('status', 'paid')->count() }}</h4>
                                <p class="text-sm font-medium text-slate-600 uppercase tracking-wide mt-1">Completed Trips</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <a href="{{ route('home') }}" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl text-white bg-blue-600 hover:bg-blue-700 shadow-sm transition-all">
                                Book a Vehicle
                            </a>
                            <a href="{{ route('booking.history') }}" class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-base font-medium rounded-xl text-slate-700 bg-white hover:bg-slate-50 shadow-sm transition-all">
                                View My History
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
