<?php
/**
 * Created by PhpStorm.
 * User: asher
 * Date: 2017/3/6
 * Time: 14:02
 */

function TasksCountArray($projects){
    $counts = array();
    foreach($projects as $project){
        $preCount = $project->tasks->count();
        array_push($counts,$preCount);
    }
    return $counts;
}

function randColor(){
    $R = rand(0,255);
    $G = rand(0,255);
    $B = rand(0,255);
    return 'rgba('.$R.','.$G.','.$B.',0.5)';
}