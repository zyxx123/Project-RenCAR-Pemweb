<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-white tracking-tight leading-tight">
            {{ __('Dasbor Admin') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 rounded-xl mb-6 shadow-sm border border-green-200">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Admin Stat Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-5">
                        <svg class="w-20 h-20 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="text-blue-500 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900">{{ \App\Models\User::where('role', 'customer')->count() }}</h4>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mt-1">Total Pelanggan</p>
                    </div>
                </div>
                
                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-5">
                        <svg class="w-20 h-20 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="text-emerald-500 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path></svg>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900">{{ \App\Models\Booking::where('status', 'paid')->count() }}</h4>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mt-1">Pesanan Selesai</p>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 right-0 p-4 opacity-5">
                        <svg class="w-20 h-20 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <div class="relative z-10">
                        <div class="text-amber-500 mb-2">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <h4 class="text-3xl font-black text-slate-900">Rp {{ number_format(\App\Models\Booking::where('status', 'paid')->sum('total_price'), 0, ',', '.') }}</h4>
                        <p class="text-sm font-bold text-slate-500 uppercase tracking-wider mt-1">Total Pendapatan</p>
                    </div>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-2xl border border-slate-100">
                <div class="p-8 text-slate-900">
                    <div class="flex justify-between items-center mb-8 border-b border-slate-100 pb-4">
                        <h3 class="text-xl font-bold text-slate-800">Kelola Pesanan</h3>
                        <a href="{{ route('admin.reports.print') }}" target="_blank" class="bg-indigo-600 text-white px-5 py-2.5 rounded-xl text-sm font-bold shadow-md hover:shadow-indigo-500/30 hover:bg-indigo-700 transition-all flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path></svg>
                            Cetak Laporan
                        </a>
                    </div>
                    
                    @if($bookings->isEmpty())
                        <div class="text-center py-12">
                            <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-10 h-10 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                            </div>
                            <p class="text-slate-500 text-lg">Belum ada pesanan di sistem.</p>
                        </div>
                    @else
                        <div class="overflow-x-auto border border-slate-200 rounded-xl">
                            <table class="min-w-full divide-y divide-slate-200">
                                <thead class="bg-slate-50">
                                    <tr>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Kode Pesanan</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Pelanggan</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Mobil</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Total Harga</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                                        <th class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-slate-100">
                                    @foreach($bookings as $booking)
                                        <tr class="hover:bg-slate-50 transition-colors">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-mono text-slate-900 bg-slate-50/50">#{{ $booking->booking_code }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-slate-700">{{ $booking->user->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-600">{{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-slate-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-3 py-1 inline-flex text-xs leading-5 font-extrabold uppercase tracking-wider rounded-full shadow-sm
                                                    {{ $booking->status === 'paid' ? 'bg-emerald-100 text-emerald-800' : '' }}
                                                    {{ $booking->status === 'pending' ? 'bg-amber-100 text-amber-800' : '' }}
                                                    {{ $booking->status === 'waiting_verification' ? 'bg-blue-100 text-blue-800' : '' }}
                                                    {{ $booking->status === 'rejected' || $booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}
                                                ">
                                                    {{ str_replace('_', ' ', $booking->status) }}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                @if($booking->status === 'waiting_verification')
                                                    <a href="{{ asset('storage/' . $booking->payment->payment_proof_path) }}" target="_blank" class="text-blue-600 font-bold hover:text-blue-800 mb-3 flex items-center gap-1">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                        Lihat Bukti
                                                    </a>
                                                    
                                                    <div class="flex space-x-3 border-t border-slate-100 pt-3">
                                                        <form action="{{ route('admin.booking.verify', $booking->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-white font-bold bg-emerald-500 hover:bg-emerald-600 px-3 py-1.5 rounded-lg shadow-sm transition-colors">Verifikasi</button>
                                                        </form>
                                                        <form action="{{ route('admin.booking.reject', $booking->id) }}" method="POST">
                                                            @csrf
                                                            <button type="submit" class="text-white font-bold bg-red-500 hover:bg-red-600 px-3 py-1.5 rounded-lg shadow-sm transition-colors">Tolak</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
