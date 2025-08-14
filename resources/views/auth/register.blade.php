<x-guest-layout>
    <div class="absolute inset-0 z-0" style="background: url('{{ asset('images/morning.jpg') }}') center center/cover no-repeat; opacity: 0.35;"></div>
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-10 relative z-10">
            <h1 class="text-3xl font-bold text-blue-600 mb-8 text-center">Create Your Account</h1>
            <form method="POST" action="{{ route('register') }}" id="registerForm" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="register-label block mb-2">Name</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="register-input w-full">
                    @error('name')
                        <div class="register-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="email" class="register-label block mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="register-input w-full">
                    @error('email')
                        <div class="register-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="register-label block mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password" class="register-input w-full">
                    @error('password')
                        <div class="register-error">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="register-label block mb-2">Confirm Password</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="register-input w-full">
                    @error('password_confirmation')
                        <div class="register-error">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="register-btn w-full py-3 text-lg">Register</button>
            </form>
            <div class="mt-6 text-center">
                <span class="text-gray-600">Already registered?</span>
                <a href="{{ route('login') }}" class="register-link ml-1">Login</a>
            </div>
            <a href="{{ route('bookings.create') }}" class="block w-full text-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg transition duration-300 mt-4">
                Book a Safari Now
            </a>
        </div>
    </div>
</x-guest-layout>

@section('title', 'Register')

@section('styles')
<style>
    body, .min-h-screen {
        background: linear-gradient(120deg, #fffbe6 0%, #e0ffe6 100%) !important;
    }
    .register-card {
        box-shadow: 0 8px 32px 0 rgba(255, 215, 0, 0.10), 0 1.5px 6px 0 rgba(0,0,0,0.08);
        border-radius: 1.5rem;
        border: 1.5px solid #ffe066;
        background: linear-gradient(120deg, #fff 80%, #f8fafc 100%);
        transition: box-shadow 0.2s, border 0.2s;
    }
    .register-card:hover {
        box-shadow: 0 12px 40px 0 rgba(255, 215, 0, 0.18), 0 2px 8px 0 rgba(0,0,0,0.10);
        border-color: #ffd700;
    }
    .register-title {
        background: linear-gradient(90deg, #ffe066 60%, #fffbe6 100%);
        color: #b8860b;
        border-radius: 1rem;
        padding: 0.5rem 0;
        margin-bottom: 2rem;
        font-size: 2.1rem;
        font-weight: 700;
        letter-spacing: 1px;
        box-shadow: 0 2px 8px 0 rgba(255,215,0,0.10);
    }
    .register-label {
        font-weight: 600;
        color: #b8860b;
        letter-spacing: 0.5px;
    }
    .register-input {
        border-radius: 0.75rem;
        border: 1.5px solid #ffe066;
        background: #fffbe6;
        color: #222;
        font-size: 1.08rem;
        padding: 0.7rem 1.2rem;
        transition: border 0.2s, box-shadow 0.2s;
    }
    .register-input:focus {
        outline: none;
        border-color: #ffd700;
        box-shadow: 0 2px 8px 0 rgba(255, 215, 0, 0.18);
        background: #fffde4;
    }
    .register-btn {
        background: linear-gradient(90deg, #ffe066 60%, #ffd700 100%);
        color: #222;
        font-weight: 700;
        font-size: 1.15rem;
        border-radius: 0.75rem;
        box-shadow: 0 2px 8px 0 rgba(255,215,0,0.10);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
    }
    .register-btn:hover {
        background: linear-gradient(90deg, #ffd700 60%, #ffe066 100%);
        color: #fff;
        box-shadow: 0 4px 16px 0 rgba(255,215,0,0.18);
    }
    .register-link {
        color: #b8860b;
        font-weight: 600;
        transition: color 0.2s;
    }
    .register-link:hover {
        color: #ffd700;
        text-decoration: underline;
    }
    .register-error {
        color: #e53e3e;
        font-size: 0.95rem;
        margin-top: 0.25rem;
    }
</style>
@endsection

@section('scripts')
<script>
// Animate the register form on submit
const form = document.getElementById('registerForm');
if(form) {
    form.addEventListener('submit', function(e) {
        form.classList.add('animate-pulse');
        setTimeout(() => form.classList.remove('animate-pulse'), 500);
    });
}
</script>
@endsection
