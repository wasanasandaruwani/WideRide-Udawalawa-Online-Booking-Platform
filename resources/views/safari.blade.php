@extends('layouts.app')

@section('title', 'Safari Packages')

@section('content')
<div class="container mx-auto py-16 px-4">
    <h1 class="text-4xl font-bold text-yellow-600 mb-8 text-center">Safari Packages</h1>
    <!--  Dropdown Only -->
    <div style="max-width:320px;margin:0 auto 2rem auto;position:relative;">
        <select id="package-dropdown" style="width:100%;padding:12px 16px;border-radius:24px;border:1px solid #ccc;font-size:18px;background:#fff;">
            <option value="">All Packages</option>
            <option value="gold">Full Day Safari</option>
            <option value="platinum">VIP Luxury Safari</option>
            <option value="silver">Morning Safari</option>
            <option value="evening-safari">Evening Safari</option>
            <option value="elephants-watching-safari">Elephants Watching Safari</option>
            <option value="family-safari">Family Safari</option>
            <option value="photography-safari">Photography Safari</option>
            <option value="night-safari">Night Safari</option>
            <option value="eco-safari">Eco Safari</option>
            <option value="group-safari">Group Safari</option>
        </select>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="packages-list">
        <!-- Gold Package -->
        <div class="relative package-highlight package-gold">
            <span class="package-nickname">Gold</span>
            <img src="{{ asset('images/33sky.jpg') }}" alt="Full Day Safari" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-2 text-gray-800">Full Day Safari</h2>
                <p class="text-gray-700 mb-4">A complete day in the wild! Includes lunch, refreshments, and a dedicated guide. Perfect for wildlife enthusiasts.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 10,000 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'gold', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="gold">Details</a>
            </div>
        </div>
        <!-- Platinum Package -->
        <div class="relative package-highlight package-platinum">
            <span class="package-nickname">Platinum</span>
            <img src="{{ asset('images/30vip.jpg') }}" alt="VIP Safari" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-2 text-gray-800">VIP Luxury Safari</h2>
                <p class="text-gray-700 mb-4">Private luxury jeep, gourmet meals, park entry, and a professional photographer. The ultimate safari experience.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 25,000 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'platinum', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="platinum">Details</a>
            </div>
        </div>
        <!-- Silver Package -->
        <div class="relative package-highlight package-silver">
            <span class="package-nickname">Silver</span>
            <img src="{{ asset('images/morning.jpg') }}" alt="Morning Safari" class="w-full h-48 object-cover rounded-t-lg">
            <div class="p-6">
                <h2 class="text-2xl font-bold mb-2 text-gray-800">Morning Safari</h2>
                <p class="text-gray-700 mb-4">Experience the wildlife at sunrise with our guided morning safari tour. Includes breakfast and park entry.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 5,000 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'silver', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="silver">Details</a>
            </div>
        </div>
        <!-- 7 More Packages  -->
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/image 28.jpg') }}" alt="Evening Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Evening Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Enjoy the golden hour and spot elephants and birds on our evening safari. Includes snacks and park entry.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 5,500 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'evening-safari', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="evening-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/elephant5.jpg') }}" alt="elephant Watching Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Elephants Watching Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Discover Udawalawe's vibrant elephantlife with an expert guide. Includes binoculars, snacks, and park entry.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 6,000 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'elephants-watching-safari', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="elephants-watching-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/33family.jpg') }}" alt="Family Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Family Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">A fun and safe safari for families with children. Includes snacks, games, and a family-friendly guide.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 8,000  family</span>
                <a href="{{ route('bookings.create', ['package_id' => 'family-safari', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="family-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/photography.jpg') }}" alt="Photography Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Photography Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Guided by a wildlife photographer. Includes special stops for the best shots and photo tips.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 12,000 </span>
                <a href="{{ route('bookings.create', ['package_id' => 'photography-safari', 'date' => date('Y-m-d'), 'people' => 2]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="photography-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/night.jpg') }}" alt="Night Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Night Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Explore the park after dark and spot nocturnal wildlife. Includes night vision equipment.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 9,000 </span>
                <a href="{{ route('bookings.create', [
                    'package_id' => 'night-safari',
                    'date' => date('Y-m-d'),
                    'people' => 2,
                    'name' => 'Night Safari'
                ]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="night-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/eco.jpg') }}" alt="Eco Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Eco Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Eco-friendly jeeps, local snacks, and a focus on conservation. Great for nature lovers.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 7,000 </span>
                <a href="{{ route('bookings.create', [
                    'package_id' => 'eco-safari',
                    'date' => date('Y-m-d'),
                    'people' => 2,
                    'name' => 'Eco Safari'
                ]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="eco-safari">Details</a>
            </div>
        </div>
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition-transform flex flex-col">
            <img src="{{ asset('images/group.jpg') }}" alt="Group Safari" class="w-full h-48 object-cover">
            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">Group Safari</h2>
                <p class="text-gray-600 mb-4 flex-1">Special rates for groups of 6 or more. Includes guide, snacks, and group activities.</p>
                <span class="block text-indigo-700 font-bold text-lg mb-2">LKR 4,500 </span>
                <a href="{{ route('bookings.create', [
                    'package_id' => 'group-safari',
                    'date' => date('Y-m-d'),
                    'people' => 2,
                    'name' => 'Group Safari'
                ]) }}" class="inline-block px-6 py-2 font-bold bg-green-600 hover:bg-green-700 text-white rounded-md shadow transition duration-300 text-base">Book Now</a>
                <a href="#" class="inline-block px-6 py-2 bg-yellow-500 hover:bg-gray-900 text-white rounded-lg font-semibold shadow transition details-btn" data-package="group-safari">Details</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Structure -->
