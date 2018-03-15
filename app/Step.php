<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Task;

class Step extends Model
{
    protected $fillable = [
        'name' , 'completed'
    ];

    public function task()
    {
        return $this->belongsTo(Task::class);
    }

    public function getCompletedAttribute($value)
    {
        if ($value){
            return $this->completed = true;
        }
        return $this->completed = false;
    }
}
