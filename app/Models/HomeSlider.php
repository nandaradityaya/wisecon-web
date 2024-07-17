<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'img_slider',
        'badge_text',
        'title',
        'sub_title',
    ];
}
