<?php

use Livewire\Component;
use App\Models\Vehicle;
use App\Models\Category;

new class extends Component
{
    public $search = '';
    public $category_id = '';

    public function with()
    {
        $query = Vehicle::with('category')->where('status', 'available');

        if ($this->category_id) {
            $query->where('category_id', $this->category_id);
        }

        if ($this->search) {
            $search = $this->search;
            $query->where(function($q) use ($search) {
                $q->where('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
            });
        }

        return [
            'vehicles' => $query->get(),
            'categories' => Category::all(),
        ];
    }
};
?>

<div>
    <!-- Search Widget (Pulled up into the hero section) -->
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center z-20" style="margin-top: -4rem;">
        <div class="max-w-4xl mx-auto bg-white/10 backdrop-blur-md p-3 rounded-2xl border border-white/20 shadow-2xl">
            <div class="flex flex-col md:flex-row gap-3">
                <div class="flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input wire:model.live.debounce.300ms="search" type="text" placeholder="Cari merek atau model..." class="w-full pl-11 pr-4 py-3.5 bg-white rounded-xl border-0 focus:ring-2 focus:ring-blue-500 text-gray-900 placeholder-gray-500 font-medium">
                </div>
                <div class="md:w-64">
                    <select wire:model.live="category_id" class="w-full px-4 py-3.5 bg-white rounded-xl border-0 focus:ring-2 focus:ring-blue-500 text-gray-900 font-medium appearance-none">
                        <option value="">Semua Kategori</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- The Search button is removed because search is live -->
            </div>
        </div>
    </div>

    <!-- Vehicle Listing -->
    <div class="max-w-7xl mx-auto py-20 px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">Armada Premium Kami</h2>
                <p class="mt-2 text-gray-500">Pilih dari koleksi {{ $vehicles->count() }} mobil kelas atas kami.</p>
            </div>
        </div>
        
        @if($vehicles->isEmpty())
            <div class="text-center py-20 bg-white rounded-3xl shadow-sm border border-gray-100">
                <svg class="mx-auto h-16 w-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                <p class="mt-4 text-gray-500 text-lg font-medium">Tidak ada mobil yang sesuai dengan kriteria Anda.</p>
                <button wire:click="$set('search', ''); $set('category_id', '')" class="mt-4 inline-block text-blue-600 font-medium hover:underline">Hapus Filter</button>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($vehicles as $vehicle)
                    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover transition-all duration-300 flex flex-col group">
                        <div class="relative h-56 bg-gray-100 overflow-hidden">
                            @if($vehicle->image_path)
                                <img src="{{ asset('storage/' . $vehicle->image_path) }}" alt="{{ $vehicle->brand }} {{ $vehicle->model }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gray-200">
                                    <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-4 right-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/90 backdrop-blur text-gray-900 shadow-sm">
                                    {{ $vehicle->category->name }}
                                </span>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow relative">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <p class="text-sm font-semibold text-blue-600 mb-1 uppercase tracking-wider">{{ $vehicle->brand }}</p>
                                    <h3 class="text-xl font-bold text-gray-900 leading-tight">{{ $vehicle->model }}</h3>
                                    <p class="text-sm text-gray-500 mt-1">{{ $vehicle->year }} &bull; Auto</p>
                                </div>
                            </div>
                            <div class="mt-auto pt-4 border-t border-gray-100 flex items-center justify-between">
                                <div>
                                    <span class="text-2xl font-extrabold text-gray-900">Rp {{ number_format($vehicle->price_per_day, 0, ',', '.') }}</span>
                                    <span class="text-sm text-gray-500 font-medium">/ hari</span>
                                </div>
                                <a href="{{ route('booking.create', $vehicle->id) }}" class="inline-flex items-center justify-center w-10 h-10 bg-gray-900 text-white rounded-full hover:bg-blue-600 transition-colors shadow-md">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>