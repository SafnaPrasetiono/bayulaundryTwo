<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paymentMethod extends Model
{
    use HasFactory;

    protected $table = 'payment_methods';

    protected $primaryKey = 'payment_method_id';

    protected $fillable = [
        'name',
        'code',
        'type',
        'logo',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Scope untuk ambil hanya payment yang aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

}
