<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    public function member()
    {
        return $this->belongsTo('App\Member');
    }
}
