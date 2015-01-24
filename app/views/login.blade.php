<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Ep | Login</title>
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
        <div class="header">Sign In</div>

        <form action="#" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="text" name="userid" class="form-control" placeholder="User ID"/>
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password"/>
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember_me"/> Remember me
                </div>
            </div>
            <div class="footer">
                <button type="submit" class="btn bg-olive btn-block">Sign me in</button>

                <p><a href="#">I forgot my password</a></p>

                <a href="#" class="text-center">Register a new membership</a>
            </div>
        </form>

    </div>

    {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js') }}
    {{ HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js') }}

    </body>
</html>