<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href={{asset('css/home/reset.css')}}> <!-- CSS reset -->
    <link rel="stylesheet" href={{asset('css/home/style.css')}}> <!-- Gem style -->
    <script src={{asset('js/home/modernizr.js')}}></script> <!-- Modernizr -->


    <title>Ep</title>
</head>
<body>
    <header role="banner">
        <div id="cd-logo"><a href="#0"><img src={{asset('img/small_logo.png')}} alt="Logo"></a></div>

        <nav class="main-nav">
            <ul>
                <!-- inser more links here -->
                <li><a class="cd-signin" href="#0">S'identifier</a></li>
                <li><a class="cd-signup" href="#0">S'inscrire</a></li>
            </ul>
        </nav>
    </header>
    <div class="cd-user-modal"> <!-- this is the entire modal form, including the background -->
        <div class="cd-user-modal-container"> <!-- this is the container wrapper -->
            <ul class="cd-switcher">
                <li><a href="#0">S'identifier</a></li>
                <li><a href="#0">Inscription</a></li>
            </ul>

            <div id="cd-login"> <!-- log in form -->
                {{Form::open(['route'=>'login_path', 'class' => 'cd-form'])}}
                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        <input name="username" class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signin-password">Password</label>
                        <input name="password" class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password">
                        <span class="cd-error-message">Email n'est pas valide!</span>
                    </p>

                    <p class="fieldset">
                        <input name="remember_me" type="checkbox" id="remember-me">
                        <label for="remember-me"> &nbsp;Se souvenir de moi</label>
                    </p>

                    <p class="fieldset">
                        {{ Form::Submit('S\'identifier',['class'=>'full-width']) }}
                    </p>
                {{Form::close()}}

                <p class="cd-form-bottom-message"><a href="#0">Mot de passe oublié?</a></p>
                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-login -->

            <div id="cd-signup"> <!-- sign up form -->
                {{ Form::open(['route' => 'register_path', 'class' => 'cd-form'])}}

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Nom</label>
                        {{ Form::text('first_name',null,['class'=>'full-width has-padding has-border', 'id'=>'signup-username','placeholder'=>'Nom']) }}
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Prenom</label>
                        {{ Form::text('last_name',null,['class'=>'full-width has-padding has-border', 'id'=>'signup-username','placeholder'=>'Prenom']) }}
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-email" for="signup-email">E-mail</label>
                        {{ Form::email('email',null,['class'=>'full-width has-padding has-border','id'=>'signup-email','placeholder'=>'Email']) }}
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-username" for="signup-username">Username</label>
                        {{ Form::text('username',null,['class'=>'full-width has-padding has-border','id'=>'signup-username','placeholder'=>'Username']) }}
                    </p>

                    <p class="fieldset">
                        {{Form::label('etudiant','Etudiant') }}
                        {{ Form::radio('is_type','Student','true') }}
                        {{Form::label('professeur','Professeur') }}
                        {{ Form::radio('is_type','Professor') }}
                        {{Form::label('laureat','Lauréat') }}
                        {{ Form::radio('is_type','Graduate') }}
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Password</label>
                        <input name="password" class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Password">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace cd-password" for="signup-password">Confimation</label>
                        <input name="password_confirmation" class="full-width has-padding has-border" id="signup-password" type="password"  placeholder="Confirmation de mot de passe">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="S'inscrire">
                    </p>

                {{ Form::Close() }}

                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div> <!-- cd-signup -->

            <div id="cd-reset-password"> <!-- reset password form -->
                <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

                <form class="cd-form">
                    <p class="fieldset">
                        <label class="image-replace cd-email" for="reset-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
                        <span class="cd-error-message">Error message here!</span>
                    </p>

                    <p class="fieldset">
                        <input class="full-width has-padding" type="submit" value="Reset password">
                    </p>
                </form>

                <p class="cd-form-bottom-message"><a href="#0">Revenir</a></p>
            </div> <!-- cd-reset-password -->
            <a href="#0" class="cd-close-form">Fermer</a>
        </div> <!-- cd-user-modal-container -->
    </div> <!-- cd-user-modal -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/home/main.js"></script> <!-- Gem jQuery -->
</body>
</html>