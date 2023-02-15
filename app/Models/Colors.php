<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = ['color_name'];
    public function product_col()
    {
        return $this->hasOne(Product_details::class, 'id');
    }
}
