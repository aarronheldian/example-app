<?php

namespace App\Models;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory, Notifiable;

    protected $guarded = [
        'id',
    ];

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
