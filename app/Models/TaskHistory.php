<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskHistory extends Model
{
    use HasFactory;

    protected $table = 'task_history';

    protected $fillable = [
        'task_id',
        'user_id',
        'name',
        'description',
        'priority',
        'status',
        'due_date',
        'add_to_google_calendar',
        'changed_at',
    ];

    public $timestamps = false;

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
