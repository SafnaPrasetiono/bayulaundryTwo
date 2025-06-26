<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'title',
        'slug',
        'price',
        'stock',
        'weight',
        'description',
        'description_short',

        'discount',
        'discount_price',
        'discount_expired',

        'type',
        'is_active',
        'images',
    ];

    protected $casts = [
        'description_list' => 'array',
    ];

    public function scopeSearch($query, $param)
    {
        $param = "%" . $param . "%";

        return $query->where(function ($q) use ($param) {
            $q->where('title', 'like', $param)
                ->orWhere('is_active', 'like', $param)
                ->orWhere('created_at', 'like', $param);
        });
    }

    public function imagesMultiple()
    {
        return $this->hasMany(productImages::class, 'product_id');
    }
}
