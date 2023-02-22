<?php

namespace App\Models;

use App\Models\Products;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Products_Groups extends Model
{
    use HasFactory;
    protected $table = 'products_groups';
    protected $fillable = [
        'group_id',
        'product_id'
    ];
    public function rela_product_group()
    {
        return $this->belongsTo(Groups::class, 'group_id');
    }
    public function rela_group()
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
}
