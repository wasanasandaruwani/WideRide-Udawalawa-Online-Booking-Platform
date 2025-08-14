@extends('layouts.app')

@section('title', 'Make Payment')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-white to-green-100 py-12 px-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10">
        <h1 class="text-3xl font-bold text-yellow-600 mb-6 text-center">Payment for Booking #{{ $booking->id }}</h1>
        <div class="mb-6 text-center">
            <span class="text-lg text-gray-700">Total: LKR {{ number_format($booking->total_price, 2) }}</span>
        </div>
        <form method="POST" action="{{ route('payments.store', $booking) }}" class="space-y-6">
            @csrf
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Payment Type</label>
                <select name="payment_type" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="full">Full Payment</option>
                    <option value="advance">Advance Payment</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Payment Method</label>
                <select name="method" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
                    <option value="card">Card</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
            <div>
                <label class="block text-gray-700 font-semibold mb-2">Amount</label>
                <input type="number" name="amount" min="1" max="{{ $booking->total_price }}" step="0.01" class="w-full border border-gray-300 rounded-lg px-4 py-2" required>
            </div>
            <button type="submit" class="w-full py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-lg shadow transition duration-300 text-lg">Pay Now</button>
        </form>
        <div class="mt-8 text-center">
            <a href="/" class="inline-block px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg transition">Back to Home</a>
        </div>
    </div>
</div>
@endsection
