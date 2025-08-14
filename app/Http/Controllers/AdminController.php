<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Jeep;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $users = User::all();
        $jeeps = Jeep::all();
        $bookings = Booking::all();
        return view('admin.dashboard', compact('users', 'jeeps', 'bookings'));
    }

    // User Management
    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    // Jeep Management
    public function jeeps()
    {
        $jeeps = Jeep::all();
        return view('admin.jeeps', compact('jeeps'));
    }

    // Booking Management
    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings', compact('bookings'));
    }

    // Payment Management
    public function paymentsTable() {
        $payments = Payment::latest()->get();
        return view('admin.payments', compact('payments'));
    }

    // Contact Messages Management
    public function contactMessages()
    {
        $messages = \App\Models\ContactMessage::latest()->paginate(9);
        return view('admin.contact-messages', compact('messages'));
    }

    // User CRUD
    public function editUser(User $user) {
        return view('admin.edit-user', compact('user'));
    }
    public function updateUser(Request $request, User $user) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'is_admin' => 'boolean',
        ]);
        $user->update($request->only('name', 'email', 'is_admin'));
        return redirect()->route('admin.dashboard')->with('success', 'User updated');
    }
    public function destroyUser(User $user) {
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User deleted');
    }
    // Jeep CRUD
    public function editJeep(Jeep $jeep) {
        return view('admin.edit-jeep', compact('jeep'));
    }
    public function updateJeep(Request $request, Jeep $jeep) {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'seats' => 'required|integer',
        ]);
        $jeep->update($request->only('name', 'description', 'price', 'seats'));
        return redirect()->route('admin.dashboard')->with('success', 'Jeep updated');
    }
    public function destroyJeep(Jeep $jeep) {
        $jeep->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Jeep deleted');
    }
    // Booking CRUD
    public function editBooking(Booking $booking) {
        return view('admin.edit-booking', compact('booking'));
    }
    public function updateBooking(Request $request, Booking $booking) {
        $request->validate([
            'booking_date' => 'required|date',
            'time_slot' => 'required',
            'num_people' => 'required|integer',
            'total_price' => 'required|numeric',
            'status' => 'required',
        ]);
        $booking->update($request->only('booking_date', 'time_slot', 'num_people', 'total_price', 'status'));
        return redirect()->route('admin.dashboard')->with('success', 'Booking updated');
    }
    public function destroyBooking(Booking $booking) {
        $booking->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Booking deleted');
    }
    // Payment CRUD
    public function editPayment(Payment $payment) {
        return view('admin.edit-payment', compact('payment'));
    }
    public function updatePayment(Request $request, Payment $payment) {
        $request->validate([
            'payment_type' => 'required',
            'method' => 'required',
            'amount' => 'required|numeric',
            'status' => 'required',
        ]);
        $payment->update($request->only('payment_type', 'method', 'amount', 'status'));
        return redirect()->route('admin.dashboard')->with('success', 'Payment updated');
    }
    public function destroyPayment(Payment $payment) {
        $payment->delete();
        return redirect()->route('admin.dashboard')->with('success', 'Payment deleted');
    }
}
