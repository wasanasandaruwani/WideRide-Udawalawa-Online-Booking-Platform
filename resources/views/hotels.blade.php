@extends('layouts.app')

@section('title', 'Hotels Near Udawalawe')

@section('content')
<div id="hotels-section" class="container mx-auto py-12">
    <h1 class="text-4xl font-extrabold mb-8 text-center text-yellow-600 drop-shadow-lg">Hotels Near Udawalawe</h1>
    <p class="mb-10 text-lg text-center text-gray-700 max-w-2xl mx-auto">Discover comfortable and convenient hotels for your stay near Udawalawe National Park. Here are some recommended options for every type of traveler.</p>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Hotel Card 1 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://centauriaresorts.com/centauria-wild/" target="_blank" rel="noopener">
                <img src="{{ asset('images/centu.jpg') }}" alt="Centauria Wild" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Centauria Wild</h2>
                <p class="text-gray-600 mb-4">
                    <span id="centauria-short">Get the celebrity treatment with world-class service at Centauria Wild Offering a spa centre and sauna, Centauria Wild is located in Udawalawe, 1 km from Udawalawe National Park...</span>
                    <span id="centauria-full" class="hidden"> Get the celebrity treatment with world-class service at Centauria Wild Offering a spa centre and sauna, Centauria Wild is located in Udawalawe, 1 km from Udawalawe National Park. The hotel has an outdoor pool and year-round outdoor pool, and guests can enjoy a meal at the restaurant. Free private parking is available on site. Every room at this hotel is air conditioned and is fitted with a flat-screen TV. Certain units feature a seating area to relax in after a busy day. The rooms are fitted with a private bathroom fitted with a bath and bidet. Extras include bathrobes, slippers and free toiletries. Centauria Wild features free WiFi throughout the property.</span>
                    <button id="read-more-centauria" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded-full text-xs font-semibold">Budget</span>
            </div>
        </div>
        <!-- Hotel Card 2 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://www.grandudawalawe.com/" target="_blank" rel="noopener">
                <img src="{{ asset('images/grand.jpg') }}" alt="Grand Udawalawe Safari Resort" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Grand Udawalawe Safari Resort</h2>
                <p class="text-gray-600 mb-4">
                    <span id="grand-short">Experience world-class service at Grand Udawalawe Safari Resort Located within a 10-minute drive from the famous Udawalawe National Park, Grand Udawalawe Safari Resort features an outdoor swimming pool and offers spacious rooms with views of the surrounding nature...</span>
                    <span id="grand-full" class="hidden">Experience world-class service at Grand Udawalawe Safari Resort
Located within a 10-minute drive from the famous Udawalawe National Park, Grand Udawalawe Safari Resort features an outdoor swimming pool and offers spacious rooms with views of the surrounding nature. Free parking is available on site.

The resort is just 500 metres to Ath Athuru Sevana, an elephant orphanage, and approximately 160 km from Katunayake Airport. The Mahinda Rajapaksa International Cricket Stadium is within a 40-minute drive away.

Fitted with parquet flooring, air-conditioned rooms are furnished with a wardrobe, a flat-screen satellite TV, an electric kettle and ironing facilities. En suite bathrooms come with a hairdryer, bathtub or shower facility. Wired internet is provided at a charge.

Operating a 24-hour front desk, Grand Udawalawe Safari Resort provides laundry and fax/photocopying services. Meeting/ banqueting facilities are available, while airport transfer can be arranged at an extra surcharge.

The in-house restaurant serves delectable local and international dishes. Guests may also enjoy meals in private with room service.</span>
                    <button id="read-more-grand" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Family</span>
            </div>
        </div>
        <!-- Hotel Card 3 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://hotelathgira.com/" target="_blank" rel="noopener">
                <img src="{{ asset('images/athgira.jpeg') }}" alt="athgira" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Athgira hotel</h2>
                <p class="text-gray-600 mb-4">
                    <span id="athgira-short">About this property: Hotel Athgira features accommodation with an outdoor swimming pool and a relaxing garden. The property also offers a shared lounge and 24-hour front desk, as well as free WiFi...</span>
                    <span id="athgira-full" class="hidden">About this property
Hotel Athgira features accommodation with an outdoor swimming pool. With a garden, the property also features a shared lounge. The accommodation offers a 24-hour front desk as well as free WiFi.

At the hotel each room includes a balcony with pool view. Hotel Athgira provides some units that have garden views, and all rooms are equipped with a private bathroom with a shower. The rooms are fitted with a TV with satellite channels.

A halal, Asian or continental breakfast can be enjoyed in the breakfast area.

