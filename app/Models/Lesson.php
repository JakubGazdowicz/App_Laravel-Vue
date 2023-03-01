<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'description', 'image', 'pdf_url'];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
