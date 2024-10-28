<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['project_id', 'title', 'status', 'due_date'];

    // Relasi many-to-one dengan Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
