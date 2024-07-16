<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobDescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'job_desc',
        'career_id',
    ];

    public function career() {
        return $this->belongsTo(Career::class);
    }
}
