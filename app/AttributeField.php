<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeField extends Model
{
    public $timestamps = false;

    protected $fillable = ['attr_field_name', 'attribute_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
