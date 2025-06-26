<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipments extends Model
{
    use HasFactory;

    protected $table = 'shipments';

    protected $primaryKey = 'shipment_id';

    protected $fillable = [
        'order_id',
        'recipient_name',
        'recipient_phone',
        'address_line',
        'province',
        'regencies',
        'districts',
        'villages',
        'postal_code',
        'tracking_number',
        'courier',
        'status',
        'shipped_at',
        'delivered_at',
        'notes',
    ];

    protected $dates = [
        'shipped_at',
        'delivered_at',
    ];
}
