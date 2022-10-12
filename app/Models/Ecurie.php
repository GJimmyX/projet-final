<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ecurie extends Model
{
    use HasFactory;

    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'nom_ecurie',
        'points_ecurie',
    ];

    protected $guarded = [];

    public function pilotes()
    {
        return $this->hasMany(Pilote::class);
    }
}