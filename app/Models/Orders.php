<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'invoice_code',
        'customer_id',
        'user_id',
        'order_status',

    ];
    public function rela_customer_order()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
    public function rela_order_status()
    {
        return $this->belongsTo(Orders_Statuses::class, 'order_status');
    }
}
