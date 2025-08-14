@extends('layouts.app')

@section('title', 'Payment')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-white to-green-100 py-12 px-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10">
        <h1 class="text-3xl font-bold text-yellow-600 mb-6 text-center">Payment for Booking #{{ $booking->id }}</h1>
        <div class="mb-6 text-center">
            <span class="text-lg text-gray-700">Total: LKR {{ number_format($booking->total_price, 2) }}</span>
        </div>
        <form method="POST" action="{{ route('bookings.stripe.checkout', $booking) }}">
            @csrf
            <div class="mb-6">
                <label for="advance_amount" class="block text-gray-700 font-semibold mb-2 text-center">Select Advance Payment Amount</label>
                <select name="advance_amount" id="advance_amount" class="w-full border border-gray-300 rounded-lg px-4 py-2 mb-4 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white" required>
                    <option value="">-- Select Advance Payment --</option>
                    <option value="0.25">25% (LKR {{ number_format($booking->total_price * 0.25, 2) }})</option>
                    <option value="0.50">50% (LKR {{ number_format($booking->total_price * 0.50, 2) }})</option>
                    <option value="1.00">100% (LKR {{ number_format($booking->total_price, 2) }})</option>
                </select>
            </div>
            <button type="submit" class="w-full py-3 bg-green-500 hover:bg-green-600 text-white font-bold rounded-lg shadow transition duration-300 text-lg">Pay with Card</button>
        </form>
        <div class="mt-8 text-center">
            <a href="/" class="inline-block px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg transition">Back to Home</a>
        </div>
    </div>
</div>
@endsection
