<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catalogue extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cover',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // quan hệ 1-n
    public function products(){
        return $this->hasMany(Product::class);
    }

    // Quan hệ 1-1
    public function product(){
        return $this->hasOne(Product::class);
    }
}
