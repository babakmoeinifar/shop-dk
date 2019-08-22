<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeGroup extends Model
{
    public $timestamps = false;

    protected $fillable = ['attr_group_name', 'category_id'];

    public function attributes()
    {
        return $this->belongsTo(Attribute::class);
    }
}
