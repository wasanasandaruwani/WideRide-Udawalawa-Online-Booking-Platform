<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SafariPackage extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'features', 'image'
    ];
}
