<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Abonne extends Model
{
    protected $fillable = [
        'prenom',
    ];

    public $timestamps = false;
}
