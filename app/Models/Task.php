<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'task',
        'author',
        'number_of_tasks',
        'lastday'
    ];

    protected $casts = [
        'lastday' => 'date',
    ];
}
