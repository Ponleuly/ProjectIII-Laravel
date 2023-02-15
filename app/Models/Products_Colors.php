<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products_Colors extends Model
{
    use HasFactory;
    protected $table = 'products_colors';
    protected $fillable = [
        'product_id',
        'color_id',
        'color_quantity',
    ];
    public function rela_product_color()
    {
        return $this->belongsTo(Colors::class, 'color_id'); //(Model, 'foreign_key', '[owner_key]') --owner_key not neccessary if using id as default primary key
    }
}
