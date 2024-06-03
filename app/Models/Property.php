<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'surface',
        'address',
        'rooms',
        'bedrooms',
        'floor',
        'city',
        'postal_code',
        'description',
        'price',
        'sold'
        
    ] ;
}
