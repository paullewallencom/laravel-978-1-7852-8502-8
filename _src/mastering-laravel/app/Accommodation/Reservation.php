<?php

namespace MyCompany\Accommodation;

use Illuminate\Database\Eloquent;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['date_start', 'date_end'];
    public function rooms(){
        return $this->belongsToMany('MyCompany\Accommodation\Room')->withTimestamps();
    }


}
