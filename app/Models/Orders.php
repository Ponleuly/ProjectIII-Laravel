<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'customer_id',
        'user_id',
    ];
    public function rela_customer_order()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
}
