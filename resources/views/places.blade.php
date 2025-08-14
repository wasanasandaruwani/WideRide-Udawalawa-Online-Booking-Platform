@extends('layouts.app')

@section('title', 'Places in Udawalawe Area')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-yellow-100 via-white to-green-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-extrabold text-center text-green-700 mb-10">Places to Visit in <span class="text-yellow-700">Udawalawe</span></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Place Card Example -->
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('nationalpark')">
                <img src="{{ asset('images/elephant5.jpg') }}" alt="Udawalawe National Park" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-green-200">
                <h2 class="text-2xl font-bold text-green-700 mb-2">Udawalawe National Park</h2>
                <p class="text-gray-600 text-center">Famous for its elephants and wildlife safaris, a must-visit for nature lovers.</p>
            </div>
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('elephanttransit')">
                <img src="{{ asset('images/Baby-elephants.jpg') }}" alt="Elephant Transit Home" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-yellow-200">
                <h2 class="text-2xl font-bold text-yellow-700 mb-2">Elephant Transit Home</h2>
                <p class="text-gray-600 text-center">A rehabilitation center for orphaned elephants, where you can watch feedings daily.</p>
            </div>
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('reservoir')">
                <img src="{{ asset('images/UdawalaweDam-Srilanka.jpg') }}" alt="Udawalawe Reservoir" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-blue-200">
                <h2 class="text-2xl font-bold text-blue-700 mb-2">Udawalawe Reservoir</h2>
                <p class="text-gray-600 text-center">A scenic spot for birdwatching and sunset views, bordering the national park.</p>
            </div>
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('sankapala')">
                <img src="{{ asset('images/sankapala 2.jpg') }}" alt="Sankapala Temple" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-red-200">
                <h2 class="text-2xl font-bold text-red-700 mb-2">Sankapala Temple</h2>
                <p class="text-gray-600 text-center">A historic Buddhist temple with panoramic views, located a short drive from Udawalawe.</p>
            </div>
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('madunagala')">
                <img src="{{ asset('images/madunagal.jpg') }}" alt="Madunagala Hot Springs" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-yellow-300">
                <h2 class="text-2xl font-bold text-yellow-700 mb-2">Madunagala Hot Springs</h2>
                <p class="text-gray-600 text-center">Natural hot springs popular for bathing, located within reach of Udawalawe.</p>
            </div>
            <div class="place-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showPlaceModal('mahinda')">
                <img src="{{ asset('images/stadium 2.JPG') }}" alt="Mahinda Rajapaksa Stadium" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-green-300">
                <h2 class="text-2xl font-bold text-green-700 mb-2">Mahinda Rajapaksa Stadium</h2>
                <p class="text-gray-600 text-center">A modern sports stadium hosting local and national events, near Udawalawe town.</p>
            </div>
        </div>
    </div>

    <!-- Place Modal -->
    <div id="placeModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 relative">
            <button onclick="closePlaceModal()" class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-red-500">&times;</button>
            <div id="placeModalContent">
                <!-- JS will fill this -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const placeDetails = {
        nationalpark: {
            name: 'Udawalawe National Park',
            img: '{{ asset('images/udawalawe park.jpg') }}',
            desc: 'Udawalawe National Park is one of Sri Lanka’s best places for elephant sightings and wildlife safaris. The park is home to elephants, leopards, deer, crocodiles, and hundreds of bird species.'
        },
        elephanttransit: {
            name: 'Elephant Transit Home',
            img: '{{ asset('images/ele53.jpg') }}',
            desc: 'The Elephant Transit Home cares for orphaned elephant calves until they are ready to be released back into the wild. Visitors can watch the elephants being fed at set times each day.'
        },
        reservoir: {
            name: 'Udawalawe Reservoir',
            img: '{{ asset('images/images.jpg') }}',
            desc: 'The Udawalawe Reservoir is a large man-made lake that provides water to the park and is a great spot for birdwatching, fishing, and enjoying beautiful sunsets.'
        },
        sankapala: {
            name: 'Sankapala Temple',
            img: '{{ asset('images/12sankapala.jpg') }}',
            desc: 'Sankapala Temple is a historic Buddhist temple with ancient caves and panoramic views. It is a peaceful place for meditation and sightseeing.'
        },
        madunagala: {
            name: 'Madunagala Hot Springs',
            img: '{{ asset('images/madunagala2.jpg') }}',
            desc: 'Madunagala Hot Springs are natural thermal springs popular for bathing and relaxation, located a short drive from Udawalawe.'
        },
        mahinda: {
            name: 'Mahinda Rajapaksa Stadium',
            img: '{{ asset('images/stadium.webp') }}',
            desc: 'Mahinda Rajapaksa Stadium is a modern sports venue hosting cricket and other events, located near Udawalawe town.'
        }
    };
    function showPlaceModal(key) {
        const place = placeDetails[key];
        if (!place) return;
        document.getElementById('placeModalContent').innerHTML = `
            <img src="${place.img}" alt="${place.name}" class="w-48 h-48 object-cover rounded-xl mx-auto mb-4 border-4 border-green-300">
            <h2 class="text-3xl font-bold text-center text-green-700 mb-2">${place.name}</h2>
            <p class="text-gray-700 text-center text-lg">${place.desc}</p>
        `;
        document.getElementById('placeModal').classList.remove('hidden');
    }
    function closePlaceModal() {
        document.getElementById('placeModal').classList.add('hidden');
    }
</script>
@endsection
