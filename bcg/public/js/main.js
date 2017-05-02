$(document).ready(function(){
  $('a.lightbox-open , button.lightbox-open').click(function(e){
    e.preventDefault();
    $('#fade').css('display','block');
    $('#light').css('display','block');

    //get func attr
    // console.log($(this).attr('func'));
    $.get($(this).attr('func'), function(data){
      $("#lightbox-content").html(data);
    });
  });
  
  // undarkens background
  $('a.lightbox-close , button.lightbox-close').click(function(){
    $('#fade').css('display','none');
    $('#light').css('display','none');
  });

  //main ajax calls
  $('a.ajax-main , button.ajax-main').click(function(){
    $.get($(this).attr('func'), function(data){
      $("#main").html(data);
    });
  });

  // $('.preview-thumb').each(function(){
  //   var siteId = $(this).attr('id'); 
  //   console.log(siteId);
  //   $.get('/site/'+siteId+'/preview', function(data){
  //     $('#'+siteId).html(data);
  //     console.log('abc');

  //   });
  // });
});