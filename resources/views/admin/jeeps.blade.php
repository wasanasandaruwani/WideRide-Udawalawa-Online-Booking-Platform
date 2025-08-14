@extends('layouts.app')
@section('title', 'Manage Jeeps')
@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8">
        <h1 class="text-3xl font-bold mb-6">Manage Jeeps</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Description</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Seats</th>
                </tr>
            </thead>
            <tbody>
                @foreach($jeeps as $jeep)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $jeep->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->description }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->price }}</td>
                    <td class="py-2 px-4 border-b">{{ $jeep->seats }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
