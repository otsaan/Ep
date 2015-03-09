@extends('master')

@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
@stop

@section('feed')
@include('flash::message')

{{Form::open(['method'=>'get'])}}
<div class="">
    <div class="form-group">
        {{ Form::text('q',null,['class'=>'form-control','placeholder'=>'Rechercher un utilisateur par nom, prenom ou username', 'style'=>'width:500px;float:left;']) }}
        {{ Form::Submit('Recherche',['class'=>'btn bg-olive btn-block','style'=>'margin-left:20px;width:200px;float:left;']) }}
    </div>
{{Form::close()}}
    <br/><br/><br/>

<table class="table">
    <td><b>Nom</b></td>
    <td><b>Date de création</b></td>
    <td><b>Type</b></td>
    <td><b>Action</b></td>
    @foreach($groups as $group)
        <tr>
            <td>{{ $group->name }}</td>
            <td>{{ $group->created_at->format('Y-m-d') }}</td>
            <td>{{ $group->public? "Public": "Private" }}</td>
            <td><a href="/admin/groups/{{$group->id}}/delete" class="btn btn-default" onclick="return myConfirm()"><i class="fa fa-times"></i></a></td>
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

@section('right')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Administration</h3>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <li class="list-group-item"><a href="/admin/users"><div style="width:100%" class="btn btn-primary">Administration des utilisateurs</div></a></li>
                <li class="list-group-item"><a href="/admin/groups"><div style="width:100%" class="btn btn-primary">Administration des groupes</div></a></li>
                <li class="list-group-item"><a href="/admin/stats"><div style="width:100%" class="btn btn-primary">Statistiques</div></a></li>
            </ul>



        </div>
    </div>
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
