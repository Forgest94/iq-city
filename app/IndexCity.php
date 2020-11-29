<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class IndexCity extends Model
{
    public function Index()
    {
        return $this->hasMany('App\Inde', 'id', 'id_index');
    }
}
