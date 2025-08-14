@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-gradient-to-br from-yellow-100 via-white to-green-100 min-h-screen py-12">
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar -->
            <aside class="w-full md:w-1/4 bg-white rounded-xl shadow-lg p-6 mb-8 md:mb-0 flex flex-col items-center">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=FBBF24&color=fff&size=128" alt="Avatar" class="rounded-full mb-4 shadow-md">
                <h3 class="text-xl font-bold text-gray-800 mb-1">{{ $user->name }}</h3>
                <p class="text-gray-500 text-sm mb-4">{{ $user->email }}</p>
                <a href="{{ route('profile.edit') }}" class="flex items-center gap-2 px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded transition mb-2 w-full text-center justify-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15.232 5.232l3.536 3.536M9 13h3l8-8a2.828 2.828 0 10-4-4l-8 8v3z" /></svg>
                    Edit Profile
                </a>
                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <button type="submit" class="flex items-center gap-2 px-4 py-2 bg-red-400 hover:bg-red-500 text-white rounded w-full transition justify-center">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7" /></svg>
                        Log Out
                    </button>
                </form>
            </aside>
            <!-- Main Content -->
            <main class="flex-1 space-y-8">
                <!-- Amazing New Items Section -->
                <div class="bg-gradient-to-r from-pink-200 via-yellow-100 to-green-200 rounded-3xl shadow-2xl p-10 mb-12 animate__animated animate__fadeInUp">
                    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-transparent bg-clip-text bg-gradient-to-r from-pink-500 via-yellow-500 to-green-500 mb-6 tracking-wider drop-shadow-lg">🎉 New &amp; Amazing Features 🎉</h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="flex flex-col items-center p-6 bg-white/80 rounded-2xl shadow-lg hover:scale-105 transition-transform border-2 border-pink-200 hover:border-pink-400">
                            <svg class="w-12 h-12 text-pink-500 mb-4 animate-bounce" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8m8-8a8 8 0 11-16 0 8 8 0 0116 0z" /></svg>
                            <h3 class="text-xl font-bold mb-2 text-pink-600">Live Safari Countdown</h3>
                            <p class="text-gray-700 text-center">See a live countdown to your next safari adventure, right on your dashboard!</p>
                            <div id="nextSafariCountdown" class="mt-3 text-lg font-mono text-pink-700"></div>
                        </div>
                        <div class="flex flex-col items-center p-6 bg-white/80 rounded-2xl shadow-lg hover:scale-105 transition-transform border-2 border-yellow-200 hover:border-yellow-400">
                            <svg class="w-12 h-12 text-yellow-500 mb-4 animate-spin-slow" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" class="opacity-25"/><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/></svg>
                            <h3 class="text-xl font-bold mb-2 text-yellow-600">Surprise Badge</h3>
                            <p class="text-gray-700 text-center">Unlock surprise badges for your booking milestones. Check your profile for new achievements!</p>
                            <span id="badgeArea" class="mt-3 text-2xl"></span>
                        </div>
                        <div class="flex flex-col items-center p-6 bg-white/80 rounded-2xl shadow-lg hover:scale-105 transition-transform border-2 border-green-200 hover:border-green-400">
                            <svg class="w-12 h-12 text-green-500 mb-4 animate-pulse" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" /></svg>
                            <h3 class="text-xl font-bold mb-2 text-green-600">Animated Confetti</h3>
                            <p class="text-gray-700 text-center">Celebrate your bookings with a burst of confetti every time you book a new safari!</p>
                            <button id="confettiBtn" class="mt-3 px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded shadow font-bold transition">Try Confetti</button>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h1 class="text-3xl font-bold text-yellow-600 mb-4">Welcome, {{ $user->name }}!</h1>
                    <p class="text-gray-700 text-lg mb-6">Here's a quick overview of your safari bookings and account activity.</p>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-yellow-100 rounded-lg p-6 flex flex-col items-center shadow hover:scale-105 transition-transform">
                            <span class="text-4xl font-bold text-yellow-600 mb-2">{{ $bookings->count() }}</span>
                            <span class="text-gray-700">Total Bookings</span>
                        </div>
                        <div class="bg-green-100 rounded-lg p-6 flex flex-col items-center shadow hover:scale-105 transition-transform">
                            <span class="text-4xl font-bold text-green-600 mb-2">{{ $bookings->where('booking_date', '>=', now()->toDateString())->count() }}</span>
                            <span class="text-gray-700">Upcoming Safaris</span>
                        </div>
                        <div class="bg-blue-100 rounded-lg p-6 flex flex-col items-center shadow hover:scale-105 transition-transform">
                            <span id="daysWithUs" class="text-4xl font-bold text-blue-600 mb-2">0</span>
                            <span class="text-gray-700">Days with Us</span>
                        </div>
                    </div>
                </div>
                <!-- My Bookings -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>
                        My Bookings
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">Date</th>
                                    <th class="py-2 px-4">Package</th>
                                    <th class="py-2 px-4">People</th>
                                    <th class="py-2 px-4">Total</th>
                                    <th class="py-2 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($bookings as $booking)
                                <tr>
                                    <td class="py-2 px-4">{{ $booking->booking_date }}</td>
                                    <td class="py-2 px-4">{{ optional($booking->safariPackage)->name ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $booking->num_people }}</td>
                                    <td class="py-2 px-4">${{ $booking->total_price }}</td>
                                    <td class="py-2 px-4">
                                        @if(strtolower($booking->status) !== 'cancelled' && strtolower($booking->status) !== 'completed')
                                            <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-700 text-xs">{{ ucfirst($booking->status) }}</span>
                                            <form action="{{ route('bookings.cancel', $booking) }}" method="POST" class="inline-block ml-2">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded">Cancel</button>
                                            </form>
                                        @elseif(strtolower($booking->status) === 'completed')
                                            <span class="inline-block px-2 py-1 rounded bg-blue-100 text-blue-700 text-xs">Completed</span>
                                        @elseif(strtolower($booking->status) === 'cancelled')
                                            <span class="inline-block px-2 py-1 rounded bg-red-100 text-red-700 text-xs">Cancelled</span>
                                        @else
                                            <span class="inline-block px-2 py-1 rounded bg-gray-100 text-gray-700 text-xs">{{ $booking->status ?? 'Pending' }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Payment History -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8c-1.657 0-3 1.343-3 3s1.343 3 3 3 3-1.343 3-3-1.343-3-3-3zm0 0V4m0 8v8m8-8a8 8 0 11-16 0 8 8 0 0116 0z" /></svg>
                        Payment History
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">Date</th>
                                    <th class="py-2 px-4">Amount</th>
                                    <th class="py-2 px-4">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($payments as $payment)
                                <tr>
                                    <td class="py-2 px-4">{{ $payment->created_at ? $payment->created_at->format('Y-m-d') : '-' }}</td>
                                    <td class="py-2 px-4">${{ $payment->amount }}</td>
                                    <td class="py-2 px-4">
                                        @if($payment->status === 'paid' || $payment->status === 'Paid')
                                            <span class="inline-block px-2 py-1 rounded bg-green-100 text-green-700 text-xs">Paid</span>
                                        @elseif($payment->status === 'failed' || $payment->status === 'Failed')
                                            <span class="inline-block px-2 py-1 rounded bg-red-100 text-red-700 text-xs">Failed</span>
                                        @else
                                            <span class="inline-block px-2 py-1 rounded bg-gray-100 text-gray-700 text-xs">{{ ucfirst($payment->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Safari Packages -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 7l9-4 9 4-9 4-9-4zm0 7l9 4 9-4" /></svg>
                        Safari Packages
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($safariPackages as $package)
                        <div class="bg-yellow-50 rounded-lg p-6 flex flex-col items-center shadow">
                            <span class="text-lg font-bold text-yellow-700 mb-2">{{ $package->name }}</span>
                            <span class="text-gray-600 mb-2">{{ $package->description }}</span>
                            <span class="text-green-600 font-bold mb-4">${{ $package->price }}</span>
                            <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" class="px-4 py-2 bg-yellow-400 hover:bg-yellow-500 text-white rounded transition">Book Now</a>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Jeeps -->
                <div class="bg-white rounded-xl shadow-lg p-8 mb-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4 flex items-center gap-2">
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13l2-2m0 0l7-7 7 7M5 11v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0h6" /></svg>
                        Jeeps
                    </h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-left">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">ID</th>
                                    <th class="py-2 px-4">Name</th>
                                    <th class="py-2 px-4">Description</th>
                                    <th class="py-2 px-4">Price</th>
                                    <th class="py-2 px-4">Seats</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jeeps as $jeep)
                                <tr>
                                    <td class="py-2 px-4">{{ $jeep->id }}</td>
                                    <td class="py-2 px-4">{{ $jeep->name ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $jeep->description ?? '-' }}</td>
                                    <td class="py-2 px-4">${{ $jeep->price ?? '-' }}</td>
                                    <td class="py-2 px-4">{{ $jeep->seats ?? '-' }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .hover\:scale-105:hover { transform: scale(1.05); }
</style>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const createdAt = @json($user->created_at ? $user->created_at->format('Y-m-d') : null);
        if (createdAt) {
            function updateDaysWithUs() {
                const start = new Date(createdAt + 'T00:00:00');
                const now = new Date();
                const diff = Math.floor((now - start) / (1000 * 60 * 60 * 24));
                document.getElementById('daysWithUs').textContent = diff;
            }
            updateDaysWithUs();
            setInterval(updateDaysWithUs, 1000 * 60 * 60); // Update every hour
        }

        // Confetti button functionality
        const confettiBtn = document.getElementById('confettiBtn');
        let confettiActive = false;
        confettiBtn.addEventListener('click', function() {
            if (confettiActive) return; // Prevent multiple confetti at once
            confettiActive = true;
            const colors = ['#FF0', '#0F0', '#00F', '#F0F', '#0FF', '#FF69B4', '#FFD700', '#00FA9A'];
            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            canvas.style.position = 'fixed';
            canvas.style.left = 0;
            canvas.style.top = 0;
            canvas.style.pointerEvents = 'none';
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            document.body.appendChild(canvas);

            const confettiCount = 120;
            const confetti = [];
            for (let i = 0; i < confettiCount; i++) {
                confetti.push({
                    x: Math.random() * canvas.width,
                    y: Math.random() * -canvas.height,
                    r: Math.random() * 8 + 4,
                    d: Math.random() * confettiCount,
                    color: colors[Math.floor(Math.random() * colors.length)],
                    tilt: Math.random() * 10 - 10,
                    tiltAngle: 0,
                    tiltAngleIncremental: (Math.random() * 0.07) + 0.05
                });
            }
            let angle = 0;
            function drawConfetti() {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                angle += 0.01;
                for (let i = 0; i < confetti.length; i++) {
                    let c = confetti[i];
                    c.y += (Math.cos(angle + c.d) + 3 + c.r / 2) / 2;
                    c.x += Math.sin(angle);
                    c.tiltAngle += c.tiltAngleIncremental;
                    c.tilt = Math.sin(c.tiltAngle) * 15;
                    ctx.beginPath();
                    ctx.lineWidth = c.r;
                    ctx.strokeStyle = c.color;
                    ctx.moveTo(c.x + c.tilt + c.r / 3, c.y);
                    ctx.lineTo(c.x + c.tilt, c.y + c.tilt + c.r);
                    ctx.stroke();
                }
            }
            let frame = 0;
            function animate() {
                drawConfetti();
                frame++;
                if (frame < 120) {
                    requestAnimationFrame(animate);
                } else {
                    document.body.removeChild(canvas);
                    confettiActive = false;
                }
            }
            animate();
        });

        // Badge area - unlock badge based on booking milestone
        const badgeArea = document.getElementById('badgeArea');
        const bookingCount = @json($bookings->count());
        if (bookingCount > 0) {
            setTimeout(() => {
                badgeArea.innerHTML = `
                  <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-yellow-300 text-yellow-800 text-xs font-semibold animate-bounce animate__fadeIn">
                    <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2l2.39 4.84 5.34.78-3.87 3.77.91 5.32L10 13.77l-4.77 2.51.91-5.32-3.87-3.77 5.34-.78z"/></svg>
                    Newbie Explorer
                  </span>
                `;
            }, 1500); // Show after 1.5s for effect
        } else {
            badgeArea.innerHTML = '';
        }

        // Live Safari Countdown
        const nextSafariCountdown = document.getElementById('nextSafariCountdown');
        // Get all upcoming booking dates sorted ascending (from PHP to JS)
        const upcomingBookingDates = @json($bookings->where('booking_date', '>=', now()->toDateString())->sortBy('booking_date')->pluck('booking_date')->values());
        let currentIndex = 0;
        function updateCountdown() {
            if (!upcomingBookingDates.length) {
                nextSafariCountdown.textContent = 'No upcoming safaris!';
                return;
            }
            // Find the next future date
            let found = false;
            const now = new Date();
            for (let i = 0; i < upcomingBookingDates.length; i++) {
                const safariDate = new Date(upcomingBookingDates[i] + 'T06:00:00');
                if (safariDate - now > 0) {
                    currentIndex = i;
                    found = true;
                    const diff = safariDate - now;
                    const days = Math.floor(diff / (1000 * 60 * 60 * 24));
                    const hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
                    const minutes = Math.floor((diff / (1000 * 60)) % 60);
                    const seconds = Math.floor((diff / 1000) % 60);
                    nextSafariCountdown.textContent = `${days}d ${hours}h ${minutes}m ${seconds}s`;
                    break;
                }
            }
            if (!found) {
                // If all safaris are in the past or today
                nextSafariCountdown.textContent = 'No upcoming safaris!';
            }
        }
        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
</script>
@endsection
