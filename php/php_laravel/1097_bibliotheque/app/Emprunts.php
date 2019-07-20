<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emprunts extends Model
{
    protected $fillable = [
        'abonnes_id', 'livres_id', 'date_sortie', 'date_rendu'
    ];

    //function idLivre() {
        //return $this->belongsTo('App\Livre');
    //}

    //function idAbonne() {
        //return $this->belongsTo('App\Abonne');
    //}

    public $timestamps = false;
}
