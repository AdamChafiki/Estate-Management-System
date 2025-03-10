<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstateImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'estate_id',
        'image_path',
    ];

    /**
     * Get the estate that owns the image.
     */
    public function estate()
    {
        return $this->belongsTo(EstateImage::class);
    }
}
