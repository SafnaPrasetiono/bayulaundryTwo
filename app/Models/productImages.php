<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class productImages extends Model
{
    use HasFactory;

    protected $table = 'product_images';

    protected $primaryKey = 'product_image_id';

    protected $forigenKey = 'product_id';
    
     // Mass assignable attributes
    protected $fillable = [
        'filename',
        'path',
        'extension',
        'size',
        'is_main',
        'product_id',
    ];

}
