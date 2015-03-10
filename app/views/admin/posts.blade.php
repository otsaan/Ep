
@extends('master')
@section('topScript')
{{ HTML::style('css/semantic/semantic.min.css') }}
@stop

@section('feed')
@include('flash::message')

{{Form::open(['method'=>'get'])}}
<div class="">
    <div class="form-group">
        {{ Form::text('q',null,['class'=>'form-control','placeholder'=>'Rechercher ......', 'style'=>'width:500px;float:left;']) }}
        {{ Form::Submit('Recherche',['class'=>'btn bg-olive btn-block','style'=>'margin-left:15px;width:180px;float:left;']) }}
    </div>
    {{Form::close()}}
    <table class="table table-stri<ped">
        <tr>
            <td><b>UserName</b></td>
            <td><b>UserId</b></td>
            <td><b>Channel</b></td>
            <td><b>Contenue</b></td>
            <td><b>Supprimer</b></td>
        </tr>
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->user->username }}</td>
            <td>{{ $post->user->id }}</td>
            <td>{{ $post->channel->name }}</td>
            <td><p   style=" width: 220px; height: 80px; overflow: scroll">{{ $post->content }}</p></td>
            <td><a href="/admin/posts/{{$post->id}}/delete " class="btn btn-default" onclick="return myConfirm()"><i class="fa fa-times"></i></a></td>
        </tr>


        @endforeach
    </table>
    {{  $posts->appends(Request::except("page"))->links()}}
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
                <li class="list-group-item"><a href="/admin/posts"><div style="width:100%" class="btn btn-primary">Administration des posts</div></a></li>
                <li class="list-group-item"><a href="/admin/posts"><div style="width:100%" class="btn btn-primary">Statistiques</div></a></li>
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

