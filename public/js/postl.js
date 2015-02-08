$(document).ready(function() {
    var csrfToken = "{{{ Session::get('_token') }}}";
    $(".like-btn").click(function()
    {
        var pos = $(this);
        var sd = pos.text();
        $.ajax({
            url: '/like',
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
                        $(pos).html('<i class="icon ion-android-favorite"></i> '+ (sd+1) +' Likes');
                    } else {
                        $(pos).html('<i class="icon ion-android-favorite-outline"></i> '+ (sd-1) +' Likes');
                    }
                }
            }
        });
    });
});