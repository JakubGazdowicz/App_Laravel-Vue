<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['lesson_id', 'name', 'content', 'correct_answer'];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }
}
