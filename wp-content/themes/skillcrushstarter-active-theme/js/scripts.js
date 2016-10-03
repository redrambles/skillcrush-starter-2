(function($) {

    // $(document).on( 'click', '.love-button img', function(){
    //     alert('Love is happening');
    // })
    
    // $(document).on( 'click', '.love-button img', function(){
    // var post_id = parseInt( $(this).parents('article.post:first').attr('id').replace( 'post-', '' ) );
    // console.log(post_id);
    
    $(document).on( 'click', '.love-button img', function(){
        //var post_id = parseInt( $(this).parents('article.post:first').attr('id').replace( 'post-', '' ) );
        var post_id = $(this).parents('span:first').data('id');
        var $number = $(this).parent().find('.number');
        $.ajax({
            url: ajaxHeart.ajax_url,
            type: 'post',
            data: {
                action: 'add_love',
                post_id: post_id,
            },
            success: function( response ) {
                $number.text(response);
            }
        })

    })

})( jQuery );