<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders_Statuses extends Model
{
    use HasFactory;
    protected $table = 'orders_statuses';
    protected $fillable = [
        'status',
    ];
}
