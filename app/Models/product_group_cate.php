<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_group_cate extends Model
{
    use HasFactory;
    protected $table = 'product_group_cate';
    protected $fillable = [
        'category_id',
        'group_id'
    ];
}
