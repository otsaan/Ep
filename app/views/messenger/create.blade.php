@extends('master')

@section('feed')
<h1>Create a new message</h1>
{{Form::open(['route' => 'messages.store'])}}
    <!-- Subject Form Input -->
    <div class="form-group">
        {{ Form::label('subject', 'Subject', ['class' => 'control-label']) }}
        {{ Form::text('subject', null, ['class' => 'form-control']) }}
    </div>

    <!-- Message Form Input -->
    <div class="form-group">
        {{ Form::label('message', 'Message', ['class' => 'control-label']) }}
        {{ Form::textarea('message', null, ['class' => 'form-control']) }}
    </div>

    @if($users->count() > 0)
    <div class="checkbox">
        <h4>Students / graduates</h4>
        @foreach($users as $user)
            <label title="{{$user->first_name}} {{$user->last_name}}"><input type="checkbox" name="recipients[]" value="{{$user->id}}">{{$user->first_name}}</label>
        @endforeach
    </div><div class="checkbox">
        <h4>professors</h4>
        @foreach($professors as $professor)
            <label title="{{$professor->first_name}} {{$professor->last_name}}"><input type="checkbox" name="recipients[]" value="{{$professor->id}}">{{$professor->first_name}}</label>
        @endforeach
    </div>
    @endif
    
    <!-- Submit Form Input -->
    <div class="form-group">
        {{ Form::submit('Submit', ['class' => 'btn btn-primary form-control']) }}
    </div>
{{Form::close()}}
@stop
