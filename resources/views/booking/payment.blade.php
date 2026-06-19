<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Payment Proof') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <div class="mb-8 border-b pb-6">
                        <h3 class="text-lg font-bold mb-4">Booking Reference: <span class="text-blue-600">{{ $booking->booking_code }}</span></h3>
                        
                        <div class="grid grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-500">Vehicle</p>
                                <p class="font-semibold">{{ $booking->vehicle->brand }} {{ $booking->vehicle->model }}</p>
                            </div>
                            <div>
                                <p class="text-gray-500">Duration</p>
                                <p class="font-semibold">{{ $booking->start_date }} to {{ $booking->end_date }}</p>
                            </div>
                        </div>

                        <div class="mt-6 bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-500 text-sm">Total Amount to Pay</p>
                            <p class="text-3xl font-bold text-gray-900">Rp {{ number_format($booking->total_price, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div>
                        <h4 class="font-bold mb-2">Payment Instructions</h4>
                        <p class="text-sm text-gray-600 mb-4">
                            Please transfer the exact amount to the following bank account and upload your payment proof.
                        </p>
                        
                        <div class="bg-blue-50 border border-blue-100 p-4 rounded-lg mb-6 text-sm">
                            <p class="font-semibold">Bank BCA</p>
                            <p class="text-xl tracking-wider my-1">1234 5678 90</p>
                            <p class="text-gray-600">A/N PT RentCar Indo</p>
                        </div>

                        @if($errors->any())
                            <div class="bg-red-50 text-red-600 p-4 rounded-lg mb-4">
                                <ul class="list-disc list-inside text-sm">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('booking.uploadPayment', $booking->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-6">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Payment Receipt / Proof</label>
                                <input type="file" name="payment_proof" accept="image/*" required class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
                                <p class="mt-1 text-xs text-gray-500">JPG, PNG up to 2MB.</p>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-3 rounded-md hover:bg-blue-700 font-medium transition duration-150 ease-in-out">
                                Submit Payment Proof
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
