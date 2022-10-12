<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pilote extends Model
{
    use HasFactory;

    /**
     * Les attributs qui seront attribués
     *  
     * @var array
     */
    protected $fillable = [
        'role_pilote',
        'nom_pilote',
        'nationalite',
        'num_points',
        'drapeau',
        'img_ecurie',
        'ecurie_id',
    ];

    protected $guarded = [];

    public function ecurie()
    {
        return $this->belongsTo(Ecurie::class);
    }
}