@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('styles')
<style>
    /*  admin dashboard  */
    body {
        background: linear-gradient(135deg, #fef9c3 0%, #d1fae5 100%);
        min-height: 100vh;
    }
    .dashboard-card {
        transition: transform 0.2s, box-shadow 0.2s;
        background: linear-gradient(120deg, #fef9c3 60%, #fbbf24 100%);
        border: 1px solid #fde68a;
        box-shadow: 0 2px 16px 0 rgba(251, 191, 36, 0.10);
    }
    .dashboard-card:hover {
        transform: translateY(-6px) scale(1.05);
        box-shadow: 0 8px 32px 0 rgba(31, 41, 55, 0.18);
        border-color: #fbbf24;
    }
    .dashboard-table th {
        background: linear-gradient(90deg, #fbbf24 0%, #fef9c3 100%);
        color: #1f2937;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-shadow: 0 1px 0 #fffbe6;
    }
    .dashboard-table td, .dashboard-table th {
        padding: 0.75rem 1.25rem;
    }
    .dashboard-table tr {
        transition: background 0.2s;
    }
    .dashboard-table tr:hover {
        background: #fef3c7;
    }
    .dashboard-btn {
        box-shadow: 0 2px 8px 0 rgba(251, 191, 36, 0.15);
        transition: box-shadow 0.2s, transform 0.2s, background 0.2s;
        font-weight: 600;
        letter-spacing: 0.5px;
        border: none;
        outline: none;
    }
    .dashboard-btn:focus {
        outline: 2px solid #fbbf24;
        outline-offset: 2px;
    }
    .dashboard-btn:hover {
        box-shadow: 0 4px 16px 0 rgba(251, 191, 36, 0.25);
        transform: scale(1.06);
        filter: brightness(1.08);
    }
    .dashboard-table {
        border-radius: 1rem;
        overflow: hidden;
    }
    .dashboard-table td {
        background: #fffbe6;
    }
    .dashboard-table tr:nth-child(even) td {
        background: #fef9c3;
    }
    .dashboard-table tr:last-child td {
        border-bottom: none;
    }
    .dashboard-section-title {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #b45309;
        margin-bottom: 0.5rem;
        font-size: 1.25rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .dashboard-avatar {
        width: 56px;
        height: 56px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fde68a;
        box-shadow: 0 2px 8px 0 rgba(251, 191, 36, 0.15);
        margin-bottom: 0.5rem;
    }
    .dashboard-welcome {
        font-size: 1.1rem;
        color: #6b7280;
        margin-bottom: 1.5rem;
    }
</style>
@endsection

@section('scripts')
<script>
    // Add a fade-in effect to dashboard cards
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.dashboard-card').forEach(function(card, i) {
            card.style.opacity = 0;
            setTimeout(function() {
                card.style.transition = 'opacity 0.7s, transform 0.4s';
                card.style.opacity = 1;
                card.style.transform = 'translateY(0)';
            }, 200 + i * 120);
        });
    });
</script>
@endsection

@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>
        <p class="dashboard-welcome mb-4">Welcome, {{ Auth::user()->name }} (Admin)</p>
        <div class="mb-6 flex gap-4">
            <a href="{{ route('admin.users') }}" class="dashboard-btn px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Manage Users</a>
            <a href="{{ route('admin.jeeps') }}" class="dashboard-btn px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">Manage Jeeps</a>
            <a href="{{ route('admin.bookings') }}" class="dashboard-btn px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">Manage Bookings</a>
            <a href="{{ route('admin.contact-messages') }}" class="dashboard-btn px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">View Contact Messages</a>
        </div>
        <h2 class="dashboard-section-title">User Table</h2>
        <table class="dashboard-table min-w-full bg-white border border-gray-200 mb-8 rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Admin</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.users.edit', $user) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this user?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="dashboard-section-title">Jeep Table</h2>
        <table class="dashboard-table min-w-full bg-white border border-gray-200 mb-8 rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Seats</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jeeps as $jeep)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $jeep->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->description }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->price }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->seats }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.jeeps.edit', $jeep) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.jeeps.destroy', $jeep) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this jeep?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="dashboard-section-title">Booking Table</h2>
        <table class="dashboard-table min-w-full bg-white border border-gray-200 mb-8 rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Package</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Time Slot</th>
                    <th class="py-2 px-4 border-b">People</th>
                    <th class="py-2 px-4 border-b">Total Price</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $booking->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->user->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->safariPackage->name ?? '-' }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->booking_date }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->time_slot }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->num_people }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->total_price }}</td>
                    <td class="py-2 px-4 border-b">{{ $booking->status }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.bookings.destroy', $booking) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this booking?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="dashboard-section-title">Payments Table</h2>
        <table class="dashboard-table min-w-full bg-white border border-gray-200 mb-8 rounded-xl overflow-hidden">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Booking ID</th>
                    <th class="py-2 px-4 border-b">Type</th>
                    <th class="py-2 px-4 border-b">Method</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach(\App\Models\Payment::all() as $payment)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $payment->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $payment->booking_id }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->payment_type) }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->method) }}</td>
                    <td class="py-2 px-4 border-b">LKR {{ number_format($payment->amount, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ ucfirst($payment->status) }}</td>
                    <td class="py-2 px-4 border-b">{{ $payment->created_at->format('Y-m-d') }}</td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.payments.edit', $payment) }}" class="text-blue-600 hover:underline mr-2">Edit</a>
                        <form action="{{ route('admin.payments.destroy', $payment) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this payment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2 class="dashboard-section-title">Safari Packages</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            @foreach(\App\Models\SafariPackage::all() as $package)
            <div class="dashboard-card bg-yellow-50 rounded-lg p-6 flex flex-col items-center shadow">
                <span class="text-lg font-bold text-yellow-700 mb-2">{{ $package->name }}</span>
                <span class="text-gray-600 mb-2">{{ $package->description }}</span>
                <span class="text-green-600 font-bold mb-4">LKR {{ number_format($package->price, 2) }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
