<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    
    protected $primaryKey = 'payment_id';

    protected $fillable = [
        'invoice',
        'email',
        'username',
        'amount',
        'date',
        'time',
        'user_id',
        'order_id',
    ];

    // ========== 🔗 Relasi ==========
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order()
    {
        return $this->belongsTo(orders::class, 'order_id');
    }
}
