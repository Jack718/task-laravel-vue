@extends('layouts.app')
@section('customHeader')
    <meta name="token" id="token" content="{{ csrf_token() }}">
@endsection
@section('content')
    <div id="app" class="container">
        <h1 class="texy-mutd"> {{ $task->title }}</h1>
        <h2 v-if="remaings.length ">
            待完成的步骤(@{{ remaings.length }})
            <span class="btn btn-sm btn-info" @click="completeAll">完成所有</span>
        </h2>
        <ul class="list-group" >
            <li class="list-group-item" v-for="step in steps | inProcess">
                <span @dblclick="editStep(step)">
                    @{{ step.name }}
                </span>
                <span class="pull-right">
                    <i class="fa fa-check" @click="toggleCompletion(step)"></i>
                    <i class="fa fa-close" @click="removeStep(step)"></i>
                </span>
            </li>
        </ul>
        <form action="" @submit.prevent="addStep" class="form-inline form-inline-fullwidth">
            <div class="form-group col-md-8">
                <label v-if="!newStep">完成该任务（Task）需要哪些步骤（Step）？</label>
                <input type="text" v-model="newStep" v-el:new-step class="form-control" placeholder="i need to...">
            </div>
            <div class="form-group col-md-4">
                <button type="submit" class="btn btn-primary">添加步骤</button>
            </div>
        </form>
        <h2 v-if="completetions.length">
            已完成的步骤(@{{ completetions.length }})
            <span class="btn btn-sm btn-danger" @click="clearCompleted">清除所有已完成</span>
        </h2>
        <ul class="list-group" >
            <li class="list-group-item" v-for="step in steps | filterBy true in 'completed'">
                @{{ step.name }}
                <span class="pull-right">
                    <i class="fa fa-check" @click="toggleCompletion(step)"></i>
                    <i class="fa fa-close" @click="removeStep(step)"></i>
                </span>
            </li>
        </ul>

        <pre>@{{ $data| json }}</pre>
    </div>
@endsection
@section('customJS')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue-resource@1.5.0"></script>
    <script>
       
    </script>
@endsection
