<?php

namespace App\Models;
use App\Models\Workshop;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    public function workshops(){
        return $this->hasMany(Workshop::class);
    }
   
    public function pendingWorkShops(){
        $date = date('Y-m-d');
        return $this->hasMany(Workshop::class)->whereRaw("date(start) > '$date'")->orderBy('id','asc');
    }
}
