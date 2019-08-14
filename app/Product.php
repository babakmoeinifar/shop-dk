<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function attributes()
    {
        return $this->belongsToMany(Attribute::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class);
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
        return $this->hasOne(Category::class);
    }

    public function coupons()
    {
        return $this->hasMany(Coupon::class);
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
