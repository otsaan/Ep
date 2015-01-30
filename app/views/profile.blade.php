@extends('master')

@section('feed')
    <?php
        if (Auth::check())
        {
            $id = Auth::user()->id;
            $user = User::find($id);
        }
    ?> 

    <h1>{{ $user->username }}'s profile</h1>
    <div class="col-md-12">

        {{Form::open(['route'=>'profile'])}}
            <div class="form-group">

                <!-- ======== Photo de profile ============-->
                <div class="col-md-3">
                    <div class="thumbnail">
                        <img src="img/avatar2.png" width="230" height="230"/>

                        <div class="text-center profile-pic-change">
                            <div class="btn bg-gray btn-file">
                                <i class="fa fa-edit"></i> Modifier {{ Form::file('photo') }}
                                <progress id="progressBar" value="0" max="100" style="width:150px;display:none;"></progress>
                            </div>
                        </div>
                    </div>
                    <h3 id="status"></h3>

                </div>

                <!-- ======== / Photo de profile ============-->

                <!-- ======== Informations de profile ==============-->

                <div class="col-md-9">
                    <!-- Custom Tabs -->
                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="#tab_2" data-toggle="tab"> <i class="fa fa-cog"></i> Parametres</a></li>
                        </ul>

                        <div class="tab-content tab-height">
                            <div class="tab-pane active" id="tab_1">
                              <table class="table table-hover">
                              
                                <tr>
                                    <td><h4><b>Nom</b></h4></td>
                                    <td><h4>{{ $user->last_name }}</h4></td>

                                </tr>
                                <tr>
                                    <td><h4><b>Prenom</b></h4></td>
                                    <td><h4>{{ $user->first_name }}</h4></td>

                                </tr>
                                <tr>
                                    <td><h4><b>Email</b></h4></td>
                                    <td><h4>{{ $user->email }}</h4></td>

                                </tr>
                                 <tr>
                                    <td><h4><b>Date de naissance</b></h4></td>
                                    <td><h4>{{ $user->birthdate }}</h4></td>

                                </tr>
                                <tr>
                                    <td><h4><b>Num Tel</b></h4></td>
                                    <td><h4>{{ $user->phone }}</h4></td>

                                </tr>
                              </table>
                            </div><!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_2">

                              <table class="table table-hover">
                                 Entrez les champs que vous voulez modifier puis cliquez sur enregistrer:<br><br>
                                <tr>
                                    <td><h4><b>{{Form::label('last_name', 'Nom')}}</b></h4></td>
                                    <td>
                                        <div class="input-group">
                                            {{ Form::text('last_name',$user->last_name,['class'=>'form-control']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td><h4><b>{{Form::label('first_name', 'Prenom')}}</b></h4></td>
                                     <td>
                                        <div class="input-group">
                                            {{ Form::text('first_name',$user->first_name,['class'=>'form-control']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td><h4><b>{{Form::label('email', 'Email')}}</b></h4></td>
                                     <td>
                                        <div class="input-group">
                                            {{Form::email('email', $user->email, ['class'=>'form-control','placeholder'=>'ret'])}}
                                        </div>
                                    </td>

                                </tr>
                                 <tr>
                                    <td><h4><b>{{Form::label('birthdate', 'Date de naissance')}}</b></h4></td>
                                    <td>
                                        <div class="input-group">
                                            {{ Form::text('first_name',$user->birthdate,['class'=>'form-control']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td><h4><b>{{Form::label('phone', 'Num Tel')}}</b></h4></td>
                                     <td>
                                        <div class="input-group">
                                            {{ Form::text('phone',$user->phone,['class'=>'form-control']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td><h4><b>Mot de passe</b></h4></td>
                                     <td>
                                        <div class="input-group">
                                            {{ Form::password('pass_actuel',['class'=>'form-control','placeholder'=>'Mot de passe actuel']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                    <td></td>
                                     <td>
                                        <div class="input-group">
                                            {{ Form::password('pass',['class'=>'form-control','placeholder'=>'Nouveau mot de passe']) }}
                                        </div>
                                    </td>

                                </tr>

                                <tr>
                                    <td></td>
                                     <td>
                                        <div class="input-group">
                                            {{ Form::password('pass2',['class'=>'form-control','placeholder'=>'Confirmation']) }}
                                        </div>
                                    </td>

                                </tr>
                                <tr>
                                </tr>
                              </table>

                              <div class="box-footer">
                                {{ Form::Submit('Enregister',['class'=>'btn btn-primary']) }}
                                {{ Form::Button('Annuler',['class'=>'btn btn-gray']) }}
                              </div>

                            </div>
                        </div>
                    </div>


                </div>
            </div>

        {{Form::close()}}

    </div>
@stop