<x-guest-layout>
     
        <div class="absolute inset-0 z-0" style="background: url('{{ asset('images/23leopard.jpg') }}') center center/cover no-repeat; opacity: 0.35;"></div>
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-10 relative z-10">
            <h1 class="text-3xl font-bold text-yellow-600 mb-8 text-center">Login to Your Account</h1>
            @if (session('status'))
                <div class="mb-4 text-green-600 font-semibold text-center">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('login') }}" id="loginForm" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-semibold mb-2">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    @error('email')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-yellow-500 shadow-sm focus:ring-yellow-400">
                        <span class="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-sm text-yellow-600 hover:underline" href="{{ route('password.request') }}">Forgot password?</a>
                    @endif
                </div>
                <button type="submit" class="w-full py-3 bg-yellow-500 hover:bg-yellow-600 text-white font-bold rounded-lg shadow transition duration-300 text-lg">Log in</button>
            </form>
            <div class="mt-6 text-center">
                <span class="text-gray-600">Don't have an account?</span>
                <a href="{{ route('register') }}" class="text-yellow-600 hover:underline font-semibold ml-1">Register</a>
            </div>
        </div>

</x-guest-layout>

@section('title', 'Login')

@section('styles')
<style>
    #loginForm input:focus {
        box-shadow: 0 0 0 2px #fbbf24;
        transition: box-shadow 0.2s;
    }
</style>
@endsection

@section('scripts')
<script>
// Animate the login form on submit
const form = document.getElementById('loginForm');
if(form) {
    form.addEventListener('submit', function(e) {
        form.classList.add('animate-pulse');
        setTimeout(() => form.classList.remove('animate-pulse'), 500);
    });
}
</script>
@endsection
