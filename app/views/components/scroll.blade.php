<script>
    $(document).ready(function(){
        //hides the default paginator
        $('ul.pagination:visible:first').hide();

        //init jscroll and tell it a few key configuration details
        $('div.scroller').jscroll({
            debug: false,
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