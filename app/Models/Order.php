<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id',
        'customer_name',
        'email',
        'phone',
        'address',
        'price',
        'status',
        'payment_method',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}


