<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'product_name',
        'product_code',
        'product_des',
        'product_imgcover',
        'product_price',
        'product_saleprice',
        'product_color',
        'category_id',
        'group_id',
    ];
    public function pro_img()
    {
        return $this->hasMany(Product_images::class, 'product_id', 'id');
    }
    public function rela_product_category()
    {
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }
    public function rela_product_group()
    {
        return $this->belongsTo(Groups::class, 'group_id', 'id');
    }

    public function rela_product_size()
    {
        return $this->hasMany(Products_Sizes::class, 'product_id', 'id'); // ('Model', 'foreign_key', 'local_key');
    }
}
