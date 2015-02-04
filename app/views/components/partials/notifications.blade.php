<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="ion ion-ios-information-outline"></i>
        @if($notifications->count()>0)
        <span class="label bg-blue">{{$notifications->count()}}</span>
        @else
        <span class="label bg-dark-gray">0</span>
        @endif
    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{$notifications->count()}} notification(s)</li>

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
                        @endif
                        <b> {{ $notification['from']['first_name'] }} {{ $notification['from']['last_name'] }}</b>
                        {{ $notification['body']['text'] }}<b> #{{ $notification['extra'] }}</b>

                        <p><b>{{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</b></p>
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="{{route('read_notifications')}}">Mark as read</a></li>
    </ul>
</li>