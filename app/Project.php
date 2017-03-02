<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Task;

class Project extends Model
{
    protected $fillable = [
      'name','thumbnail'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tasks(){
        return $this->hasMany(Task::class);
    }
}
