<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public function deposits()
    {
        return $this->hasMany('App\Deposit');
    }
    public function withdraws()
    {
        return $this->hasMany('App\Withdraw');
    }
}
