<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $guarded = array();

    public function member()
    {
        return $this->belongsTo('App\Member');
    }

    protected $fillable = [];
}
// $deposit = Deposit::create(['member_id'=>1,'name'=>'Enamul Hasan','deposit'=>50,'previous_deposit'=>10,'date'=>'2020-08-06 00:00:00','created_at'=>'2020-08-06 16:48:29','updated_at'=>'2020-08-06 16:48:29']);
