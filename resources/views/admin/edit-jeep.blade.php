@extends('layouts.app')
@section('title', 'Edit Jeep')
@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit Jeep</h1>
        <form method="POST" action="{{ route('admin.jeeps.update', $jeep) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $jeep->name) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2">{{ old('description', $jeep->description) }}</textarea>
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Price</label>
                <input type="number" name="price" value="{{ old('price', $jeep->price) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Seats</label>
                <input type="number" name="seats" value="{{ old('seats', $jeep->seats) }}" class="w-full border rounded px-3 py-2">
            </div>
            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-2 rounded">Update</button>
        </form>
    </div>
</div>
@endsection
