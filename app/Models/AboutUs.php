<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    use HasFactory;

    protected $table = 'about_us';

    protected $fillable = [
        'description_ar',
        'description_en',
        'car_per_month',
        'num_ksa_branches',
        'header_photo',
        'description_photo',
    ];

    protected static function booted()
    {
        static::addGlobalScope('selectAboutUsData', function ($builder) {
            $builder->select('id', 'description_' . app()->getLocale(), 'car_per_month', 'num_ksa_branches', 'header_photo', 'description_photo');
        });

    }

}
