<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class SiteTranslation extends Model
{
    

    use HasTranslations;

    protected $fillable = [
        'category',
        'key',
        'value',
        'is_published',
    ];

    public $translatable = ['value'];

    public function scopeHomeTranslations(Builder $query): void
    {
        $query->where('category','home');
    }


}
