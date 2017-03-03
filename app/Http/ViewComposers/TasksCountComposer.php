<?php

namespace App\Http\ViewComposers;

use App\Repositories\TasksRepository;
use Illuminate\View\View;


class TasksCountComposer
{
    protected $tasks;
    function __construct(TasksRepository $tasks)
    {
        $this->task = $tasks;
    }

    public function compose(View $view)
    {
        $view -> with([
            'total' => $this->task->total(),
            'toDoCount' =>  $this->task->toDoCount(),
            'doneCount' =>  $this->task->doneCount(),
        ]);
    }
}