<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable =[
        'parent_id',
        'name',
        'is_active',
        'image',
        'slug',
        'meta_description',
        'meta_keywords',
        'meta_title'
    ];
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function childs() {
        return $this->hasMany(__CLASS__,'parent_id','id') ;
    }

    public function groups()
    {
        return $this->hasOne(AttributeGroup::class);
    }
}
