<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeField extends Model
{
    public $timestamps = false;

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
