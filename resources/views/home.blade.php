@extends('layouts.app')

@section('title', 'Wild Ride Udawalawe - Safari Jeep Booking')

@section('content')
<div class="relative">
    <!-- Hero Section -->
    <div class="relative h-screen bg-gray-900 overflow-hidden">
        <!-- Slideshow Background Images -->
        <div class="absolute inset-0">
            <div id="hero-slideshow" class="w-full h-full">
                <img src="{{ asset('images/33sky.jpg') }}" alt="Udawalawe Safari" class="w-full h-full object-cover hero-slide absolute inset-0 opacity-100 transition-opacity duration-1000" style="z-index:1;">
                <img src="{{ asset('images/home.webp') }}" alt="VIP Safari" class="w-full h-full object-cover hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000" style="z-index:0;">
                <img src="{{ asset('images/night.jpg') }}" alt="Elephants" class="w-full h-full object-cover hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000" style="z-index:0;">
                
            </div>
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        
        <!-- Hero Content -->
        <div class="relative z-10 flex flex-col items-center justify-center h-full text-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 animate-marquee">
                <span class="inline-block whitespace-nowrap">Experience the Wild Beauty <br>of Udawalawe</span>
            </h1>
            <style>
            @keyframes marquee {
                0% { transform: translateX(0); }
                50% { transform: translateX(40px); }
                100% { transform: translateX(0); }
            }
            .animate-marquee span {
                display: inline-block;
                animation: marquee 3s ease-in-out infinite;
            }
            </style>
            <p class="text-xl text-gray-300 mb-8 max-w-3xl">
                Book your safari adventure with ease and discover the majestic elephants and wildlife of Sri Lanka's most famous national park.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('bookings.create') }}" class="px-8 py-3 bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-bold rounded-lg transition duration-300">
                    Book Your Safari
                </a>
                <a href="{{ url('/safari') }}" class="px-8 py-3 border-2 border-white text-white hover:bg-white hover:text-gray-900 font-bold rounded-lg transition duration-300">
                    Explore Packages
                </a>
            </div>
        </div>
    </div>

        
    <!-- Booking Widget (Overlay Bottom of Hero) -->
    <div class="absolute left-1/2 bottom-0 transform -translate-x-1/2 translate-y-1/2 z-20 w-full max-w-4xl">
        <div class="bg-white/90 rounded-xl shadow-2xl p-8 backdrop-blur-md">
            <h3 class="text-2xl font-bold text-gray-800 mb-6 text-center">Find Your Perfect Safari Experience</h3>
            <form action="{{ route('bookings.create') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4" id="home-booking-form">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Package</label>
                    <select name="package_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                        <option value="">Select Package</option>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->name }} - LKR {{ number_format($package->price, 2) }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                    <input type="date" name="date" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">People</label>
                    <input type="number" name="people" min="1" max="20" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500" required>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition duration-300">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
    
    

    <!-- Main Content -->
    <div class="pt-32 pb-16">
        
        <!-- Horizontal Gallery Section -->
        <section class="py-12 bg-green-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-800 text-center mb-8">Safari Gallery</h2>
                <div class="flex flex-wrap justify-center gap-6 py-4">
                    <button class="gallery-thumb overflow-hidden rounded-2xl shadow-lg cursor-pointer border-4 border-white hover:border-green-400 transform transition duration-300 hover:scale-105 hover:shadow-xl bg-white focus:outline-none" data-gallery="elephant" tabindex="0">
                        <img src="{{ asset('images/40caption (1).jpg') }}" alt="Elephant" class="w-48 h-48 object-cover">
                        <p class="py-2 text-gray-700 font-medium">Elephants</p>
                    </button>
                    <button class="gallery-thumb overflow-hidden rounded-2xl shadow-lg cursor-pointer border-4 border-white hover:border-green-400 transform transition duration-300 hover:scale-105 hover:shadow-xl bg-white focus:outline-none" data-gallery="wildlife" tabindex="0">
                        <img src="{{ asset('images/23leopard.jpg') }}" alt="Wildlife" class="w-48 h-48 object-cover">
                        <p class="py-2 text-gray-700 font-medium">Wildlife</p>
                    </button>
                    <button class="gallery-thumb overflow-hidden rounded-2xl shadow-lg cursor-pointer border-4 border-white hover:border-green-400 transform transition duration-300 hover:scale-105 hover:shadow-xl bg-white focus:outline-none" data-gallery="bird" tabindex="0">
                        <img src="{{ asset('images/6image 19.jfif') }}" alt="bird" class="w-48 h-48 object-cover">
                        <p class="py-2 text-gray-700 font-medium">Birds</p>
                    </button>
                    <button class="gallery-thumb overflow-hidden rounded-2xl shadow-lg cursor-pointer border-4 border-white hover:border-green-400 transform transition duration-300 hover:scale-105 hover:shadow-xl bg-white focus:outline-none" data-gallery="landscape" tabindex="0">
                        <img src="{{ asset('images/10chandrikawewa.jpg') }}" alt="Landscape" class="w-48 h-48 object-cover">
                        <p class="py-2 text-gray-700 font-medium">Landscapes</p>
                    </button>
                    <button class="gallery-thumb overflow-hidden rounded-2xl shadow-lg cursor-pointer border-4 border-white hover:border-green-400 transform transition duration-300 hover:scale-105 hover:shadow-xl bg-white focus:outline-none" data-gallery="jeep" tabindex="0">
                        <img src="{{ asset('images/30VIP.jpg') }}" alt="Jeep" class="w-48 h-48 object-cover">
                        <p class="py-2 text-gray-700 font-medium">Safari Jeeps</p>
                    </button>
                </div>
                <!-- Gallery Modal -->
                <div id="gallery-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black bg-opacity-90 transition-opacity duration-300" aria-modal="true" role="dialog">
                    <div class="relative bg-white rounded-xl max-w-4xl w-full mx-4 max-h-[90vh] overflow-auto">
                        <button id="gallery-close" class="absolute top-4 right-4 text-3xl text-gray-700 hover:text-gray-900 focus:outline-none" aria-label="Close gallery">&times;</button>
                        <div class="p-6">
                            <div id="gallery-slider" class="mb-6 flex justify-center">
                                <!-- Images -->
                            </div>
                            <div class="flex justify-between">
                                <button id="gallery-prev" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium" aria-label="Previous image">Previous</button>
                                <span id="gallery-counter" class="text-gray-600 font-medium"></span>
                                <button id="gallery-next" class="px-6 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg font-medium" aria-label="Next image">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Why Choose Wild Ride Udawalawe?</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        We provide the best safari experience with our professional guides and well-maintained vehicles.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-lg transition duration-300">
                        <div class="text-green-600 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Trusted Service</h3>
                        <p class="text-gray-600">
                            All our safari jeep operators are verified and highly rated by thousands of satisfied customers.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-lg transition duration-300">
                        <div class="text-green-600 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Best Prices</h3>
                        <p class="text-gray-600">
                            We guarantee competitive pricing with no hidden charges. Best value for your money.
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-xl hover:shadow-lg transition duration-300">
                        <div class="text-green-600 mb-4">
                            <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Custom Packages</h3>
                        <p class="text-gray-600">
                            Combine your safari with accommodation and other activities for a complete experience.
                        </p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Safari Packages Section -->
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">Our Safari Packages</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Choose from our exclusive safari packages for your Udawalawe adventure.
                    </p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="modern-packages">
                    <!-- Gold Package -->
                    <div class="modern-package-card package-gold relative group transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <span class="package-nickname absolute top-4 left-4 bg-yellow-400 text-white px-4 py-1 rounded-full font-bold shadow-lg z-10">Gold</span>
                        <img src="{{ asset('images/33sky.jpg') }}" alt="Full Day Safari" class="w-full h-48 object-cover rounded-t-lg group-hover:brightness-90 transition duration-300">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800">Full Day Safari</h2>
                            <p class="text-gray-700 mb-4">A complete day in the wild! Includes lunch, refreshments, and a dedicated guide. Perfect for wildlife enthusiasts.</p>
                            <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 10,000 </span>
                            <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                        </div>
                    </div>
                    <!-- Platinum Package -->
                    <div class="modern-package-card package-platinum relative group transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <span class="package-nickname absolute top-4 left-4 bg-yellow-700 text-white px-4 py-1 rounded-full font-bold shadow-lg z-10">Platinum</span>
                        <img src="{{ asset('images/30vip.jpg') }}" alt="VIP Safari" class="w-full h-48 object-cover rounded-t-lg group-hover:brightness-90 transition duration-300">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800">VIP Luxury Safari</h2>
                            <p class="text-gray-700 mb-4">Private luxury jeep, gourmet meals, park entry, and a professional photographer. The ultimate safari experience.</p>
                            <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 25,000 </span>
                            <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" class="inline-block px-6 py-2 bg-yellow-700 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                        </div>
                    </div>
                    <!-- Silver Package -->
                    <div class="modern-package-card package-silver relative group transform transition duration-300 hover:scale-105 hover:shadow-2xl">
                        <span class="package-nickname absolute top-4 left-4 bg-gray-400 text-white px-4 py-1 rounded-full font-bold shadow-lg z-10">Silver</span>
                        <img src="{{ asset('images/morning.jpg') }}" alt="Morning Safari" class="w-full h-48 object-cover rounded-t-lg group-hover:brightness-90 transition duration-300">
                        <div class="p-6">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800">Morning Safari</h2>
                            <p class="text-gray-700 mb-4">Experience the wildlife at sunrise with our guided morning safari tour. Includes breakfast and park entry.</p>
                            <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 5,000 </span>
                            <a href="{{ route('bookings.create', ['package_id' => $package->id]) }}" class="inline-block px-6 py-2 bg-gray-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Testimonials Section -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900">What Our Visitors Say</h2>
                    <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                        Hear from travelers who have experienced Udawalawe with us.
                    </p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="images/man3.jpeg" alt="Sarah J.">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">S.G. Ranga.</h4>
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "The morning safari was incredible! Our guide knew exactly where to find the elephants. The jeep was comfortable and well-maintained."
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="images/man1.jpg" alt="Mark T.">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">K.N. Nimal.</h4>
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "We saw so many animals! The afternoon safari was perfect for photography with beautiful golden light. Highly recommend this company."
                        </p>
                    </div>
                    
                    <div class="bg-gray-50 p-6 rounded-xl">
                        <div class="flex items-center mb-4">
                            <div class="flex-shrink-0">
                                <img class="h-12 w-12 rounded-full" src="images/man2.jpg" alt="Priya K.">
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-bold text-gray-900">W.A.Amila.</h4>
                                <div class="flex text-yellow-400">
                                    @for($i = 0; $i < 5; $i++)
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">
                            "The VIP jeep was worth every rupee! Comfortable seats, knowledgeable guide, and we saw a leopard! Best experience of our Sri Lanka trip."
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection

