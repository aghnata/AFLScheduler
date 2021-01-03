<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aflee extends Model
{
    public function AFLers()
    {
        return $this->belongsToMany('App\AFLer', 'schedules', 'aflee_id', 'afler_id');
    }
}
