@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-100 via-white to-green-100 py-16 px-4 flex flex-col items-center justify-center">
    <div class="w-full max-w-5xl bg-white rounded-3xl shadow-2xl p-0 md:p-10 flex flex-col md:flex-row gap-10 items-center">
        <div class="flex-1 flex flex-col justify-center">
             <h1 class="text-4xl font-extrabold text-yellow-600 mb-8 text-center md:text-left">Wild Ride Udawalawe</h1>
            <img src="{{ asset('images/udawalawe-national-park-sri-lanka.jpg') }}" alt="Udawalawe National Park" class="rounded-2xl shadow-xl w-full h-64 object-cover mb-8">
           
            <p class="text-gray-700 text-lg mb-4 leading-relaxed">Experience the thrill of Sri Lanka’s wild side with us! At Wild Ride Udawalawe, we are passionate about creating unforgettable safari adventures in the heart of Udawalawe National Park. Our eco-friendly jeeps, expert local guides, and deep respect for nature ensure every journey is safe, comfortable, and truly memorable.</p>
            <ul class="list-disc pl-6 text-gray-700 text-base mb-4">
                <li class="mb-2"><span class="font-semibold text-yellow-600">Authentic Wildlife Encounters:</span> Spot elephants, leopards, birds, and more in their natural habitat.</li>
                <li class="mb-2"><span class="font-semibold text-yellow-600">Eco-Friendly Jeeps:</span> Modern, comfortable, and environmentally conscious vehicles for your safari.</li>
                <li class="mb-2"><span class="font-semibold text-yellow-600">Local Expertise:</span> Our guides are from Udawalawe and know the park inside out.</li>
                <li class="mb-2"><span class="font-semibold text-yellow-600">Flexible Packages:</span> Morning, evening, and full-day safaris for solo travelers, families, and groups.</li>
                <li class="mb-2"><span class="font-semibold text-yellow-600">Photography Friendly:</span> We help you capture the best wildlife moments.</li>
                <li class="mb-2"><span class="font-semibold text-yellow-600">24/7 Support:</span> We’re here to help before, during, and after your adventure.</li>
            </ul>
            <div class="mt-8 text-center md:text-left">
                <a href="{{ route('bookings.create') }}" class="inline-block px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg shadow-lg transition-transform transform hover:scale-105">Book Your Safari</a>
            </div>
            <div class="mt-12">
                <h2 class="text-2xl font-bold text-green-600 mb-6 text-center md:text-left">What Our Guests Say</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="bg-yellow-50 rounded-xl p-6 shadow flex flex-col">
                        <p class="text-gray-700 italic mb-4">“The best safari experience ever! Our guide was knowledgeable and made sure we saw elephants up close. Highly recommended!”</p>
                        <span class="font-semibold text-yellow-700">– Nimal, Colombo</span>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 shadow flex flex-col">
                        <p class="text-gray-700 italic mb-4">“Loved the eco-friendly jeeps and the attention to detail. The booking process was smooth and the team was super helpful.”</p>
                        <span class="font-semibold text-green-700">– Sarah, UK</span>
                    </div>
                    <div class="bg-yellow-50 rounded-xl p-6 shadow flex flex-col">
                        <p class="text-gray-700 italic mb-4">“A wonderful adventure for our whole family. The kids enjoyed spotting birds and the guides were fantastic!”</p>
                        <span class="font-semibold text-yellow-700">– Priya, India</span>
                    </div>
                    <div class="bg-green-50 rounded-xl p-6 shadow flex flex-col">
                        <p class="text-gray-700 italic mb-4">“I’m a photographer and this was a dream come true. The guides knew the best spots for wildlife shots.”</p>
                        <span class="font-semibold text-green-700">– Alex, Germany</span>
                    </div>
                </div>
            </div>
            <div class="mt-16">
                <h2 class="text-2xl font-bold text-yellow-600 mb-6 text-center md:text-left">Meet Our Team</h2>
                <div class="flex flex-wrap gap-8 justify-center md:justify-start">
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/man3.jpeg') }}" alt="Guide" class="rounded-full w-24 h-24 object-cover shadow-lg mb-2">
                        <span class="font-bold text-gray-800">Saman</span>
                        <span class="text-sm text-gray-500">Lead Guide</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/man1.jpg') }}" alt="Driver" class="rounded-full w-24 h-24 object-cover shadow-lg mb-2">
                        <span class="font-bold text-gray-800">Kumari</span>
                        <span class="text-sm text-gray-500">Safari Driver</span>
                    </div>
                    <div class="flex flex-col items-center">
                        <img src="{{ asset('images/man2.jpg') }}" alt="Support" class="rounded-full w-24 h-24 object-cover shadow-lg mb-2">
                        <span class="font-bold text-gray-800">Ruwan</span>
                        <span class="text-sm text-gray-500">Customer Support</span>
                    </div>
                </div>
            </div>
            <div class="mt-16 text-center">
                <h2 class="text-2xl font-bold text-green-600 mb-4">Ready for Your Next Adventure?</h2>
                <a href="{{ route('bookings.create') }}" class="inline-block px-10 py-4 bg-green-500 hover:bg-green-600 text-white font-bold rounded-2xl shadow-xl text-lg transition-transform transform hover:scale-105">Book Now</a>
            </div>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <img src="{{ asset('images/elephant.jpg') }}" alt="About Us" class="rounded-2xl shadow-xl w-80 h-56 object-cover mb-6 hover:scale-105 hover:ring-4 hover:ring-yellow-400 transition-transform duration-300">
            <div class="flex gap-4 mt-2">
                <img src="{{ asset('images/udawalawe-safari-jeep.jpg') }}" alt="Safari Jeep" class="rounded-lg shadow-md w-32 h-20 object-cover hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/axisdeer.webp') }}" alt="Wildlife" class="rounded-lg shadow-md w-32 h-20 object-cover hover:scale-105 transition-transform duration-300">
            </div>
        </div>
    </div>
    {{-- Map removed as requested --}}
</div>
@endsection

@section('styles')
<style>
    .hover\:scale-105:hover { transform: scale(1.05); }
</style>
@endsection

@section('scripts')
<script>
// Animate images 
</script>
@endsection
