<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'title_ar',
        'title_en',
        'description_ar',
        'description_en',
    
    ];



    protected static function booted()
    {
        static::addGlobalScope('Service', function ($builder) {
            $builder->select('id', 'title_' . app()->getLocale(),'description_' . app()->getLocale() );
        });

    }
}
