<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_group_cate extends Model
{
    use HasFactory;
    protected $table = 'product_group_cate';
    protected $fillable = [
        'category_id',
        'group_id'
    ];
    public function group_cate()
    {
        return $this->belongsTo(Product_groups::class, 'group_id');
    }
    public function product_group()
    {
        return $this->hasMany(Product_details::class, 'id');
    }
}
