<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

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
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }
    public function getSlug(): string
    {
        return Str::slug($this->title);
    }
}
