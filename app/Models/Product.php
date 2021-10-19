<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $with = ['color', 'size', 'category', 'sub_category', 'info', 'sliders'];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }

    public function scopeSimilar($query, $id)
    {
        return $query->where('category_id', $id);
    }
    public function info()
    {
        return $this->hasOne(ProductInfo::class, 'product_id');
    }
    public function sliders()
    {
        return $this->hasMany(ProductSlider::class, 'product_id');
    }

    function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    function sub_category()
    {
        return $this->belongsTo(Category::class, 'sub_cat_id');
    }
    function color()
    {
        return $this->belongsTo(Color::class, 'color_id');
    }
    function size()
    {
        return $this->belongsTo(Size::class, 'size_id');
    }
}