@section('styles')
@parent
<style>
    .modern-package-card {
        background: linear-gradient(120deg, #fffbe6 60%, #fbbf24 100%);
        border-radius: 1.5rem;
        box-shadow: 0 2px 16px 0 rgba(251, 191, 36, 0.10);
        overflow: hidden;
        position: relative;
        border: 2px solid #fde68a;
        transition: box-shadow 0.3s, transform 0.3s;
    }
    .modern-package-card:hover {
        box-shadow: 0 8px 32px 0 rgba(31, 41, 55, 0.18);
        border-color: #fbbf24;
        z-index: 2;
    }
    .modern-package-card .package-nickname {
        font-size: 1.1rem;
        letter-spacing: 1px;
        box-shadow: 0 2px 8px 0 rgba(251, 191, 36, 0.15);
    }
    .modern-package-card img {
        transition: filter 0.3s, transform 0.3s;
    }
    .modern-package-card:hover img {
        filter: brightness(0.92) saturate(1.1);
        transform: scale(1.04);
    }
    .modern-package-card .p-6 {
        background: rgba(255,255,255,0.95);
        border-bottom-left-radius: 1.5rem;
        border-bottom-right-radius: 1.5rem;
    }
</style>
@endsection

@section('scripts')
@parent
<script>
    //  JS animation  for package cards
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.modern-package-card').forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                card.style.boxShadow = '0 12px 36px 0 rgba(251,191,36,0.25)';
                card.style.transform = 'scale(1.07)';
            });
            card.addEventListener('mouseleave', function() {
                card.style.boxShadow = '';
                card.style.transform = '';
            });
        });
    });
