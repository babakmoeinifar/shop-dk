<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    public $timestamps = false;

    protected $fillable = ['begin_date', 'end_date', 'code', 'value', 'name', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
