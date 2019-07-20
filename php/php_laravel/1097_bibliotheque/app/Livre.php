<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [
        'auteur', 'titre'
    ];

    public $timestamps = false;
}
