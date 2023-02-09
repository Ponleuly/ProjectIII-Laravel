<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_colors extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = ['color_name'];
}
