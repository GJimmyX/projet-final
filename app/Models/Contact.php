<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'nom',
        'prenom',
        'adresse_mail',
        'telephone',
        'message',
    ];

    protected $guarded = [];
}
