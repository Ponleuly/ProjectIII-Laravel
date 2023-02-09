<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_details extends Model
{
    use HasFactory;
    protected $table = 'product_detail';
    protected $fillable = [
        'product_name',
        'product_des',
        'product_img',
        'product_price',
        'product_stock',
        'color_id',
        'size_id',
        'category_id',
        'type_id',
    ];
}
