<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Afler extends Model
{
    public function AFLees()
    {
        return $this->belongsToMany('App\AFLee', 'schedules', 'afler_id', 'aflee_id');
    }
}
