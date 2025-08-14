<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentApiController extends Controller
{
    public function success(Request $request)
    {
        $validated = $request->validate([
            'booking_id' => 'required|integer',
            'amount' => 'required|numeric',
            'status' => 'required|string',
            'transaction_id' => 'nullable|string',
        ]);
        $payment = Payment::create([
            'booking_id' => $validated['booking_id'],
            'amount' => $validated['amount'],
            'status' => $validated['status'],
            'transaction_id' => $validated['transaction_id'] ?? null,
            'payment_type' => $request->input('payment_type', 'online'),
            'method' => $request->input('method', 'card'),
        ]);
        // Optionally update booking status
        // $booking = \App\Models\Booking::find($validated['booking_id']);
        // if ($booking) {
        //     $booking->status = 'Paid';
        //     $booking->save();
        // }
        return response()->json(['success' => true, 'payment' => $payment], 201);
    }
}
