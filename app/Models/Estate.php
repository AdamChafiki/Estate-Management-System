<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'user_id',
        'description',
        'location',
        'price',
        'property_type',
        'listing_type',
    ];

    /**
     * Get the images for the estate.
     */
    public function images()
    {
        return $this->hasMany(EstateImage::class);
    }
}
