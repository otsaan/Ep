
@foreach ($posts as $post)

        <div class="event">

            <a class="label no-padding">
                <img src="{{asset($post->user->photo)}}">
            </a>

            <div class="content">


                <div class="summary">
                    {{ link_to("@{$post->user->username}", $post->user->present()->fullName(), $post->user->username) }}
                    <div class="date">
                        {{ link_to_route("channels.posts.show", $post->present()->recentTime(), [$post->channel->id, $post->id], array('style'=>'color:gray')) }}
                    </div>
                </div>

                <div class="extra text">
                    {{{ nl2br($post->content) }}}
                </div>

                <div class="extra images">
                    @foreach ($post->attachments as $attachment)
                        <?php 
                            $img_exts = array("jpg", "jpeg", "png", "bmp", "gif");
                            $vid_exts = array("mp4", "ogg", "webm");
                            if(in_array($attachment->file_type, $img_exts)) {?>
                                <img src={{asset($attachment->path)}}>
                            <?php } elseif (in_array($attachment->file_type, $vid_exts)) {?>
                                <video width="320" height="240" controls>
                                  <source src="{{asset($attachment->path)}}" type="video/mp4">
                                  <!-- <source src="movie.ogg" type="video/ogg"> -->
                                </video>
                            <?php } else { ?>
                                <br><a href="{{asset($attachment->path)}}">{{substr($attachment->path, 28)}}</a><br>
                        <?php }
                         ?>
                    @endforeach
                </div>

                <div class="meta">
                    <a class="like-btn like" data-post-id="{{{ $post->id }}}">
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

@endforeach