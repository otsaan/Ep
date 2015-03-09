

<li class="dropdown messages-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="ion ion-ios-email-outline"></i>
        @if($threadsNotifications->count()>0)
        <span class="label bg-blue">{{ $threadsNotifications->count() }}</span>
        {{--@else--}}
        {{--<span class="label  bg-dark-gray"></span>--}}
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="header">Vous avez {{ $threadsNotifications->count() }} message(s)</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach($threadsNotifications as $threadsNotification)
                <li><!-- start message -->
                    <a href="/messages/{{ $threadsNotification->id}}">
                        <div class="pull-left">
                            <i class="fa fa-weixin"></i>
                        </div>
                        <h4>
                           Nouveau msg dans {{ $threadsNotification->subject }}
<!--                            <small><i class="fa fa-clock-o"></i> 5 mins</small>-->
                        </h4>
                        <p>{{$threadsNotification->latestMessage()->body}}</p>
                    </a>
                </li>
                @endforeach

            </ul>
        </li>
        <li class="footer"><a href="#">Voir tous les messages</a></li>
    </ul>
</li>




<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="ion ion-ios-information-outline"></i>
        @if($notifications->count()>0)
        <span class="label bg-blue">{{$notifications->count()}}</span>
        {{--@else--}}
        {{--<span class="label bg-dark-gray">0</span>--}}
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="header">Vous avez {{$notifications->count()}} notification(s)</li>

        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach($notifications as $notification)
                <li>
                    <a href="{{ $notification['url'] }}?notifId={{ $notification['id'] }}">
                        @if($notification['body']['name']=="post")
                        <i class="fa fa-users warning"></i>
                        @elseif($notification['body']['name']=="comment")
                        <i class="fa fa fa-comments"></i>
                        @elseif($notification['body']['name']=="invitation")
                        <i class="fa fa fa-users warning"></i>
                        @endif
                        <b> {{ $notification['from']['first_name'] }} {{ $notification['from']['last_name'] }}</b>
                        {{ $notification['body']['text'] }}<b> #{{ $notification['extra'] }}</b>

                        <p><b>{{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</b></p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="{{route('read_notifications')}}">Marquer tous comme lu</a></li>
    </ul>
</li>