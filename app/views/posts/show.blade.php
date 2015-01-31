
@foreach ($posts as $post)

        <div class="event">

            <a class="label no-padding">
                <img src="http://dummyimage.com/40x40">
            </a>

            <div class="content">


                <div class="summary">
                    <a> {{ link_to("@{$post->user->username}", $post->user->present()->fullName(), $post->user->username) }}
                    <div class="date">{{ $post->present()->recentTime() }}</div>
                </div>

                <div class="extra text">
                    {{ $post->content }}
                </div>

                {{--<div class="extra images">--}}
                    {{--<a><img src="img/avatar2.png"></a>--}}
                    {{--<a><img src="img/avatar2.png"></a>--}}
                {{--</div>--}}

                <div class="meta">

                    <a class="like">
                        <i class="ion ion-android-favorite"></i> 1 Like
                    </a>
                    <!--  commentsCount -->
                    <a class="comment">
                        {{ $post->present()->commentsCount() }}
                    </a>

                </div>

                @include('comments.show', array('post' => $post))

                <!-- reply form -->
                @include('comments.create', array('postId' => $post->id))


            </div>
        </div>

@endforeach