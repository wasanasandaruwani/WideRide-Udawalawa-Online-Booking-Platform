<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\SafariPackage;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        // Fetch only unique packages by name (first occurrence)
        $packages = \App\Models\SafariPackage::query()
            ->select('safari_packages.*')
            ->whereIn('id', function($query) {
                $query->selectRaw('MIN(id)')
                    ->from('safari_packages')
                    ->groupBy('name');
            })
            ->orderBy('name')
            ->get();
        $selected = [
            'package_id' => $request->input('package_id'),
            'date' => $request->input('date'),
            'people' => $request->input('people'),
        ];
        return view('bookings.create', [
            'packages' => $packages,
            'selected' => $selected
        ]);
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'safari_package_id' => 'required|exists:safari_packages,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|in:morning,afternoon,full-day',
            'num_people' => 'required|integer|min:1',
            'add_ons' => 'array',
            'promo_code' => 'nullable|string',
            'special_requests' => 'nullable|string',
        ]);
        $package = SafariPackage::find($validated['safari_package_id']);
        $addOnPrices = [
            'binoculars' => 500,
            'snacks' => 800,
            'hotel_pickup' => 1500,
        ];
        $addOns = $request->input('add_ons', []);
        $addOnTotal = collect($addOns)->sum(fn($a) => $addOnPrices[$a] ?? 0);
        $discount = 0;
        if ($request->filled('promo_code') && strtolower($request->promo_code) === 'wild10') {
            $discount = 0.1 * ($package->price * $validated['num_people'] + $addOnTotal);
        }
        $total = $package->price + $addOnTotal - $discount; // Only package price, not multiplied by people
        $booking = new Booking();
        $booking->user_id = auth()->check() ? auth()->id() : null;
        $booking->safari_package_id = $validated['safari_package_id'];
        $booking->booking_date = $validated['booking_date'];
        $booking->time_slot = $validated['time_slot'];
        $booking->num_people = $validated['num_people'];
        $booking->add_ons = $addOns;
        $booking->promo_code = $request->input('promo_code');
        $booking->discount = $discount;
        $booking->special_requests = $request->input('special_requests');
        $booking->total_price = $total;
        $booking->admin = false; // Default to non-admin booking
        $booking->save();
        
        // Redirect to payment step instead of confirmation
        return redirect()->route('bookings.payment', $booking);
    }

    // New method for payment step
    public function payment(Booking $booking)
    {
        return view('bookings.payment', compact('booking'));
    }

    // Stripe Checkout session creation
    public function stripeCheckout(Request $request, Booking $booking)
    {
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'lkr',
                    'product_data' => [
                        'name' => 'Safari Booking #'.$booking->id,
                    ],
                    'unit_amount' => (int)($booking->total_price * 100), // Stripe expects amount in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('bookings.show', $booking),
            'cancel_url' => route('bookings.payment', $booking),
            'metadata' => [
                'booking_id' => $booking->id,
                'user_id' => $booking->user_id,
            ],
        ]);

        return redirect($session->url);
    }
    
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }
    
    public function cancel(Booking $booking)
    {
        if (auth()->id() !== $booking->user_id) {
            abort(403);
        }
        $booking->status = 'Cancelled';
        $booking->save();
        return redirect()->back()->with('status', 'Booking cancelled successfully.');
    }
}