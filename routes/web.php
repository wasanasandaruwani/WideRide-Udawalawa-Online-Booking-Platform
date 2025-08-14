<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JeepController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\SafariPackage;
use App\Models\Jeep;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
// Auth::routes(); // Removed to prevent missing controller errors. Use routes/auth.php for authentication.

// Jeep Routes
Route::resource('jeeps', JeepController::class);

// Booking Routes
Route::middleware('auth')->group(function () {
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::get('/bookings/{booking}/payment', [BookingController::class, 'payment'])->name('bookings.payment');
    Route::post('/bookings/{booking}/stripe-checkout', [BookingController::class, 'stripeCheckout'])->name('bookings.stripe.checkout');
    Route::get('/bookings/{booking}/pay', [PaymentController::class, 'create'])->name('payments.create');
    Route::post('/bookings/{booking}/pay', [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/bookings/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

    Route::get('/dashboard', function () {
        $user = Auth::user();
        $bookings = Booking::with('safariPackage')->where('user_id', $user->id)->get();
        $payments = Payment::whereIn('booking_id', $bookings->pluck('id'))->get();
        $safariPackages = SafariPackage::all();
        $jeeps = Jeep::all();
        return view('dashboard', compact('user', 'bookings', 'payments', 'safariPackages', 'jeeps'));
    })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/safari', function () {
    return view('safari');
})->name('safari');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');
Route::post('/contact', [\App\Http\Controllers\ContactMessageController::class, 'store'])->name('contact.submit');

Route::get('/animals', function () {
    return view('animals');
})->name('animals');

Route::get('/places', function () {
    return view('places');
})->name('places');

Route::get('/hotels', function () {
    return view('hotels');
})->name('hotels');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/jeeps', [AdminController::class, 'jeeps'])->name('admin.jeeps');
    Route::get('/admin/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/admin/payments', [AdminController::class, 'paymentsTable'])->name('admin.payments');
    Route::get('/admin/contact-messages', [AdminController::class, 'contactMessages'])->name('admin.contact-messages');

    // User CRUD
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'editUser'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [AdminController::class, 'updateUser'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.users.destroy');

    // Jeep CRUD
    Route::get('/admin/jeeps/{jeep}/edit', [AdminController::class, 'editJeep'])->name('admin.jeeps.edit');
    Route::put('/admin/jeeps/{jeep}', [AdminController::class, 'updateJeep'])->name('admin.jeeps.update');
    Route::delete('/admin/jeeps/{jeep}', [AdminController::class, 'destroyJeep'])->name('admin.jeeps.destroy');

    // Booking CRUD
    Route::get('/admin/bookings/{booking}/edit', [AdminController::class, 'editBooking'])->name('admin.bookings.edit');
    Route::put('/admin/bookings/{booking}', [AdminController::class, 'updateBooking'])->name('admin.bookings.update');
    Route::delete('/admin/bookings/{booking}', [AdminController::class, 'destroyBooking'])->name('admin.bookings.destroy');

    // Payment CRUD
    Route::get('/admin/payments/{payment}/edit', [AdminController::class, 'editPayment'])->name('admin.payments.edit');
    Route::put('/admin/payments/{payment}', [AdminController::class, 'updatePayment'])->name('admin.payments.update');
    Route::delete('/admin/payments/{payment}', [AdminController::class, 'destroyPayment'])->name('admin.payments.destroy');
});