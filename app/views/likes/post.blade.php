<script>
$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like-btn").click(function()
    {
        var pos = $(this);
        var sd = pos.text();
        var postId = pos.data('post-id');
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
                    sd = parseInt(sd);
                    if(data.like) {
                        $(pos).html('<a class="like-btn like" data-post-id="postId"><i class="icon ion-android-favorite"></i> '+ (sd+1) +' Likes</a>');
                    } else {
                        $(pos).html('<a class="like-btn like" data-post-id="postId"><i class="icon ion-android-favorite-outline"></i> '+ (sd-1) +' Likes</a>');
                    }
                }
            }
        });
    });
});
</script>