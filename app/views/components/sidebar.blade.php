<?php
    if (Auth::check()) {
        $id = Auth::user()->id;
        $user = User::find($id);
    }
?>
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ isset($user->photo) ? asset($user->photo) : asset('img/avatar5.png') }}" class="img" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{$user->first_name." ".$user->last_name}}</p>

            <a href="/{{ "@" }}{{$user->username }}"><i class="ion ion-ios-gear-outline"></i> Settings</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li class="active">
            <a href="/feed">
                <i class="ion ion-ios-home-outline"></i> <span>Home</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-browsers-outline"></i>
                <span>My channels</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @foreach(Auth::user()->channels as $channel)
                <li><a href="/channels/{{$channel->id}}/posts"><i class="ion ion-ios-arrow-right"></i> {{$channel->name}} </a></li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="/messages">
                <i class="ion ion-email-unread"></i> <span>Messages</span>
                <small class="badge pull-right bg-dark-gray text-black">{{ $threadsNotifications->count() }}</small>
            </a>
        </li>
        <li>
            <a href="/manageChannels">
                <i class="ion ion-settings"></i> <span>Manage channels</span>
            </a>
        </li>
    </ul>
</section>