The area is popular for cycling, and bike hire and car hire are available at the accommodation.</span>
                    <button id="read-more-athgira" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-xs font-semibold">Luxury</span>
            </div>
        </div>
        <!-- Hotel Card 4 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://www.royalreach.lk/" target="_blank" rel="noopener">
                <img src="{{ asset('images/royal.jpg') }}" alt="Jungle Paradise" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Royal Reach Udawalawe</h2>
                <p class="text-gray-600 mb-4">
                    <span id="royal-short">Get the celebrity treatment with world-class service at Royal Reach Udawalawe. Elegant Accommodation: Royal Reach Udawalawe in Embilipitiya offers a 5-star hotel experience with a year-round outdoor swimming pool, fitness centre, sun terrace, and lush gardens...</span>
                    <span id="royal-full" class="hidden">Get the celebrity treatment with world-class service at Royal Reach Udawalawe
Elegant Accommodation: Royal Reach Udawalawe in Embilipitiya offers a 5-star hotel experience with a year-round outdoor swimming pool, fitness centre, sun terrace, and lush gardens. Free WiFi is available throughout the property.

Comfortable Amenities: Guests enjoy private check-in and check-out, a 24-hour front desk, and a range of facilities including a lounge, outdoor fireplace, and children’s playground. Additional services include a tour desk and free on-site private parking.

Dining Options: The family-friendly restaurant serves Chinese, Indian, local, and international cuisines in a traditional, modern, or romantic ambience. Breakfast includes continental, American, buffet, and full English options.

Prime Location: Located 21 km from Udawalawe National Park and 45 km from Mattala Rajapaksa International Airport, the hotel provides easy access to local attractions.</span>
                    <button id="read-more-royal" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-emerald-100 text-emerald-800 px-3 py-1 rounded-full text-xs font-semibold">Eco</span>
            </div>
        </div>
        <!-- Hotel Card 5 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://www.themacollection.com/waraka-udawalawe/" target="_blank" rel="noopener">
                <img src="{{ asset('images/waraka.jpg') }}" alt="Waraka" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Waraka Hotel</h2>
                <p class="text-gray-600 mb-4">
                    <span id="waraka-short">Get the celebrity treatment with world-class service at Waraka - Udawalawe by Thema Collection. Elegant Accommodations: Waraka - Udawalawe by Thema Collection in Udawalawe offers a 5-star hotel experience with an infinity swimming pool, spa facilities, and a lush garden...</span>
                    <span id="waraka-full" class="hidden">Get the celebrity treatment with world-class service at Waraka - Udawalawe by Thema Collection
Elegant Accommodations: Waraka - Udawalawe by Thema Collection in Udawalawe offers a 5-star hotel experience with an infinity swimming pool, spa facilities, and a lush garden. Guests can relax on the terrace or enjoy meals at the family-friendly restaurant.

Comfortable Amenities: The hotel features free WiFi, a 24-hour front desk, concierge service, and wellness packages. Additional amenities include air-conditioning, private bathrooms, and balconies with garden or pool views.

Dining Options: Breakfast options include continental, American, buffet, à la carte, vegetarian, halal, and Asian. The restaurant serves local, Asian, and international cuisines for lunch, dinner, and high tea, accommodating special diets.

Prime Location: Located 32 mi from Mattala Rajapaksa International Airport and 9.9 mi from Udawalawe National Park, the hotel provides easy access to local attractions. Cycling activities are available for guests.</span>
                    <button id="read-more-waraka" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Family</span>
            </div>
        </div>

         <!-- Hotel Card 6 -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:scale-105 transition-transform duration-300">
            <a href="https://kalushideaway.com/" target="_blank" rel="noopener">
                <img src="{{ asset('images/kalu.jpg') }}" alt="Kalu" class="w-full h-56 object-cover cursor-pointer">
            </a>
            <div class="p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Kalu's Hideaway Udawalawe</h2>
                <p class="text-gray-600 mb-4">
                    <span id="kalu-short">Kalu's Hideaway Udawalawe provides a relaxing stay in Udawalawe, with 5 acres of beautifully manicured gardens, an outdoor swimming pool, a restaurant, and an in-house library...</span>
                    <span id="kalu-full" class="hidden">Kalu's Hideaway Udawalawe provides a relaxing stay in Udawalawe. The property boasts 5 acres of beautifully manicured gardens and provides facilities like an outdoor swimming pool, a restaurant and an in-house library.

