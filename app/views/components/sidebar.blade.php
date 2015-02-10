<?php
    use Cmgmyr\Messenger\Models\Thread;

    if (Auth::check()) {
        $currentUserId = Auth::user()->id;
        $user = User::find($currentUserId);
    }

$threads = Thread::getAllLatest();
$threads = new Thread;
$threads = Thread::forUserWithNewMessages($currentUserId);
?>
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="{{ isset($user->photo) ? asset($user->photo) : asset('img/avatar5.png') }}" class="img" alt="User Image" />
        </div>
        <div class="pull-left info">
            <p>{{$user->first_name." ".$user->last_name}}</p>

            <a href="/{{ "@" }}{{$user->username }}"><i class="ion ion-ios-gear-outline"></i> Paramètres</a>
        </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
        <li>
            <a href="/feed">
                <i class="ion ion-ios-home-outline"></i> <span>Accueil</span>
            </a>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-ios-browsers-outline"></i>
                <span>Mes groupes</span>
                <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
                @foreach(Auth::user()->channels as $channel)
                <li><a href="/channels/{{$channel->id}}/posts"><i class="ion ion-ios-arrow-right"></i> {{$channel->name}} </a></li>
                @endforeach
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="ion ion-email-unread"></i> <span>Messages</span>
                <i class="fa fa-angle-left pull-right"></i>
                @if($threadsNotifications->count())
                    <small class="badge pull-right bg-dark-gray text-black">{{ $threadsNotifications->count() }}</small>
                @endif
            </a>
            <ul class="treeview-menu">
                <li><a href="/messages/create"><i class="ion-forward"></i> Nouveau message</a></li>

                @foreach($threads as $thread)
                    @if($thread->isUnread($currentUserId))
                        <li><a href={{url('messages/' . $thread->id)}}>&nbsp;&nbsp;&nbsp;&nbsp; <i class="ion ion-ios-arrow-right"></i><i class="ion-email-unread"></i>  {{ $thread->subject }} </a></li>
                    @endif
                @endforeach

                <li><a href="/messages"><i class="ion-email"></i>  Tous les messages</a></li>
            </ul>
        </li>
        <li>
            <a href="/manageChannels">
                <i class="ion ion-settings"></i> <span>Gestion des groupes</span>
            </a>
        </li>
    </ul>
</section>
