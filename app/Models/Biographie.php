<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biographie extends Model
{
    use HasFactory;

    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'nom_prenom_pilote',
        'background_image',
        'image_biographie',
        'texte_biographie',
        'date_naissance',
        'date_deces',
        'carriere',
        'reseaux',
    ];

    protected $guarded = [];
}
