<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SubindexCity extends Model
{
    public function City()
    {
        return $this->hasMany('App\City', 'id', 'id_city');
    }
    public function SubIndex()
    {
        return $this->hasMany('App\Sube', 'id', 'id_subindex');
    }
}
