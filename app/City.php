<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public $timestamps = false;

    public function state() {
        return $this->belongsTo(__CLASS__,'parent_id','id') ;
    }
}