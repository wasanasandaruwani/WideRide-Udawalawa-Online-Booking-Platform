@extends('layouts.app')

@section('title', 'Payments Table')

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Payments</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Booking ID</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Method</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $payment->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $payment->booking_id }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->payment_type) }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->method) }}</td>
                    <td class="py-2 px-4 border-b">LKR {{ number_format($payment->amount, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->status) }}</td>
                    <td class="py-2 px-4 border-b">{{ $payment->created_at->format('Y-m-d') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
