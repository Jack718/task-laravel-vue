@extends('layouts.app')
@section('customHeader')
    <meta name="token" id="token" content="{{ csrf_token() }}">
    <link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.css" rel="stylesheet">
@endsection
@section('content')
    <div id="app" class="container">
        <h1 class="text-muted">{{ $task->title }}</h1>
        <step-list  :steps="steps"  @toggle="toggleCompletion" @remove="removeStep" @new="addStep"
                    @complete="completeAll" type="remaings"></step-list>
        <step-list  :steps="steps"  @toggle="toggleCompletion" @remove="removeStep" @new="addStep"
                    @clear="clearCompleted" type="completed"></step-list>
        {{--<pre>@{{ $data }}</pre>--}}
    </div>
@endsection
@section('customJS')
    <script src="{{ asset('js/step.js') }}"></script>
@endsection
