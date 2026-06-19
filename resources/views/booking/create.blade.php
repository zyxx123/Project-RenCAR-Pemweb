<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book Vehicle') }}: {{ $vehicle->brand }} {{ $vehicle->model }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Vehicle Info -->
                    <div>
                        @if($vehicle->image_path)
                            <img src="{{ asset('storage/' . $vehicle->image_path) }}" alt="{{ $vehicle->brand }}" class="w-full h-64 object-cover rounded-lg shadow-md mb-4">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center rounded-lg shadow-md mb-4">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                        <h3 class="text-2xl font-bold mb-2">{{ $vehicle->brand }} {{ $vehicle->model }} ({{ $vehicle->year }})</h3>
                        <p class="text-gray-600 mb-4">{{ $vehicle->description }}</p>
                        
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <span class="text-sm text-gray-500">Price per day</span>
                            <div class="text-3xl font-bold text-blue-600">Rp {{ number_format($vehicle->price_per_day, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <div>
                        <h4 class="text-lg font-semibold mb-4">Booking Details</h4>
                        
                        @if($errors->any())
                            <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-4">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('booking.store', $vehicle->id) }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="start_date" class="block text-sm font-medium text-gray-700">Start Date</label>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <div class="mb-6">
                                <label for="end_date" class="block text-sm font-medium text-gray-700">End Date</label>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-md hover:bg-blue-700 font-medium transition duration-150 ease-in-out text-center">
                                Proceed to Payment
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
