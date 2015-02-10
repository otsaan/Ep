@extends('master')

@section('feed')

<h3>Dernières discussions<a href="/messages/create" class="btn btn-primary pull-right">Nouvelle discussion</a></h3>
<br>
@if (Session::has('error_message'))
<div class="alert alert-danger" role="alert">
    {{Session::get('error_message')}}
</div>
@endif
@if($threads->count() > 0)
@foreach($threads as $thread)
<?php $class = $thread->isUnread($currentUserId) ? 'alert-info' : ''; ?>
<div class="panel panel-default {{$class}}">
    <div class="panel-heading">{{link_to('messages/' . $thread->id, $thread->subject)}}</div>
    <div class="panel-body">
        <label>Dernier message: <br></label>{{$thread->latestMessage()->body}}
    </div>
</div>


@endforeach


@else
<p>Sorry, no threads.</p>
@endif
{{ $threads->links()  }}
@stop




