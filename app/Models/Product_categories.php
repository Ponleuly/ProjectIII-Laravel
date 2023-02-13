<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_categories extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable = ['category_name'];
    public function product_cate()
    {
        return $this->hasMany(Product_details::class, 'id');
    }
}
