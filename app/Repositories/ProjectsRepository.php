<?php
namespace App\Repositories;
use App\Project;
use Image;

class ProjectsRepository
{
    public function newProject($request){
        return $request->user()->projects()->create([
            'name' => $request->name,
            'thumbnail' =>$this->thumbnail($request)
        ]);
    }

    public function updateProject($request, $id){
        $project = Project::findOrFail($id);
        $project -> name = $request -> name;
        if($request->hasFile('thumbnail')) {
            $project->thumbnail = $this->thumbnail($request);
        }

        $project->save();
    }

    /**
     * @author：掌心位
     * @FUNCTION thumbnail 缩略图
     * @param $request
     * @return string
     */
    public function thumbnail($request){
        if($request->hasFile('thumbnail')){
            $file = $request->thumbnail;
            $name = str_random(10).'.jpg';
            $path = public_path().'/images/thumbnail/'.$name;
            Image::make($file)->resize(261,98)->encode('jpg')->save($path);
            return $name;
        }
    }
}