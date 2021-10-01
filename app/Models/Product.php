<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function info()
    {
        return $this->hasOne(ProductInfo::class, 'product_id');
    }
    public function sliders()
    {
        return $this->hasMany(ProductSlider::class, 'product_id');
    }
}
