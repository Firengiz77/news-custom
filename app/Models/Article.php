<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Article extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia;
    
    protected $fillable=[
        'title',
        'description',
        'author',
        'image'
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile()->acceptsMimeTypes(['image/png', 'image/jpg', 'image/jpeg']);
    }

    public function registerAllMediaConversions(): void
    {
        $this->addMediaConversion('preview')
            ->crop('crop-center', 248, 240);
    }
}
