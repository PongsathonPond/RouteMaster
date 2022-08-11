<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookingcake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'tel',
        'name_cake_admin',
        'date_end',
        'name_cake',
        'price',
        'slip_image',
        'status',
        
    ];
}