The hotel is located about 40 km from the Mattala International Airport and 10 km from Pallebedda Sri Sankapala Raja Maha Viharaya. Udawalawe National Park and Ath Athuru Sevana (Elephant Transit Home) are located within 3 km of the hotel. Udawalawe Bus Station is located about 6 km away.

Kalu's Hideaway Udawalawe provides beautiful accommodation, all offering a private balcony. They are well equipped with comfortable beds, private bathroom facilities and spacious interiors. Some rooms have a separate seating area.
The hotel provides a wellness centre and offers massage services at an extra charge. Younger guests can enjoy the playground.

Guests can sample a selection of Sri Lankan, Indian, Chinese and Continental cuisine at the restaurant. There are also barbecue facilities on site. Room service is available.</span>
                    <button id="read-more-kalu" class="text-blue-600 hover:underline ml-2 text-sm">Read more</button>
                </p>
                <span class="inline-block bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-semibold">Family</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Centauria Wild
    const btn1 = document.getElementById('read-more-centauria');
    const shortText1 = document.getElementById('centauria-short');
    const fullText1 = document.getElementById('centauria-full');
    if (btn1) {
        btn1.addEventListener('click', function() {
            if (fullText1.classList.contains('hidden')) {
                fullText1.classList.remove('hidden');
                shortText1.classList.add('hidden');
                btn1.textContent = 'Show less';
            } else {
                fullText1.classList.add('hidden');
                shortText1.classList.remove('hidden');
                btn1.textContent = 'Read more';
            }
        });
    }
    // Grand Udawalawe Safari Resort
    const btn2 = document.getElementById('read-more-grand');
    const shortText2 = document.getElementById('grand-short');
    const fullText2 = document.getElementById('grand-full');
    if (btn2) {
        btn2.addEventListener('click', function() {
            if (fullText2.classList.contains('hidden')) {
                fullText2.classList.remove('hidden');
                shortText2.classList.add('hidden');
                btn2.textContent = 'Show less';
            } else {
                fullText2.classList.add('hidden');
                shortText2.classList.remove('hidden');
                btn2.textContent = 'Read more';
            }
        });
    }
    // Athgira hotel
    const btnAthgira = document.getElementById('read-more-athgira');
    const shortAthgira = document.getElementById('athgira-short');
    const fullAthgira = document.getElementById('athgira-full');
    if (btnAthgira) {
        btnAthgira.addEventListener('click', function() {
            if (fullAthgira.classList.contains('hidden')) {
                fullAthgira.classList.remove('hidden');
                shortAthgira.classList.add('hidden');
                btnAthgira.textContent = 'Show less';
            } else {
                fullAthgira.classList.add('hidden');
                shortAthgira.classList.remove('hidden');
                btnAthgira.textContent = 'Read more';
            }
        });
    }
    // Royal Reach Udawalawe
    const btn5 = document.getElementById('read-more-royal');
    const shortText5 = document.getElementById('royal-short');
    const fullText5 = document.getElementById('royal-full');
    if (btn5) {
        btn5.addEventListener('click', function() {
            if (fullText5.classList.contains('hidden')) {
                fullText5.classList.remove('hidden');
                shortText5.classList.add('hidden');
                btn5.textContent = 'Show less';
            } else {
                fullText5.classList.add('hidden');
                shortText5.classList.remove('hidden');
                btn5.textContent = 'Read more';
            }
        });
    }
    // Waraka Hotel
    const btnWaraka = document.getElementById('read-more-waraka');
    const shortWaraka = document.getElementById('waraka-short');
    const fullWaraka = document.getElementById('waraka-full');
    if (btnWaraka) {
        btnWaraka.addEventListener('click', function() {
            if (fullWaraka.classList.contains('hidden')) {
                fullWaraka.classList.remove('hidden');
                shortWaraka.classList.add('hidden');
                btnWaraka.textContent = 'Show less';
            } else {
                fullWaraka.classList.add('hidden');
                shortWaraka.classList.remove('hidden');
                btnWaraka.textContent = 'Read more';
            }
        });
    }
    // Kalu's Hideaway
    const btnKalu = document.getElementById('read-more-kalu');
    const shortKalu = document.getElementById('kalu-short');
    const fullKalu = document.getElementById('kalu-full');
    if (btnKalu) {
        btnKalu.addEventListener('click', function() {
            if (fullKalu.classList.contains('hidden')) {
                fullKalu.classList.remove('hidden');
                shortKalu.classList.add('hidden');
                btnKalu.textContent = 'Show less';
            } else {
                fullKalu.classList.add('hidden');
                shortKalu.classList.remove('hidden');
                btnKalu.textContent = 'Read more';
            }
        });
    }
});
</script>
@endsection
