<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'assignee', 'category', 'due_date', 'priority', 'user_id'];

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'task_tags');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
