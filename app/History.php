<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class History extends Model
{
    public function getCommandAtAttribute($value){
        return Carbon::createFromFormat('Y-m-d H:i:s', $value)->format('d/m/Y H:i:s');
    }

    public function customer(){
        return $this->belongsTo('App\Customer');
    }
    public function product(){
        return $this->belongsTo('App\Product');
    }
}
