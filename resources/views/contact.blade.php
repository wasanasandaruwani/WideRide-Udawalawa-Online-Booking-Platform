@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="min-h-screen flex items-center justify-center py-12 px-4 relative">
    <div class="absolute inset-0 z-0" style="background: url('{{ asset('images/4peococke.jpg') }}') center center/cover no-repeat; opacity: 0.8;"></div>
    <div class="w-full max-w-2xl bg-white bg-opacity-80 rounded-2xl shadow-2xl p-10 relative z-10">
        <h1 class="text-3xl font-bold text-yellow-600 mb-6 text-center">Contact Us</h1>
        <p class="text-gray-700 text-center mb-8">Have questions or want to book a safari? Fill out the form below or reach us directly!</p>
        <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <label for="name" class="block text-gray-700 font-semibold mb-2">Name</label>
                <input type="text" id="name" name="name" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" />
            </div>
            <div>
                <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                <input type="email" id="email" name="email" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none" />
            </div>
            <div>
                <label for="message" class="block text-gray-700 font-semibold mb-2">Message</label>
                <textarea id="message" name="message" rows="5" required class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none"></textarea>
            </div>
            <button type="submit" class="w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg shadow transition">Send Message</button>
        </form>
        <div class="mt-10 text-center">
            <p class="text-gray-600">Or contact us directly:</p>
            <p class="text-green-700 font-semibold mt-2">Phone: <a href="tel:+94771234567" class="hover:underline">+94 77 123 4567</a></p>
            <p class="text-green-700 font-semibold">Email: <a href="mailto:info@wildrideudawalawe.com" class="hover:underline">info@wildrideudawalawe.com</a></p>
            <p class="text-gray-500 text-sm mt-4">Udawalawe, Sri Lanka</p>
        </div>
        <div class="mt-8 rounded-lg overflow-hidden shadow-lg">
            <iframe
                src="https://www.google.com/maps?q=Udawalawe+Sri+Lanka&output=embed"
                width="100%" height="350" style="border:0; min-width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>
@endsection
