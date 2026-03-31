<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;

class Menu extends Model
{

    use HasTranslations;

    protected $fillable = [
        'title',
        'url',
        'sort',
        'status',
        'target',
        'position'
    ];

    public $translatable = ['title'];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', true);
    }

    public function scopeSorted(Builder $query): void
    {
        $query->orderBy('sort', 'asc');
    }

}
