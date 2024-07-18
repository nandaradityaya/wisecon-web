<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'icon',
        'excerpt',
        'body',
    ];

    public function key_features() {
        return $this->hasMany(KeyFeature::class);
    }

    public function our_approaches() {
        return $this->hasMany(OurApproach::class);
    }
}
