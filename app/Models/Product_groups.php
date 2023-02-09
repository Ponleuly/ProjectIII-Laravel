<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_groups extends Model
{
    use HasFactory;
    protected $table = 'product_groups';
    protected $fillable = ['group_name'];
}
