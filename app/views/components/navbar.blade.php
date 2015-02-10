<?php
    if (Auth::check()) {
        $id = Auth::user()->id;
        $user = User::find($id);
    }
?>
<ul class="nav navbar-nav">
<!-- Messages: style can be found in dropdown.less-->
<!-- Notifications: style can be found in dropdown.less -->
@include('components.partials.notifications')

<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="ion ion-ios-person"></i>
        <span>{{$user->first_name." ".$user->last_name}} <i class="caret"></i></span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header bg-light-blue">
            <img style="width: 150px;height: 150px;" src="{{ isset($user->photo) ? asset($user->photo) : asset('img/avatar5.png') }}" class="img-circle" alt="User Image"/>
        </li>
        <!-- Menu Body -->

        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <div class="btn btn-default btn-flat">
                    {{ link_to("@{$user->username}", "Profile", $user->username) }}
                </div>
            </div>
            <div class="pull-right">
                <a href="{{route('signout_path')}}" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
</ul>