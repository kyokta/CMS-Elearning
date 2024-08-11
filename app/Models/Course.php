<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'topik_id',
        'cover',
        'title',
        'description',
        'mentor',
        'student'
    ];

    public function topikTraining()
    {
        return $this->belongsTo(TopikTraining::class, 'topik_id');
    }
}