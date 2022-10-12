<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'image_photo',
        'titre_photo',
        'desc_photo',
    ];

    protected $guarded = [];
}