<div id="package-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
        <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-2xl">&times;</button>
        <h2 id="modal-title" class="text-2xl font-bold mb-2 text-gray-800"></h2>
        <!-- Gallery -->
        <div id="modal-gallery" class="mb-4 flex flex-col items-center">
            <img id="modal-main-img" src="" alt="" class="w-full h-48 object-cover rounded mb-2">
            <div id="modal-thumbs" class="flex gap-2"></div>
        </div>
        <p id="modal-desc" class="text-gray-700 mb-2"></p>
        <ul id="modal-features" class="mb-4 list-disc pl-5 text-gray-600"></ul>
        <span id="modal-price" class="block text-indigo-700 font-bold text-lg mb-4"></span>
        <span id="modal-limit" class="block text-red-600 font-semibold text-base mb-2"></span>
        <button id="modal-back-btn" class="w-full mt-2 px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg font-semibold shadow flex items-center justify-center">
            <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
            Back
        </button>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container { max-width: 1200px; }
    .package-highlight {
        box-shadow: 0 8px 32px 0 rgba(255, 215, 0, 0.15), 0 1.5px 6px 0 rgba(0,0,0,0.08);
        border-width: 3px;
        border-style: solid;
        transition: box-shadow 0.3s, border-color 0.3s, transform 0.3s;
        position: relative;
        overflow: visible;
    }
    .package-gold {
        border-color: #FFD700;
        background: linear-gradient(135deg, #fffbe6 0%, #ffe066 100%);
        box-shadow: 0 0 24px 4px #ffe06699, 0 8px 32px 0 rgba(255, 215, 0, 0.15);
    }
    .package-gold.pulse {
        animation: gold-pulse 1.2s ease-in-out 1;
    }
    @keyframes gold-pulse {
        0% { box-shadow: 0 0 0 0 #ffd70088; }
        70% { box-shadow: 0 0 40px 16px #ffd70088; }
        100% { box-shadow: 0 0 24px 4px #ffe06699; }
    }
    .package-gold:hover {
        box-shadow: 0 0 40px 8px #ffd700cc, 0 8px 32px 0 rgba(255, 215, 0, 0.25);
        border-color: #ffb300;
        transform: scale(1.04) rotate(-1deg);
    }
    .package-platinum {
        border-color: #bfc9ca;
        background: linear-gradient(135deg, #f8fafc 0%, #d6dbdf 100%);
        box-shadow: 0 0 24px 4px #bfc9ca99, 0 8px 32px 0 rgba(191,201,202,0.15);
    }
    .package-platinum.pulse {
        animation: platinum-pulse 1.2s ease-in-out 1;
    }
    @keyframes platinum-pulse {
        0% { box-shadow: 0 0 0 0 #bfc9ca88; }
        70% { box-shadow: 0 0 40px 16px #bfc9ca88; }
        100% { box-shadow: 0 0 24px 4px #bfc9ca99; }
    }
    .package-platinum:hover {
        box-shadow: 0 0 40px 8px #bfc9cacc, 0 8px 32px 0 rgba(191,201,202,0.25);
        border-color: #8e9eab;
        transform: scale(1.04) rotate(1deg);
    }
    .package-silver {
        border-color: #b0b0b0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e0e0e0 100%);
        box-shadow: 0 0 24px 4px #b0b0b099, 0 8px 32px 0 rgba(176,176,176,0.15);
    }
    .package-silver.pulse {
        animation: silver-pulse 1.2s ease-in-out 1;
    }
    @keyframes silver-pulse {
        0% { box-shadow: 0 0 0 0 #b0b0b088; }
        70% { box-shadow: 0 0 40px 16px #b0b0b088; }
        100% { box-shadow: 0 0 24px 4px #b0b0b099; }
    }
    .package-silver:hover {
        box-shadow: 0 0 40px 8px #b0b0b0cc, 0 8px 32px 0 rgba(176,176,176,0.25);
        border-color: #888;
        transform: scale(1.04) rotate(-1deg);
    }
    .package-nickname {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        background: rgba(0,0,0,0.7);
        color: #fff;
        font-weight: bold;
        padding: 0.25rem 1.5rem 0.25rem 0.75rem;
        border-radius: 9999px;
        font-size: 1rem;
        letter-spacing: 1px;
        z-index: 10;
        box-shadow: 0 2px 8px 0 rgba(0,0,0,0.12);
        border: 2px solid #fffbe6;
        text-shadow: 0 1px 4px #0008;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    .package-gold .package-nickname::before {
        content: '\1F451'; /* Crown emoji */
        font-size: 1.2em;
        margin-right: 0.3em;
    }
    .package-platinum .package-nickname::before {
        content: '\2B50'; /* Star emoji */
        font-size: 1.2em;
        margin-right: 0.3em;
    }
    .package-silver .package-nickname::before {
        content: '\1F48E'; /* Gem emoji */
        font-size: 1.2em;
        margin-right: 0.3em;
    }
    /* Animated border for highlight */
    .package-highlight::after {
        content: '';
        display: block;
        position: absolute;
        inset: 0;
        border-radius: 1rem;
        pointer-events: none;
        border: 3px solid transparent;
        transition: border-color 0.4s;
    }
    .package-gold::after { border-color: #ffe066; }
    .package-gold:hover::after { border-color: #ffd700; }
    .package-platinum::after { border-color: #bfc9ca; }
    .package-platinum:hover::after { border-color: #8e9eab; }
    .package-silver::after { border-color: #b0b0b0; }
    .package-silver:hover::after { border-color: #888; }
    @media (max-width: 640px) {
        #package-search {
            font-size: 1rem;
            padding: 0.6rem 1.5rem 0.6rem 2.5rem;
        }
        .absolute.left-5 {
            left: 1rem;
        }
    }
</style>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal data for each package (add gallery and features)
    const packageData = [
        {
            id: 'gold',
            title: 'Full Day Safari',
            gallery: [
                '{{ asset('images/33sky.jpg') }}',
                '{{ asset('images/fullday1.jpg') }}',
                '{{ asset('images/fullday2.jpg') }}'
            ],
            desc: 'A complete day in the wild! Includes lunch, refreshments, and a dedicated guide. Perfect for wildlife enthusiasts.',
            features: [
                'Lunch and refreshments included',
                'Dedicated wildlife guide',
                'Park entry fees covered',
                'Flexible timings',
                'Binoculars provided'
            ],
            price: 'LKR 10,000',
            link: '{{ url('/packages/gold') }}',
            limit: 6 // Example: 6 persons
        },
        {
            id: 'platinum',
            title: 'VIP Luxury Safari',
            gallery: [
                '{{ asset('images/vip1.jpg') }}',
                '{{ asset('images/vip2.jpg') }}',
                '{{ asset('images/vip3.jpg') }}'
            ],
            desc: 'Private luxury jeep, gourmet meals, park entry, and a professional photographer. The ultimate safari experience.',
            features: [
                'Private luxury jeep',
                'Gourmet meals',
                'Professional photographer',
                'All-inclusive package',
                'Personalized itinerary'
            ],
            price: 'LKR 25,000 ',
            link: '{{ url('/packages/platinum') }}',
            limit: 4 // Example: 4 persons
        },
        {
            id: 'silver',
            title: 'Morning Safari',
            gallery: [
                '{{ asset('images/morning.jpg') }}',
                '{{ asset('images/elep.jpg') }}',
                '{{ asset('images/ele5.jpg') }}'
            ],
            desc: 'Experience the wildlife at sunrise with our guided morning safari tour. Includes breakfast and park entry.',
            features: [
                'Breakfast included',
                'Early morning start',
                'Expert guide',
                'Park entry included',
                'Ideal for birdwatching'
            ],
            price: 'LKR 5,000',
            link: '{{ url('/packages/silver') }}',
            limit: 10 // Example: 10 persons
        },
        {
            id: 'evening-safari',
            title: 'Evening Safari',
            gallery: [
                '{{ asset('images/image 28.jpg') }}',
                '{{ asset('images/ele6.jpg') }}',
                '{{ asset('images/ele7.jpg') }}'
            ],
            desc: 'Enjoy the golden hour and spot elephants and birds on our evening safari. Includes snacks and park entry.',
            features: [
                'Snacks included',
                'Golden hour photography',
                'Bird and elephant sightings',
                'Park entry included',
                'Professional guide'
            ],
            price: 'LKR 5,500',
            link: '{{ url('/packages/evening-safari') }}',
            limit: 8 // Example: 8 persons
        },
        {
            id: 'elephants-watching-safari',
            title: 'Elephants Watching Safari',
            gallery: [
                '{{ asset('images/elephant5.jpg') }}',
                '{{ asset('images/elep.jpg') }}',
                '{{ asset('images/ele53.jpg') }}'
            ],
            desc: 'Discover Udawalawe\'s vibrant elephantlife with an expert guide. Includes binoculars, snacks, and park entry.',
            features: [
                'Binoculars provided',
                'Expert elephant guide',
                'Snacks included',
                'Park entry included',
                'Best for elephant lovers'
            ],
            price: 'LKR 6,000',
            link: '{{ url('/packages/elephants-watching-safari') }}',
            limit: 12 // Example: 12 persons
        },
        {
            id: 'family-safari',
            title: 'Family Safari',
            gallery: [
                '{{ asset('images/vip2.jpg') }}',
                '{{ asset('images/full.jpg') }}',
                '{{ asset('images/kids.jpg') }}'
            ],
            desc: 'A fun and safe safari for families with children. Includes snacks, games, and a family-friendly guide.',
            features: [
                'Games for kids',
                'Family-friendly guide',
                'Snacks included',
                'Park entry included',
                'Safe for all ages'
            ],
            price: 'LKR 8,000 / family',
            link: '{{ url('/packages/family-safari') }}',
            limit: 5 // Example: 5 families
        },
        {
            id: 'photography-safari',
            title: 'Photography Safari',
            gallery: [
                '{{ asset('images/photography.jpg') }}',
                '{{ asset('images/image 8.jpg') }}',
                '{{ asset('images/photo-1716462034394-6347b27a7552.avif') }}'
            ],
            desc: 'Guided by a wildlife photographer. Includes special stops for the best shots and photo tips.',
            features: [
                'Wildlife photographer guide',
                'Photo stops',
                'Tips and tricks',
                'Park entry included',
                'Best for photographers'
            ],
            price: 'LKR 12,000',
            link: '{{ url('/packages/photography-safari') }}',
            limit: 8 // Example: 8 persons
        },
        {
            id: 'night-safari',
            title: 'Night Safari',
            gallery: [
                '{{ asset('images/night.jpg') }}',
                '{{ asset('images/image 8.jpg') }}',
                '{{ asset('images/elep.jpg') }}'
            ],
            desc: 'Explore the park after dark and spot nocturnal wildlife. Includes night vision equipment.',
            features: [
                'Night vision equipment',
                'Nocturnal wildlife',
                'Expert night guide',
                'Park entry included',
                'Unique experience'
            ],
            price: 'LKR 9,000',
            link: '{{ url('/packages/night-safari') }}',
            limit: 10 // Example: 10 persons
        },
        {
            id: 'eco-safari',
            title: 'Eco Safari',
            gallery: [
                '{{ asset('images/eco.jpg') }}',
                '{{ asset('images/river.jpg') }}',
                '{{ asset('images/axisdeer.webp') }}'
            ],
            desc: 'Eco-friendly jeeps, local snacks, and a focus on conservation. Great for nature lovers.',
            features: [
                'Eco-friendly jeep',
                'Local snacks',
                'Conservation focus',
                'Park entry included',
                'Nature lover special'
            ],
            price: 'LKR 7,000',
            link: '{{ url('/packages/eco-safari') }}',
            limit: 6 // Example: 6 persons
        },
        {
            id: 'group-safari',
            title: 'Group Safari',
            gallery: [
                '{{ asset('images/group.jpg') }}',
                '{{ asset('images/image 14.jpg') }}',
                '{{ asset('images/standard.jpg') }}'
            ],
            desc: 'Special rates for groups of 6 or more. Includes guide, snacks, and group activities.',
            features: [
                'Group activities',
                'Special rates',
                'Snacks included',
                'Park entry included',
                'Guide for groups'
            ],
            price: 'LKR 4,500 / person',
            link: '{{ url('/packages/group-safari') }}',
            limit: 6 // Example: 6 persons
        }
    ];

    // Attach click event to all details buttons
    document.querySelectorAll('.details-btn').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            const pkgId = this.getAttribute('data-package');
            const pkg = packageData.find(p => p.id === pkgId);
            if (pkg) {
                document.getElementById('modal-title').textContent = pkg.title;
                // Gallery
                const mainImg = document.getElementById('modal-main-img');
                const thumbs = document.getElementById('modal-thumbs');
                mainImg.src = pkg.gallery[0];
                mainImg.alt = pkg.title;
                thumbs.innerHTML = '';
                pkg.gallery.forEach((img, idx) => {
                    const thumb = document.createElement('img');
                    thumb.src = img;
                    thumb.alt = pkg.title + ' photo ' + (idx+1);
                    thumb.className = 'w-16 h-12 object-cover rounded cursor-pointer border-2 border-gray-200 hover:border-blue-500';
                    if(idx === 0) thumb.classList.add('border-blue-500');
                    thumb.addEventListener('click', function() {
                        mainImg.src = img;
                        document.querySelectorAll('#modal-thumbs img').forEach(t => t.classList.remove('border-blue-500'));
                        thumb.classList.add('border-blue-500');
                    });
                    thumbs.appendChild(thumb);
                });
                document.getElementById('modal-desc').textContent = pkg.desc;
                // Features
                const featuresList = document.getElementById('modal-features');
                featuresList.innerHTML = '';
                pkg.features.forEach(f => {
                    const li = document.createElement('li');
                    li.textContent = f;
                    featuresList.appendChild(li);
                });
                document.getElementById('modal-price').textContent = pkg.price;
                document.getElementById('modal-limit').textContent = pkg.limit ? `Limited to ${pkg.limit} persons` : '';
                // Show modal
                document.getElementById('package-modal').classList.remove('hidden');
            }
        });
    });
    // Close modal events
    document.getElementById('close-modal').addEventListener('click', function() {
        document.getElementById('package-modal').classList.add('hidden');
    });
    document.getElementById('modal-back-btn').addEventListener('click', function() {
        document.getElementById('package-modal').classList.add('hidden');
    });
    window.addEventListener('click', function(e) {
        if (e.target === document.getElementById('package-modal')) {
            document.getElementById('package-modal').classList.add('hidden');
        }
    });
    // Dropdown filter for packages
    document.getElementById('package-dropdown').addEventListener('change', function() {
        const selected = this.value;
        document.querySelectorAll('#packages-list > div').forEach(card => {
            if (!selected || card.querySelector('.details-btn').getAttribute('data-package') === selected) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
});
</script>
@endsection
