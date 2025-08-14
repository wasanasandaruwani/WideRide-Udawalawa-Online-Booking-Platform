@extends('layouts.app')

@section('title', 'Book a Jeep')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 relative">
    <div class="absolute inset-0 z-0" style="background: url('{{ asset('images/photo.png') }}') center center/cover no-repeat; opacity: 0.35;"></div>
    <div class="w-full max-w-lg bg-white bg-opacity-70 rounded-2xl shadow-2xl p-10 relative z-10">
        <div id="spinner" class="hidden absolute inset-0 flex items-center justify-center bg-white bg-opacity-80 z-20">
            <svg class="animate-spin h-10 w-10 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
        </div>
        <h1 class="text-3xl font-bold text-yellow-600 mb-8 text-center">Book Your Safari Jeep</h1>
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('bookings.store') }}" method="POST" id="bookingForm" class="space-y-6 relative">
            @csrf
            <div class="relative">
                <label for="safari_package_id" class="block text-gray-700 font-semibold mb-2">Safari Package
                    <span class="ml-1 text-xs text-gray-400 cursor-pointer" title="See package features and prices">&#9432;</span>
                </label>
                <select name="safari_package_id" id="safari_package_id" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white" required>
                    <option value="">Select a package</option>
                    @foreach($packages as $pkg)
                        <option value="{{ $pkg->id }}" data-price="{{ $pkg->price }}" data-features="{{ $pkg->features }}" @if(isset($selected['package_id']) && $selected['package_id'] == $pkg->id) selected @endif>{{ $pkg->name }} - LKR {{ number_format($pkg->price, 2) }}</option>
                    @endforeach
                </select>
                <div id="jeepFeatures" class="text-xs text-gray-500 mt-1"></div>
            </div>
            <div class="relative">
                <label for="booking_date" class="block text-gray-700 font-semibold mb-2">Date</label>
                <input type="date" name="booking_date" id="booking_date" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white" required min="{{ date('Y-m-d') }}" value="{{ $selected['date'] ?? '' }}">
            </div>
            <div class="relative">
                <label for="time_slot" class="block text-gray-700 font-semibold mb-2">Time Slot
                    <span class="ml-1 text-xs text-gray-400 cursor-pointer" title="Morning: 5:30 AM - 11:00 AM, Afternoon: 2:00 PM - 6:00 PM, Full Day: All day">&#9432;</span>
                </label>
                <select name="time_slot" id="time_slot" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white" required>
                    <option value="morning">Morning (5:30 AM - 11:00 AM)</option>
                    <option value="afternoon">Afternoon (2:00 PM - 6:00 PM)</option>
                    <option value="full-day">Full Day</option>
                </select>
            </div>
            <div class="relative">
                <label for="num_people" class="block text-gray-700 font-semibold mb-2">Number of People</label>
                <input type="number" name="num_people" id="num_people" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white" min="1" value="{{ $selected['people'] ?? '1' }}" required>
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-semibold mb-2">Add-ons</label>
                <div class="flex flex-wrap gap-4">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="add_ons[]" value="binoculars" class="accent-yellow-500"> Binoculars (LKR 500)
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="add_ons[]" value="snacks" class="accent-yellow-500"> Snacks (LKR 800)
                    </label>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="add_ons[]" value="hotel_pickup" class="accent-yellow-500"> Hotel Pickup (LKR 1500)
                    </label>
                </div>
            </div>
            <div class="relative">
                <label for="promo_code" class="block text-gray-700 font-semibold mb-2">Promo Code</label>
                <input type="text" name="promo_code" id="promo_code" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white">
            </div>
            <div class="relative">
                <label for="special_requests" class="block text-gray-700 font-semibold mb-2">Special Requests</label>
                <textarea name="special_requests" id="special_requests" rows="2" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none bg-white"></textarea>
            </div>
            <div class="relative">
                <label class="block text-gray-700 font-semibold mb-2">Estimated Pickup Time</label>
                <div id="pickupTime" class="text-sm text-gray-600">Select a time slot to see pickup time.</div>
            </div>
            @auth
            <div class="relative mb-4">
                <label class="block text-gray-700 font-semibold mb-2">Your Previous Bookings</label>
                <ul class="text-xs text-gray-500 space-y-1" id="previousBookings">
                    <!-- Will be filled by JS -->
                </ul>
            </div>
            @endauth
            <div class="flex items-center justify-between">
                <span class="font-semibold text-gray-700">Total Price:</span>
                <span id="totalPrice" class="text-xl font-bold text-yellow-600">LKR 0.00</span>
            </div>
            <button type="submit" class="w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg shadow transition duration-300 text-lg flex items-center justify-center">Book Now</button>
        </form>
    </div>
