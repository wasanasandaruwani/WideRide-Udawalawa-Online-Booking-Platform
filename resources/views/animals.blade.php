@extends('layouts.app')

@section('title', 'Animals of Udawalawe & Yala')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-green-100 via-white to-yellow-100 py-12 px-4">
    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-extrabold text-center text-yellow-700 mb-10">Animals of <span class="text-green-700">Udawalawe</span> <span class="text-orange-600"></span></h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Animal Card Example -->
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('elephant')">
                <img src="{{ asset('images/asianelephant.jpg') }}" alt="Asian Elephant" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-yellow-200">
                <h2 class="text-2xl font-bold text-green-700 mb-2">Asian Elephant</h2>
                <p class="text-gray-600 text-center">The largest land mammal in Sri Lanka, commonly seen in herds in both Udawalawe and Yala National Parks.</p>
            </div>
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('leopard')">
                <img src="{{ asset('images/23leopard.jpg') }}" alt="Sri Lankan Leopard" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-orange-200">
                <h2 class="text-2xl font-bold text-orange-700 mb-2">Sri Lankan Leopard</h2>
                <p class="text-gray-600 text-center">A rare and majestic predator, the Sri Lankan Leopard is a highlight for visitors, especially in Yala.</p>
            </div>
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('deer')">
                <img src="{{ asset('images/image 20.jfif') }}" alt="Spotted Deer" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-green-200">
                <h2 class="text-2xl font-bold text-green-600 mb-2">Spotted Deer</h2>
                <p class="text-gray-600 text-center">Graceful and abundant, spotted deer roam freely in the grasslands of both parks.</p>
            </div>
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('slothbear')">
                <img src="{{ asset('images/Sloth Bear.jpg') }}" alt="Sloth Bear" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-black">
                <h2 class="text-2xl font-bold text-black mb-2">Sloth Bear</h2>
                <p class="text-gray-600 text-center">A shy and nocturnal animal, the sloth bear is a rare sight but can be found in both parks.</p>
            </div>
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('crocodile')">
                <img src="{{ asset('images/crocodiles.webp') }}" alt="Mugger Crocodile" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-green-400">
                <h2 class="text-2xl font-bold text-green-800 mb-2">Mugger Crocodile</h2>
                <p class="text-gray-600 text-center">Often seen basking on riverbanks, these crocodiles are common in Udawalawe and Yala's water bodies.</p>
            </div>
            <div class="animal-card bg-white rounded-2xl shadow-lg p-6 flex flex-col items-center hover:scale-105 transition-transform duration-300 cursor-pointer" onclick="showAnimalModal('peacock')">
                <img src="{{ asset('images/image 25.jpg') }}" alt="Peacock" class="w-40 h-40 object-cover rounded-xl mb-4 border-4 border-blue-300">
                <h2 class="text-2xl font-bold text-blue-700 mb-2">Peacock</h2>
                <p class="text-gray-600 text-center">The vibrant peacock is a common and beautiful sight, especially during the mating season.</p>
            </div>
        </div>
    </div>

    <!-- Animal Modal -->
    <div id="animalModal" class="fixed inset-0 bg-black bg-opacity-60 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl shadow-2xl max-w-lg w-full p-8 relative">
            <button onclick="closeAnimalModal()" class="absolute top-4 right-4 text-2xl text-gray-400 hover:text-red-500">&times;</button>
            <div id="animalModalContent">
                <!-- JS  -->
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const animalDetails = {
        elephant: {
            name: 'Asian Elephant',
            img: '{{ asset('images/Asian-elephants.webp') }}',
            desc: 'The Asian Elephant is the largest land mammal in Sri Lanka. Udawalawe is famous for its large herds, while Yala also offers sightings, especially near water sources.'
        },
        leopard: {
            name: 'Sri Lankan Leopard',
            img: '{{ asset('images/Leopard-tree.jpeg') }}',
            desc: 'The Sri Lankan Leopard is an apex predator and a rare sight. Yala National Park is renowned for having one of the highest leopard densities in the world.'
        },
        deer: {
            name: 'Spotted Deer',
            img: '{{ asset('images/image 24.jpg') }}',
            desc: 'Spotted Deer, also known as Chital, are graceful and social animals found in large numbers in both Udawalawe and Yala.'
        },
        slothbear: {
            name: 'Sloth Bear',
            img: '{{ asset('images/Sloth Bear1.webp') }}',
            desc: 'Sloth Bears are nocturnal and shy, feeding mainly on termites and fruits. Both parks are home to this rare species.'
        },
        crocodile: {
            name: 'Mugger Crocodile',
            img: '{{ asset('images/crocodiles1.jpg') }}',
            desc: 'The Mugger Crocodile is often seen basking on riverbanks and is common in the lakes and rivers of both parks.'
        },
        peacock: {
            name: 'Peacock',
            img: '{{ asset('images/image 2.jpg') }}',
            desc: 'Peacocks are known for their vibrant plumage and courtship displays. They are a common sight in the open areas of both parks.'
        }
    };
    function showAnimalModal(key) {
        const animal = animalDetails[key];
        if (!animal) return;
        document.getElementById('animalModalContent').innerHTML = `
            <img src="${animal.img}" alt="${animal.name}" class="w-48 h-48 object-cover rounded-xl mx-auto mb-4 border-4 border-yellow-300">
            <h2 class="text-3xl font-bold text-center text-yellow-700 mb-2">${animal.name}</h2>
            <p class="text-gray-700 text-center text-lg">${animal.desc}</p>
        `;
        document.getElementById('animalModal').classList.remove('hidden');
    }
    function closeAnimalModal() {
        document.getElementById('animalModal').classList.add('hidden');
    }
</script>
@endsection
