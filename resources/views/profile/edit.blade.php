@extends('layouts.app')
@section('title', 'Profile')
@section('styles')
    <style>
        body {
            background: linear-gradient(135deg, #fef9c3 0%, #d1fae5 100%);
            min-height: 100vh;
        }
        .profile-section {
            background: #fffbe6;
            border-radius: 1rem;
            box-shadow: 0 2px 16px 0 rgba(251, 191, 36, 0.10);
            padding: 2rem;
        }
        .profile-section h2 {
            color: #b45309;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .profile-section input, .profile-section button {
            border-radius: 0.5rem;
        }
        .profile-section button {
            background: #fbbf24;
            color: #fff;
            font-weight: 600;
            transition: background 0.2s, transform 0.2s;
        }
        .profile-section button:hover {
            background: #f59e42;
            transform: scale(1.04);
        }
    </style>
@endsection
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg profile-section">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg profile-section">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg profile-section">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        // Example: Auto-hide success messages after 2 seconds
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[x-data] p.text-sm.text-gray-600').forEach(function(el) {
                setTimeout(function() {
                    el.style.display = 'none';
                }, 2000);
            });
        });
    </script>
@endsection
