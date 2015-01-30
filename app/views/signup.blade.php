<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Ep | Signup</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('css/style.css') }}
</head>
<body class="bg-black">

@include('components.partials.errors')

<div class="form-box" id="login-box">

    <div class="header">Sign up</div>
    {{ Form::open(['route' => 'register_path'])}}
    <div class="body bg-gray">
        <div class="form-group">
            {{ Form::text('first_name',null,['class'=>'form-control','placeholder'=>'Prenom']) }}
        </div>
        <div class="form-group">
            {{ Form::text('last_name',null,['class'=>'form-control','placeholder'=>'Nom']) }}
        </div>
        <div class="form-group">
            {{ Form::email('email',null,['class'=>'form-control','placeholder'=>'Email']) }}
        </div>
        <div class="form-group">
            {{ Form::text('username',null,['class'=>'form-control','placeholder'=>'Username']) }}
        </div>
        <div class="form-group">
            {{Form::label('etudiant','Etudiant') }}
            {{ Form::radio('is_type','Student','true') }}
            {{Form::label('professeur','Professeur') }}
            {{ Form::radio('is_type','Professor') }}
            {{Form::label('laureat','Lauréat') }}
            {{ Form::radio('is_type','Graduate') }}
        </div>
        <div class="form-group">
            {{ Form::password('password',['class'=>'form-control','placeholder'=>'password']) }}
        </div>
        <div class="form-group">
            {{ Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'confirmation']) }}
        </div>
    </div>
    <div class="footer">
        {{ Form::submit('Sign me up',['class'=>'btn bg-olive btn-block']) }}

        <a href="login" class="text-center">I already have an account</a>
    </div>
    {{ Form::Close() }}
</div>

{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}

</body>
</html>