@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @if($projects)
            @foreach($projects as $project)
                    <div class="col-sm-6 col-md-3">
                        <div class="thumbnail">
                            <ul class="icon-bar">
                                <li>
                                    @include('projects/_deleteForm')
                                </li>
                                <li>
                                    @include('projects/_editForm')
                                </li>
                            </ul>
                            {{--<a href="projects/{{ $project -> id }}">--}}
                            <a href="{{ route('projects.show',$project -> name) }}">
                                    <img src="{{ asset('images/thumbnail/'.$project ->thumbnail) }}" alt="{{ $project ->name }}">
                                    {{--<img src="/images/thumbnail/{{ $project ->thumbnail ? $project ->thumbnail: 'default.jpg'}}" alt="{{ $project ->name }}">--}}
                                <div class="caption">
                                    <h4 class="text-center"> {{ $project ->name }}</h4>
                                </div>
                            </a>
                        </div>
                        @include('projects/_editFormModal')
                    </div>
                @endforeach
        @endif
        <div class="project-model col-sm-6 col-md-3">
            @include('projects/_createprojectModal')
        </div>
    </div>
</div>
@endsection
@section('customJS')
<script>
    $(document).ready(function () {
        $('.icon-bar').hide();
        $('.thumbnail').hover(function () {
            $(this).find('.icon-bar').toggle();
        })
    })
</script>
@endsection
