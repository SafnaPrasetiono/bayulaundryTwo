<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $primaryKey = 'order_id';

    protected $fillable = [
        'invoice',
        'username',
        'email',
        'amount',
        'weight',
        'order_date',
        'order_time',
        'type',
        'status',
        'payment_method',
        'note',
        'user_id',
    ];

    public function items()
    {
        return $this->hasMany(orders_items::class, 'order_id');
    }

     public function scopeSearch($query, $param)
    {
        $param = "%" . $param . "%";

        return $query->where(function ($q) use ($param) {
            $q->where('invoice', 'like', $param)
                ->orWhere('username', 'like', $param)
                ->orWhere('email', 'like', $param)
                ->orWhere('created_at', 'like', $param);
        });
    }
}
