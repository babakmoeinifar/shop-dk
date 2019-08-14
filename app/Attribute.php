<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function attributegroups()
    {
        return $this->hasMany(AttributeGroup::class);
    }
}
