@if($errors->has('name'))
    <ul class="alert alert-danger">
        @foreach($errors -> get('name') as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
{!! Form::open(['route' => ['tasks.store','project' => $project->id],'class'=>'form-inline']) !!}
    <td class="first-cell">
        {!! Form::text('name',null,['placeholder' => '有什么任务要完成么？','class' => 'form-control']) !!}
        {{--{!! Form::hidden('project',$project->id) !!}--}}
    </td>
    <td class="icon-cell">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-btn fa-plus"></i>
        </button>
    </td>
{!! Form::close() !!}