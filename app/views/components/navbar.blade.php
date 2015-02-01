<ul class="nav navbar-nav">
    <!-- Messages: style can be found in dropdown.less-->
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ion ion-ios-email-outline"></i>
            <span class="label bg-blue">4</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- start message -->
                        <a href="#">
                            <div class="pull-left">
                                <img src="img/avatar3.png" class="img-circle" alt="User Image"/>
                            </div>
                            <h4>
                                Support Team
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li><!-- end message -->
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                            </div>
                            <h4>
                                AdminLTE Design Team
                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <img src="img/avatar.png" class="img-circle" alt="user image"/>
                            </div>
                            <h4>
                                Developers
                                <small><i class="fa fa-clock-o"></i> Today</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <img src="img/avatar2.png" class="img-circle" alt="user image"/>
                            </div>
                            <h4>
                                Sales Department
                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div class="pull-left">
                                <img src="img/avatar.png" class="img-circle" alt="user image"/>
                            </div>
                            <h4>
                                Reviewers
                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                            </h4>
                            <p>Why not buy a new awesome theme?</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
    <!-- Notifications: style can be found in dropdown.less -->
    <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ion ion-ios-information-outline"></i>
            @if($notifications)
            <span class="label bg-dark-gray">{{$notifications->count()}}</span>
            @else
            <span class="label bg-dark-gray">0</span>
            @endif
        </a>
        <ul class="dropdown-menu">
            @if($notifications)
            <li class="header">You have {{$notifications->count()}} notification(s)</li>
            @else
            <li class="header">You have 0 notification</li>
            @endif

            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    @foreach($notifications as $notification)
                    <li>
                        <a href="{{$notification['url']}}">
                            <i class="fa fa-users warning"></i>
                            {{$notification['body']['text']}} by {{$notification['from']['first_name']}}
                            {{$notification['from']['last_name']}}s
                        </a>
                    </li>
                    @endforeach
                </ul>
            </li>
            <li class="footer"><a href="#">View all</a></li>
        </ul>
    </li>
    <!-- Tasks: style can be found in dropdown.less -->
    <li class="dropdown tasks-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ion ion-ios-list-outline"></i>
            <span class="label bg-dark-gray">9</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 9 tasks</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- Task item -->
                        <a href="#">
                            <h3>
                                Design some buttons
                                <small class="pull-right">20%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">20% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li><!-- end task item -->
                    <li><!-- Task item -->
                        <a href="#">
                            <h3>
                                Create a nice theme
                                <small class="pull-right">40%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">40% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li><!-- end task item -->
                    <li><!-- Task item -->
                        <a href="#">
                            <h3>
                                Some task I need to do
                                <small class="pull-right">60%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li><!-- end task item -->
                    <li><!-- Task item -->
                        <a href="#">
                            <h3>
                                Make beautiful transitions
                                <small class="pull-right">80%</small>
                            </h3>
                            <div class="progress xs">
                                <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">80% Complete</span>
                                </div>
                            </div>
                        </a>
                    </li><!-- end task item -->
                </ul>
            </li>
            <li class="footer">
                <a href="#">View all tasks</a>
            </li>
        </ul>
    </li>
    <!-- User Account: style can be found in dropdown.less -->
    <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="ion ion-ios-person"></i>
            <span>Jane Doe <i class="caret"></i></span>
        </a>
        <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header bg-light-blue">
                <img src="img/avatar3.png" class="img-circle" alt="User Image" />
                <p>
                    Jane Doe - Web Developer
                    <small>Member since Nov. 2012</small>
                </p>
            </li>
            <!-- Menu Body -->
            <li class="user-body">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
                <div class="pull-left">
                    <?php
                        if (Auth::check())
                        {
                            $id = Auth::user()->id;
                            $user = User::find($id);
                        }
                    ?>  
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