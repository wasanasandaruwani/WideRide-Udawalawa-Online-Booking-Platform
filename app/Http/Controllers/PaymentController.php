<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Booking;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function create(Booking $booking)
    {
        return view('payments.create', compact('booking'));
    }

    public function store(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'payment_type' => 'required|in:full,advance',
            'method' => 'required|in:card,cash',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->payment_type = $validated['payment_type'];
        $payment->method = $validated['method'];
        $payment->amount = $validated['amount'];
        $payment->status = 'pending';
        $payment->save();

        // Optionally update booking status or redirect to card payment
        return redirect()->route('bookings.show', $booking)->with('success', 'Payment recorded.');
    }
}
