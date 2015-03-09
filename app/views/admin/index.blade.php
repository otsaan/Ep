@extends('master')

@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
@stop

@section('feed')
@include('flash::message')

	<h2>Administration</h2>
    <div>
        <a href="/admin/users"><div class="ui teal icon button">Administration des utilisateurs</div></a>
        <a href="/admin/groups"><div class="ui teal icon button">Administration des groupes</div></a>
		<div class="ui teal icon button">Statistiques</div>
    </div>
@stop

@section('bottom-script')
{{ HTML::script('js/semantic.min.js') }}
{{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.5/angular.min.js') }}
{{ HTML::script('js/channels.js') }}

@stop
