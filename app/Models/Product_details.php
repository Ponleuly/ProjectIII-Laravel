<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_details extends Model
{
    use HasFactory;
    protected $table = 'product_details';
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
    public function pro_img()
    {
        return $this->hasMany(Product_images::class, 'product_id', 'id');
    }
    public function product_cate()
    {
        return $this->belongsTo(Product_categories::class, 'category_id', 'id');
    }
    public function product_col()
    {
        return $this->belongsTo(Product_categories::class, 'color_id', 'id');
    }
    public function product_group()
    {
        return $this->belongsTo(Product_groups::class, 'group_id', 'id');
    }
}
