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
        'product_imgcover',
        'product_price',
        'product_saleprice',
        'product_stock',
        'color_id',
        'size_id',
        'category_id',
        'group_id',
    ];
}
