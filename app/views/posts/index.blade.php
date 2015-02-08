@extends('master')

@section('feed')

    @include('posts.create', array('channelId' => $channelId, 'userId' => $userId))
    <div class="scroller">
        <div class="ui feed">

            <!-- show all posts -->
            @foreach ($posts as $post)

                <div class="event">

                    <a class="label no-padding">
                        <img src="{{ isset($post->user->photo) ? asset($post->user->photo) : asset('img/avatar5.png') }}">
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
                                    <i class="icon ion-android-favorite already"></i> {{$post->present()->likes}} Likes
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
            {{$posts->links()}}

        </div>
    </div>
@stop

@section('bottom-script')
    @include('likes.post')
    @include('likes.comment')
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="/js/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="/js/jquery.fileupload.js"></script>
<script>
/*jslint unparam: true */
/*global window, $ */
$(function () {
    'use strict';
    // Change this to the location of your server-side upload handler:
    var url = window.location.hostname === 'blueimp.github.io' ?
                '//jquery-file-upload.appspot.com/' : '/upload';
    var ct =0
    $('#fileupload').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
            ct += data.result.files.length;
            $.each(data.result.files, function (index, file) {
                if (file.name.match(/\.(jpg|jpeg|png|gif)$/)) {
                    $('<img style="display:inline;"/>').attr('src', '/'+file.name).appendTo('#files');
                } else {
                    $('<p/>').text(file.name.substr(28)).appendTo('#files');
                }
            });
            $('<input type="hidden" name="nbfiles" value="'+ ct +'">').appendTo('#files');
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
});
</script>
    @include('components.scroll')
@stop