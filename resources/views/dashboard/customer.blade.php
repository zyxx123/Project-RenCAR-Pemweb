<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-white tracking-tight leading-tight">
            {{ __('Pesanan Saya') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 shadow-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Customer Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg class="w-16 h-16 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-3xl font-extrabold text-blue-600">{{ auth()->user()->bookings()->count() }}</h4>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide mt-1">Total Pesanan</p>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-10">
                        <svg class="w-16 h-16 text-emerald-600" fill="currentColor" viewBox="0 0 24 24"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg>
                    </div>
                    <div class="relative z-10">
                        <h4 class="text-3xl font-extrabold text-emerald-600">{{ auth()->user()->bookings()->where('status', 'paid')->count() }}</h4>
                        <p class="text-sm font-semibold text-slate-500 uppercase tracking-wide mt-1">Perjalanan Selesai</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    <div class="flex justify-between items-center mb-8 border-b border-slate-100 pb-4">
                        <h3 class="text-xl font-bold text-slate-800">Riwayat Pesanan</h3>
                        <a href="{{ route('home') }}" class="bg-blue-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md hover:shadow-blue-500/30 hover:bg-blue-700 transition-all">Pesan Kendaraan Lain</a>
                    </div>
                    
                    @if($bookings->isEmpty())
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <p class="text-slate-500 mb-4 text-lg">Anda belum membuat pesanan apapun.</p>
                            <a href="{{ route('home') }}" class="text-blue-600 hover:text-blue-700 font-semibold hover:underline">Jelajahi mobil kami</a>
                        </div>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($bookings as $booking)
                                <div class="bg-white border border-slate-200 rounded-2xl p-6 relative shadow-sm hover:shadow-md transition-shadow group">
                                    <span class="absolute top-6 right-6 px-3 py-1 text-xs font-extrabold uppercase tracking-wider rounded-full shadow-sm
                                        {{ $booking->status === 'paid' ? 'bg-emerald-100 text-emerald-700' : '' }}
                                        {{ $booking->status === 'pending' ? 'bg-amber-100 text-amber-700' : '' }}
                                        {{ $booking->status === 'waiting_verification' ? 'bg-blue-100 text-blue-700' : '' }}
                                        {{ $booking->status === 'rejected' || $booking->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                                    ">
                                        {{ str_replace('_', ' ', $booking->status) }}
                                    </span>
                                    
                                    <h4 class="font-bold text-xl text-slate-800 mb-1 pr-24 line-clamp-1">{{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}</h4>
                                    <p class="text-sm font-mono text-slate-500 mb-6 bg-slate-50 inline-block px-2 py-1 rounded">#{{ $booking->booking_code }}</p>
                                    
                                    <div class="grid grid-cols-2 gap-4 text-sm mb-6 bg-slate-50 p-4 rounded-xl border border-slate-100">
                                        <div>
                                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Pengambilan</p>
                                            <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($booking->start_date)->format('M d, Y') }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Pengembalian</p>
                                            <p class="font-bold text-slate-800">{{ \Carbon\Carbon::parse($booking->end_date)->format('M d, Y') }}</p>
                                        </div>
                                    </div>
                                    
                                    <div class="border-t border-slate-100 pt-5 flex justify-between items-center">
                                        <div>
                                            <p class="text-xs font-semibold text-slate-500 uppercase tracking-wide mb-1">Total Harga</p>
                                            <p class="font-black text-lg text-slate-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                                        </div>
                                        
                                        @if($booking->status === 'pending')
                                            <a href="{{ route('booking.payment', $booking->id) }}" class="bg-amber-500 text-white px-4 py-2 rounded-lg text-sm font-bold shadow-md hover:bg-amber-600 hover:shadow-amber-500/30 transition-all">Bayar Sekarang</a>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
