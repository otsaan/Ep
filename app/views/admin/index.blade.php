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
    <td>Prenom</td>
    <td>Username</td>
    <td>Type</td>
    <td>Date de création</td>
    <td>Action</td>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->created_at }}</td>
            <td>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        {{$user->is_type}}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/Type/{{$user->id}}/Student" onclick="return myConfirm()">Etudiant</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/Type/{{$user->id}}/Professor" onclick="return myConfirm()">Professeur</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/Type/{{$user->id}}/Graduate" onclick="return myConfirm()">Lauréat</a></li>
                        <li role="presentation"><a role="menuitem" tabindex="-1" href="/Type/{{$user->id}}/Admin" onclick="return myConfirm()">Admin</a></li>
                </div>
            </td>
            <td><a href="/admin/{{$user->id}}/delete " class="btn btn-default" onclick="return myConfirm()">Supp</a></td>
        </tr>


    @endforeach
</table>
{{  $users->appends(Request::except("page"))->links()}}
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
