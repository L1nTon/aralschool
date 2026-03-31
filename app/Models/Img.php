<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Img extends Model
{
    protected $fillable =[
        "key","src","alt", "status"
    ];

    public function scopeActive(Builder $query): void
    {
        $query->where('status', true);
    }

    public static function getMappedActive()
    {
        return self::active()
            ->get(['key', 'src', 'alt'])
            ->keyBy('key')
            ->map(function ($item) {
                return [
                    'src' => $item->src,
                    'alt' => $item->alt,
                ];
            });
    }

}
