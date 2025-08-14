@extends('layouts.app')

@section('title', 'Booking Confirmation')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-yellow-100 via-white to-green-100 py-12 px-4">
    <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl p-10">
        <h1 class="text-3xl font-bold text-yellow-600 mb-6 text-center">Booking Confirmed!</h1>
        <div class="mb-6 text-center">
            <span class="text-lg text-gray-700">Thank you for booking your safari with us.</span>
        </div>
        <div class="space-y-4">
            <div><span class="font-semibold text-gray-700">Booking ID:</span> {{ $booking->id }}</div>
            <div><span class="font-semibold text-gray-700">Jeep:</span> {{ $booking->jeep->name ?? 'N/A' }}</div>
            <div><span class="font-semibold text-gray-700">Date:</span> {{ $booking->booking_date }}</div>
            <div><span class="font-semibold text-gray-700">Time Slot:</span> {{ ucfirst($booking->time_slot) }}</div>
            <div><span class="font-semibold text-gray-700">Number of People:</span> {{ $booking->num_people }}</div>
            <div><span class="font-semibold text-gray-700">Total Price:</span> LKR {{ number_format($booking->total_price, 2) }}</div>
            <div><span class="font-semibold text-gray-700">Add-ons:</span> {{ $booking->add_ons ? implode(', ', $booking->add_ons) : 'None' }}</div>
            <div><span class="font-semibold text-gray-700">Promo Code:</span> {{ $booking->promo_code ?? 'None' }}</div>
            <div><span class="font-semibold text-gray-700">Discount:</span> LKR {{ number_format($booking->discount, 2) }}</div>
            <div><span class="font-semibold text-gray-700">Special Requests:</span> {{ $booking->special_requests ?? 'None' }}</div>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-bold text-green-700 mb-2">Payment Details</h2>
            @if($booking->payments && $booking->payments->count())
                <table class="min-w-full text-left mb-4">
                    <thead>
                        <tr>
                            <th class="py-1 px-2">Amount</th>
                            <th class="py-1 px-2">Status</th>
                            <th class="py-1 px-2">Type</th>
                            <th class="py-1 px-2">Method</th>
                            <th class="py-1 px-2">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($booking->payments as $payment)
                        <tr>
                            <td class="py-1 px-2">LKR {{ number_format($payment->amount, 2) }}</td>
                            <td class="py-1 px-2">{{ ucfirst($payment->status) }}</td>
                            <td class="py-1 px-2">{{ $payment->payment_type ?? '-' }}</td>
                            <td class="py-1 px-2">{{ $payment->method ?? '-' }}</td>
                            <td class="py-1 px-2">{{ $payment->created_at ? $payment->created_at->format('Y-m-d H:i') : '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-gray-500">No payment records found for this booking.</div>
            @endif
        </div>
        <div class="flex items-center justify-between mt-4">
            <a href="{{ route('payments.create', $booking) }}" class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white font-bold rounded-lg shadow transition duration-300 text-lg text-center">Go to Payment</a>
        </div>
        <div class="mt-8 text-center">
            <a href="/" class="inline-block px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg transition">Back to Home</a>
        </div>
    </div>
</div>
@endsection
