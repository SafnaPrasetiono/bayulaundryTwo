<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contentBanners extends Model
{
   use HasFactory;

    protected $table = 'content_banners';

    protected $primaryKey = 'banners_id';

    protected $fillable = [
        'title',
        'description',
        'linked',
        'linkedText',
        'imagesPath',
        'imagesDesktop',
        'imagesMobile',
        'textPosition',
        'textColor',
    ];
}
