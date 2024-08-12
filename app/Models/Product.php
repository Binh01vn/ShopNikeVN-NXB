<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'catalogue_id',
        'name',
        'slug',
        'sku',
        'img_thumbnail',
        'price_regular',
        'price_sale',
        'description',
        'content',
        'material',
        'user_manual',
        'views',
        'is_active',
        'is_hot_deal',
        'is_good_deal',
        'is_new_deal',
        'is_show_home',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'is_hot_deal' => 'boolean',
        'is_good_deal' => 'boolean',
        'is_new_deal' => 'boolean',
        'is_show_home' => 'boolean',
    ];

    public function catalogue(){
        // Product thuoc ve catalogue
        return $this->belongsTo(Catalogue::class);
    }

    public function tags(){
        // Product thuoc ve catalogue
        return $this->belongsToMany(Tag::class);
    }
    public function galleries(){
        // Product thuoc ve catalogue
        return $this->hasMany(ProductGallery::class);
    }
    public function variants(){
        // Product thuoc ve catalogue
        return $this->hasMany(ProductVariant::class);
    }
    public function productSizes(){
        return $this->hasMany(ProductSize::class);
    }
}
