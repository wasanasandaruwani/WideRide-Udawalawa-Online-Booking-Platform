@extends('layouts.app')
@section('title', 'Edit User')
@section('content')
<div class="container mx-auto py-12">
    <div class="bg-white rounded-xl shadow-lg p-8 max-w-lg mx-auto">
        <h1 class="text-2xl font-bold mb-6">Edit User</h1>
        <form method="POST" action="{{ route('admin.users.update', $user) }}">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label class="block font-semibold mb-1">Name</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded px-3 py-2">
            </div>
            <div class="mb-4">
                <label class="block font-semibold mb-1">Admin</label>
                <input type="checkbox" name="is_admin" value="1" {{ $user->is_admin ? 'checked' : '' }}> Is Admin
            </div>
            <button type="submit" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold px-6 py-2 rounded">Update</button>
        </form>
    </div>
</div>
@endsection
