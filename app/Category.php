<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    public function childs() {
        return $this->hasMany(__CLASS__,'parent_id','id') ;
    }

    public function groups()
    {
        return $this->hasOne(AttributeGroup::class);
    }
}