</script>
<script>
// Hero background slideshow
const slides = document.querySelectorAll('.hero-slide');
let currentSlide = 0;
setInterval(() => {
    slides[currentSlide].style.opacity = 0;
    slides[currentSlide].style.zIndex = 0;
    currentSlide = (currentSlide + 1) % slides.length;
    slides[currentSlide].style.opacity = 1;
    slides[currentSlide].style.zIndex = 1;
}, 4000);

document.addEventListener('DOMContentLoaded', function() {
    // Gallery image sets
    const galleryImages = {
        elephant: [
            '{{ asset("images/40caption (1).jpg") }}',
            '{{ asset("images/42ele8.jpg") }}',
            '{{ asset("images/41ele52.jpg") }}',
            '{{ asset("images/43ele54.jpg") }}',
            '{{ asset("images/44ele58.jpg") }}',
            '{{ asset("images/45image 17.jpg") }}'
        ],
        wildlife: [
            '{{ asset("images/23leopard.jpg") }}',
            '{{ asset("images/20image 3.jpg") }}',
            '{{ asset("images/22monkey.png.webp") }}',
            '{{ asset("images/21leopard 2.webp") }}',
            '{{ asset("images/24image 1.jpg") }}',
            '{{ asset("images/25goldenjackal.png.webp") }}'
        ],
        bird: [
            '{{ asset("images/6image 19.jfif") }}',
            '{{ asset("images/1piedkeenfisher.png") }}',
            '{{ asset("images/2paintedstork.png") }}',
            '{{ asset("images/3parrot.jfif") }}',
            '{{ asset("images/4peococke.jpg") }}',
            '{{ asset("images/5Eurasianhoopoe.png") }}'
        ],
        landscape: [
            '{{ asset("images/10chandrikawewa.jpg") }}',
            '{{ asset("images/11udawalawedam.png") }}',
            '{{ asset("images/12sankapala.jpg") }}',
            '{{ asset("images/13opanage.jpg") }}',
            '{{ asset("images/14katupila.jpg") }}',
            '{{ asset("images/15dam.jpg") }}'
        ],
         jeep: [
            '{{ asset("images/30VIP.jpg") }}',
            '{{ asset("images/31booking.jpg") }}',
            '{{ asset("images/32couple.jpg") }}',
            '{{ asset("images/33family.jpg") }}',
            '{{ asset("images/33sky.jpg") }}',
            '{{ asset("images/34night2.jpg") }}'
        ],
    };

    // Gallery variables
    let currentGallery = null;
    let currentIndex = 0;
    const modal = document.getElementById('gallery-modal');
    const closeBtn = document.getElementById('gallery-close');
    const prevBtn = document.getElementById('gallery-prev');
    const nextBtn = document.getElementById('gallery-next');
    const slider = document.getElementById('gallery-slider');
    const counter = document.getElementById('gallery-counter');
    const thumbs = document.querySelectorAll('.gallery-thumb');

    // Show gallery image
    function showGalleryImage() {
        if (!currentGallery || !galleryImages[currentGallery] || galleryImages[currentGallery].length === 0) return;
        // Use all images in the array
        const imagesToShow = galleryImages[currentGallery];
        // Ensure currentIndex is within bounds
        if (currentIndex >= imagesToShow.length) currentIndex = 0;
        if (currentIndex < 0) currentIndex = imagesToShow.length - 1;
        const totalImages = imagesToShow.length;
        const imageUrl = imagesToShow[currentIndex];
        // Add loading indicator
        slider.innerHTML = '<div id="gallery-loading" class="flex items-center justify-center w-full h-64"><span>Loading...</span></div>';
        const img = new Image();
        img.src = imageUrl;
        img.alt = `Gallery Image ${currentIndex + 1}`;
        img.className = 'w-full max-h-[70vh] object-contain rounded-lg shadow-md';
        img.onload = function() {
            slider.innerHTML = '';
            slider.appendChild(img);
        };
        if (counter) {
            counter.textContent = `${currentIndex + 1} / ${totalImages}`;
        }
    }

    // Open gallery
    thumbs.forEach(thumb => {
        thumb.addEventListener('click', function() {
            const gallery = this.getAttribute('data-gallery');
            if (gallery && galleryImages[gallery] && galleryImages[gallery].length > 0) {
                currentGallery = gallery;
                currentIndex = 0;
                showGalleryImage();
                modal.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                // Focus modal for accessibility
                setTimeout(() => modal.focus && modal.focus(), 100);
            }
        });
        // Keyboard accessibility for thumbnails
        thumb.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });

    // Close gallery
    if (closeBtn) {
        closeBtn.addEventListener('click', function() {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        });
    }

    // Previous image
    if (prevBtn) {
        prevBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (currentGallery && galleryImages[currentGallery]) {
                const imagesToShow = galleryImages[currentGallery];
                currentIndex = (currentIndex - 1 + imagesToShow.length) % imagesToShow.length;
                showGalleryImage();
            }
        });
    }

    // Next image
    if (nextBtn) {
        nextBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            if (currentGallery && galleryImages[currentGallery]) {
                const imagesToShow = galleryImages[currentGallery];
                currentIndex = (currentIndex + 1) % imagesToShow.length;
                showGalleryImage();
            }
        });
    }

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (modal.classList.contains('hidden')) return;
        if (e.key === 'Escape') {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        } else if (e.key === 'ArrowLeft') {
            prevBtn.click();
        } else if (e.key === 'ArrowRight') {
            nextBtn.click();
        }
    });

    // Close when clicking outside
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            modal.classList.add('hidden');
            document.body.style.overflow = '';
        }
    });
});
</script>
@endsection