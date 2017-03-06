@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="containerer col-md-4" >
            <canvas id="pieChart" width="300" height="300"></canvas>
            <div id="pie-data" data-todo={{ $toDoCount }} data-done={{ $doneCount }} data-total={{ $total }} ></div>
        </div>
        <div class="containerer col-md-4" >
            <canvas id="barChart" width="300" height="300"></canvas>
            <div id="bar-data" data-name={!! json_encode($names,JSON_UNESCAPED_UNICODE) !!} data-counts={!! json_encode(TasksCountArray($projects)) !!}></div>
        </div>
        <div class="containerer col-md-4" >
            <canvas id="radarChart" width="300" height="300"></canvas>
            {{--<div id="bar-data" data-name={!! json_encode($names,JSON_UNESCAPED_UNICODE) !!} data-counts={!! json_encode(TasksCountArray($projects)) !!}></div>--}}
        </div>
    </div>

@endsection

@section('customJS')
    <script src="{{ asset('js/chart.js') }}"></script>
    @include('tasks.radarChart')
@endsection