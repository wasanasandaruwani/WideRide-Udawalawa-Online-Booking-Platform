<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PaymentApiController;

Route::post('/payment/success', [PaymentApiController::class, 'success']);
