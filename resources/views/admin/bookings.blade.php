@extends('layouts.app')
@section('title', 'Manage Bookings')
@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Manage Bookings</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Jeep</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Time Slot</th>
                    <th class="py-2 px-4 border-b">People</th>
                    <th class="py-2 px-4 border-b">Total Price</th>
                    <th class="py-2 px-4 border-b">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $booking->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->user->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->jeep->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->booking_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->time_slot }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->num_people }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->total_price }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
