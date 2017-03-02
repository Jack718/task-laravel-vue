<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Project;
use App\Task;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projects(){
        return $this->hasMany(Project::class);
    }

    public function tasks(){
        return $this->hasManyThrough(Task::class,Project::class);
    }
}
