<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_items extends Model
{
    use HasFactory;

    protected $table = 'orders_items';

    protected $primaryKey = 'order_item_id';

    protected $fillable = [
        'title',
        'description',
        'qty',
        'price',
        'discount_price',
        'discount',
        'weight',
        'images',
        'total',
        'order_id',
        'product_id',
        'note',
    ];
}
