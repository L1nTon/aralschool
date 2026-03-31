<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = [
        'category',
        'section_id',
        'status',
        'sort',
    ];

    public static function getActiveIds(): array
    {
        return self::where('status', true)->pluck('section_id')->toArray();
    }
    
}
