<script>
$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like").click(function()
    {
        var com = $(this);
        var sd = com.text();
        var commentId = com.data('comment-id');
        $.ajax({
            url: "{{{ URL::route('clike') }}}",
            type:'POST',
            data: {
                _token: csrfToken,
                _method: 'POST',
                id: $(this).data('comment-id')
            },
            success: function(data) {
                if (data.success) {
                console.log(commentId);
                    sd = parseInt(sd);
                    if(data.like) {
                        $(com).html('<a class="like" data-comment-id="commentId"><i class="icon ion-android-favorite"></i> '+ (sd+1) +' Likes </a>');
                    } else {
                        $(com).html('<a class="like" data-comment-id="commentId"><i class="icon ion-android-favorite-outline"></i> '+ (sd-1) +' Likes </a>');
                    }
                }
            }
        });
    });
});
</script>