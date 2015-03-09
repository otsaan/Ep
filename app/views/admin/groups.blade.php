@extends('master')

@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
@stop

@section('feed')
@include('flash::message')

{{Form::open(['method'=>'get'])}}
<div class="">
    <div class="form-group">
        {{ Form::text('q',null,['class'=>'form-control','placeholder'=>'Search']) }}
    </div>
    {{ Form::Submit('Recherche',['class'=>'btn bg-olive btn-block']) }}
{{Form::close()}}
<table class="table">
    <td>Nom</td>
    <td>Date de création</td>
    <td>Type</td>
    <td>Action</td>
    @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->created_at }}</td>
            <td>{{ $group->public? "Public": "Private" }}</td>
            <td><a href="/admin/groups/{{$group->id}}/delete " class="btn btn-default" onclick="return myConfirm()">Supp</a></td>
        </tr>


    @endforeach
</table>
{{  $groups->appends(Request::except("page"))->links()}}
@stop

@section('bottom-script')
{{ HTML::script('js/semantic.min.js') }}
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js') }}
{{ HTML::script('js/channels.js') }}

@stop
<script>
    function myConfirm()
    {
        var r = confirm("Vous êtes sure ?")
        if(r == false)
        {
           return false;
        }

    }
</script>
