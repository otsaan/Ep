<script>
$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like").click(function()
    {
        var commentId = $(this).data('comment-id');
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
                    var sd = $("#c"+commentId).text();
                    sd = parseInt(sd);
                    if(data.like) {
                        $("#c"+commentId).html('<i class="icon ion-android-favorite"></i> '+ (sd+1) +' Likes');
                    } else {
                        $("#c"+commentId).html('<i class="icon ion-android-favorite-outline"></i> '+ (sd-1) +' Likes');
                    }
                }
            }
        });
    });
});
</script>