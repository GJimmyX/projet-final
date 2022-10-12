<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    
    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'titre',
        'date',
        'contenu',
        'image',
    ];

    protected $guarded = [];
}
