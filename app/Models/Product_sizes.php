<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_sizes extends Model
{
    use HasFactory;
    protected $table = 'product_sizes';
    protected $fillable = ['size'];
}
