@extends('layouts.app')

@section('title', 'Contact Messages')

@section('content')
<div class="container mx-auto py-10">
    <h1 class="text-3xl font-bold mb-8">Contact Messages</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($messages as $msg)
            <div class="bg-white rounded-xl shadow-lg p-6 flex flex-col gap-2 border-l-4 border-yellow-400 hover:shadow-2xl transition">
                <div class="flex items-center gap-3 mb-2">
                    <div class="bg-yellow-100 text-yellow-700 rounded-full px-3 py-1 text-xs font-bold">#{{ $msg->id }}</div>
                    <span class="font-semibold text-lg text-gray-800">{{ $msg->name }}</span>
                </div>
                <div class="text-gray-500 text-sm mb-1"><span class="font-semibold">Email:</span> {{ $msg->email }}</div>
                <div class="text-gray-700 mb-2"><span class="font-semibold">Message:</span><br>{{ $msg->message }}</div>
                <div class="text-right text-xs text-gray-400 mt-auto">Received: {{ $msg->created_at->format('Y-m-d H:i') }}</div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500 py-12">No contact messages found.</div>
        @endforelse
    </div>
    <div class="mt-8 flex justify-center">
        {{ $messages->links() }}
    </div>
</div>
@endsection
