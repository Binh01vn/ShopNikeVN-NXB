<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhuyenMai extends Model
{
    use HasFactory;

    protected $fillable = [
        'enscription',
        'maKM',
        'price_sale',
        'giaPT',
        'soluong',
        'is_active',
    ];
}
