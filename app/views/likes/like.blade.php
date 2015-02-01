<script>
$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like-btn").click(function()
    {
        var postId = $(this).data('post-id');
            $.ajax({
                url: "{{{ URL::route('like') }}}",
                type:'POST',
                data: {
                    _token: csrfToken,
                    _method: 'POST',
                    id: $(this).data('post-id')
                },
                success: function(data) {
                    if (data.success) {
                        var sd=$("#"+postId).text();
                        sd=parseInt(sd);
                        if(data.like) {
                            $("#"+postId).html('<i class="icon ion-android-favorite" id="l{{{ $post->id }}}"></i> '+ (sd+1) +' Likes');
                        } else {
                            $("#"+postId).html('<i class="icon ion-android-favorite-outline" id="l{{{ $post->id }}}"></i> '+ (sd-1) +' Likes');
                        }
                    }
                }
            });
    });
});
</script>