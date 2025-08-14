<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SafariPackage;

class Booking extends Model
{
    protected $casts = [
        'add_ons' => 'array',
    ];

    protected $fillable = [
        'user_id', 'safari_package_id', 'booking_date', 'time_slot', 'num_people', 'total_price', 'status', 'add_ons', 'promo_code', 'discount', 'special_requests'
    ];

    public function safariPackage()
    {
        return $this->belongsTo(SafariPackage::class, 'safari_package_id');
    }
    
    public function payments()
    {
        return $this->hasMany(\App\Models\Payment::class);
    }
}
