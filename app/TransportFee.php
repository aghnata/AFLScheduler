<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransportFee extends Model
{
    public function schedule()
    {
        return $this->hasOne('App\Schedule');
    }
}
