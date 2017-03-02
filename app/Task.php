<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Project;

class Task extends Model
{
    protected $fillable=[
      'title','project_id','completed'
    ];

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function getProjectListAttribute(){
        return $this -> project -> id;
    }
}
