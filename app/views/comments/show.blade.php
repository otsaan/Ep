<!-- all comments associated with this post -->
@foreach ($post->present()->allComments() as $comment)
    <div class="ui comments">
        <div class="comment">

            <!-- user avatar 35x35 -->
            <a class="avatar">
                <img src="http://dummyimage.com/35x35">
            </a>

            <div class="content">

                <!-- username  -->
                <a class="author">{{ link_to("@{$comment->user->username}", $comment->user->present()->fullName(), $comment->user->username) }}</a>
                {{--<a class="author">{{ $comment->user->id }}</a>--}}

                <!-- comment date  -->
                <div class="metadata">
                    <div class="date"> {{ $comment->present()->recentTime() }}</div>
                </div>

                <!-- comment content  -->
                <div class="text">
                    {{ nl2br($comment->content) }}
                </div>

                <div class="meta">
                    <a class="like">
                         <i class="ion ion-android-favorite"></i> {{$comment->present()->likes}} Likes
                    </a>
                </div>

            </div>
        </div>
    </div>
@endforeach