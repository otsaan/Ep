
@extends('master')

@section('feed')
    <!--           -->
    <div class="panel panel-info">
        <div class="panel-heading">
            Historique récent
        </div>
        <div class="panel-body">
            <ul class="media-list">
                <!---->
                <h1>{{$thread->subject}}</h1>

                @foreach($thread->messages as $message)


                <li class="media">

                    <div class="media-body">

                        <div class="media">
                            <a class="pull-left" href="#">
                                <img src="{{ isset($message->user->photo) ? asset($message->user->photo) : asset('img/avatar5.png')}}"
                                     alt="{{$message->user->first_name}}" class="img-circle" style="width: 75px;height: 75px;">
                            </a>
                            <div class="media-body" >
                                {{{$message->body}}}
                                <br />
                                <small class="text-muted">{{$message->user->first_name}} {{$message->user->last_name}} | Posted {{$message->created_at->diffForHumans()}}</small>
                                <hr />
                            </div>
                        </div>

                    </div>
                </li>

                @endforeach

                {{Form::open(['route' => ['messages.update', $thread->id], 'method' => 'PUT'])}}
                <!-- Message Form Input -->
                <div class="form-group">
                    {{ Form::textarea('message', null, ['class' => 'form-control','placeholder'=>'Tapez votre message']) }}
                </div>


                <!-- Submit Form Input -->
                <div class="form-group">
                    {{ Form::submit('Envoyer', ['class' => 'btn btn-primary form-control']) }}
                </div>
                {{Form::close()}}
            </ul>
        </div>
    </div>

@stop

@section('right')
<div class="panel panel-primary">
    <div class="panel-heading">
        Utilisateurs dans cette discussion
    </div>
    <div class="panel-body">
        <ul class="media-list">
            @if($participants->count() > 0)
            @foreach($participants as $participant)


            <li class="media">

                <div class="media-body">

                    <div class="media">
                        <a class="pull-left" href="#">
                            <img src="{{ isset($participant->photo) ? asset($participant->photo) : asset('img/avatar5.png') }}"
                                 alt="{{$participant->first_name}}" class="img-circle" style="width: 75px;height: 75px;">
                        </a>

                        <div class="media-body">
                            <h5>{{$participant->first_name}}     {{$participant->last_name}}  | {{$participant->is_type}} </h5>

                            <small class="text-muted"></small>
                        </div>
                    </div>

                </div>
            </li>

            @endforeach
            @endif
        </ul>
    </div>
</div>
@stop