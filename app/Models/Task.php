<?php

namespace App\Models;

use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory, Notifiable;

    
    protected $guarded = [
        'id',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