</div>
@endsection

@section('styles')
<style>
    #bookingForm select, #bookingForm input[type="date"], #bookingForm input[type="number"] {
        transition: box-shadow 0.2s;
    }
    #bookingForm select:focus, #bookingForm input:focus {
        box-shadow: 0 0 0 2px #fbbf24;
    }
    #spinner {
        display: flex;
    }
    #spinner.hidden {
        display: none;
    }
</style>
@endsection

@section('scripts')
<script>
const packageSelect = document.getElementById('safari_package_id');
const numPeople = document.getElementById('num_people');
function updateTotalPrice() {
    const selectedOption = packageSelect.options[packageSelect.selectedIndex];
    const price = parseFloat(selectedOption.getAttribute('data-price')) || 0;
    // Add-ons
    let addOnTotal = 0;
    document.querySelectorAll('input[name="add_ons[]"]:checked').forEach(function(cb) {
        if(cb.value === 'binoculars') addOnTotal += 500;
        if(cb.value === 'snacks') addOnTotal += 800;
        if(cb.value === 'hotel_pickup') addOnTotal += 1500;
    });
    // Only show package price (not multiplied by people)
    const total = price + addOnTotal;
    document.getElementById('totalPrice').textContent = 'LKR ' + total.toLocaleString(undefined, {minimumFractionDigits: 2});
    document.getElementById('jeepFeatures').textContent = selectedOption.getAttribute('data-features') || '';
}
if(packageSelect && numPeople) {
    packageSelect.addEventListener('change', updateTotalPrice);
    numPeople.addEventListener('input', updateTotalPrice);
    window.addEventListener('DOMContentLoaded', updateTotalPrice);
    document.querySelectorAll('input[name="add_ons[]"]').forEach(function(cb) {
        cb.addEventListener('change', updateTotalPrice);
    });
}

// Disable past dates for booking_date
const bookingDate = document.getElementById('booking_date');
if (bookingDate) {
    const today = new Date().toISOString().split('T')[0];
    bookingDate.setAttribute('min', today);
}

// Pickup time logic
const timeSlot = document.getElementById('time_slot');
const pickupTime = document.getElementById('pickupTime');
if(timeSlot && pickupTime) {
    timeSlot.addEventListener('change', function() {
        let txt = '';
        switch(this.value) {
            case 'morning': txt = 'Pickup: 5:00 AM - 5:30 AM'; break;
            case 'afternoon': txt = 'Pickup: 1:30 PM - 2:00 PM'; break;
            case 'full-day': txt = 'Pickup: 5:00 AM - 5:30 AM'; break;
            default: txt = 'Select a time slot to see pickup time.';
        }
        pickupTime.textContent = txt;
    });
    timeSlot.dispatchEvent(new Event('change'));
}

//  bookings 
@if(Auth::check())
window.addEventListener('DOMContentLoaded', function() {
    const prev = [
        {date: '2025-05-20', jeep: 'Deluxe Jeep', status: 'Completed'},
        {date: '2025-04-10', jeep: 'Standard Jeep', status: 'Cancelled'}
    ];
    let html = '';
    prev.forEach(b => html += `<li>${b.date} - ${b.jeep} (${b.status})</li>`);
    document.getElementById('previousBookings').innerHTML = html;
});
@endif

// Animate and show spinner on submit
const form = document.getElementById('bookingForm');
if(form) {
    form.addEventListener('submit', function(e) {
        document.getElementById('spinner').classList.remove('hidden');
        form.classList.add('animate-pulse');
    });
}
</script>
@endsection