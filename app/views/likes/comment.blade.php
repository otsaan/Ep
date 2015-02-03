<script>
$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like").click(function()
    {
        var com = $(this);
        var sd = com.text();
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
                    sd = parseInt(sd);
                    if(data.like) {
                        $(com).html('<i class="icon ion-android-favorite"></i> '+ (sd+1) +' Likes');
                    } else {
                        $(com).html('<i class="icon ion-android-favorite-outline"></i> '+ (sd-1) +' Likes');
                    }
                }
            }
        });
    });
});
</script>