<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'naziv_projekta', 'opis_projekta', 'cijena_projekta','obavljeni_poslovi','datum_pocetka','datum_zavrsetka','voditelj','ukljuceni'
    ];

}

