<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>Ep | Remind</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css') }}
    {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css') }}
    <!-- Ionicons -->
    {{ HTML::style('//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}
    <!-- Theme style -->
    {{ HTML::style('css/style.css') }}
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    <div class="header" style="font-size: 1.2em;">Need to reset your password?</div>
    {{Form::open()}}
    <div class="body bg-gray">
        <div class="form-group">
            {{Form::email('email',null,['class'=>'form-control','placeholder'=>'exemple@exemple.com'])}}
        </div>
    </div>
    <div class="footer">
        @if(Session::has('error'))
        <p style="color: red">{{Session::get('error')}}</p>
        @elseif(Session::has('status'))
        <p style="color: green">{{Session::get('status')}}</p>

        @endif
        {{Form::submit('reset',['class'=>'btn bg-olive btn-block'])}}
    </div>


    {{Form::close()}}

</div>

{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
{{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}

</body>
</html>


