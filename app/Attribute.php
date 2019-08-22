<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $fillable = ['name' , 'attribute_groups_id'];

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
