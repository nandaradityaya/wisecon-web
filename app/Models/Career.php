<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Career extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        'slug',
        'category',
        'location',
    ];

    public function job_descriptions() {
        return $this->hasMany(JobDescription::class);
    }

    public function requirements() {
        return $this->hasMany(Requirement::class);
    }
}
