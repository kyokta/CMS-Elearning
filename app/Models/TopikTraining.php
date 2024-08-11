<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Divisi;
use App\Models\Course;

class TopikTraining extends Model
{
    use HasFactory;

    protected $table = 'topik_trainings';

    protected $fillable = [
        'cover',
        'title',
        'divisi_id'
    ];

    public function divisi()
    {
        return $this->BelongsTo(Divisi::class, 'divisi_id');
    }

    public function courses()
    {
        return $this->hasMany(Course::class, 'topik_id');
    }
}