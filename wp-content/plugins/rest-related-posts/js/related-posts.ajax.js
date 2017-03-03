/**
* AJAX scripts
**/

(function($){
  $('.get-related-posts').one( 'click', function(event) {
    event.preventDefault();
    var json_url = postdata.json_url; // this is defined in rest-related-posts.php
    var post_id = postdata.post_id;
    console.log(json_url);
    console.log(post_id);
    
    // AJAX
    $.ajax({
      dataType: 'json',
      url: json_url  
    })
    
    .done(function(response){
      console.log(response);
      $.each(response, function(index, object){
          var related_post_loop = '<aside class="related-post clear">' +
                                  '<a href="'+ object.link + '">' + 
                                  '<h1 class="related-post-title">' + object.title.rendered + '</h1>' +
                                  '<div class-"related-excerpt">' + 
                                  object.excerpt.rendered +
                                  '<div>' +
                                  '</a>' +
                                  '</aside>';
                                 
          $('#related-posts').append(related_post_loop);
      })
    })
    
    .fail(function(){
      console.log('DISASTER!!!!');
    })
    
    .always(function(){
      console.log('Complete');
    });
    
  });
  
})(jQuery);