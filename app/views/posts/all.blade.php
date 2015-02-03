@extends('master')

@section('feed')

    <div class="scroller">

        <div class="ui feed">

            <!-- show all posts -->

            @foreach ($posts as $post)

                <div class="event">

                    <a class="label no-padding">
                        <img src="http://dummyimage.com/40x40">
                    </a>

                    <div class="content">
                        <div class="summary">
                            {{ link_to("@{$post->user->username}", $post->user->present()->fullName(), $post->user->username) }}
                            <div class="date">{{ $post->present()->recentTime() }}</div> &nbsp;in
                            {{ link_to_route('channels.posts.index', '#' .$post->channel->name , $post->channel->id ); }}
                        </div>

                        <div class="extra text">
                            {{ nl2br($post->content) }}
                        </div>

                        {{--<div class="extra images">--}}
                        {{--<a><img src="img/avatar2.png"></a>--}}
                        {{--<a><img src="img/avatar2.png"></a>--}}
                        {{--</div>--}}

                        <div class="meta">
                            <a class="like-btn like" data-post-id="{{{ $post->id }}}" id="{{{ $post->id }}}">
                                @if($post->present()->liked())
                                    <i class="icon ion-android-favorite"></i> {{$post->present()->likes}} Likes
                                @else
                                    <i class="icon ion-android-favorite-outline"></i> {{$post->present()->likes}} Likes
                                @endif
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
                </li>
            @endforeach
        </div>

        {{$posts->links()}}
    </div>

@stop

@section('bottom-script')
    {{ HTML::script('js/jquery.jscroll.min.js') }}
    <script>
        $(document).ready(function(){

            //hides the default paginator
            $('ul.pagination:visible:first').hide();

            //init jscroll and tell it a few key configuration details
            $('div.scroller').jscroll({
                debug: true,
                autoTrigger: true,
                nextSelector: '.pagination li.active + li a',
                contentSelector: 'div.scroller',
                callback: function() {

                    //again hide the paginator from view
                    $('ul.pagination:visible:first').hide();

                }
            });
        });
    </script>

    @include('likes.post')
    @include('likes.comment')
@stop