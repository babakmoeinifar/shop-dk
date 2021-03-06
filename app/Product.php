<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_name', 'pro_category_id', 'code', 'country',
        'price', 'stock', 'desc', 'unit',
        'pro_image', 'meta_keywords'
    ];

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class);
    }

    public function attributefields()
    {
        return $this->belongsToMany(AttributeField::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizes()
    {
        return $this->belongsToMany(size::class);
    }

    public function getDiscount($id)
    {
        $coupons = $this->coupons()->where('product_id', $id)->get();
        foreach ($coupons as $coupon) {
            return $coupon->name;
        }
    }

}
