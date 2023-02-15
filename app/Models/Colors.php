<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colors extends Model
{
    use HasFactory;
    protected $table = 'colors';
    protected $fillable = ['color_name'];
    public function rela_product_color()
    {
        return $this->hasMany(Products_Colors::class, 'color_id', 'id'); // ('Model', 'foreign_key', 'local_key');
    }
}
