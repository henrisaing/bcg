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

  // $('.bingo-table td').click(function(){
  //   $(this).toggleClass('green',500);
  // });

  // $('.preview-thumb').each(function(){
  //   var siteId = $(this).attr('id'); 
  //   console.log(siteId);
  //   $.get('/site/'+siteId+'/preview', function(data){
  //     $('#'+siteId).html(data);
  //     console.log('abc');

  //   });
  // });
});

$(document).on('click', '.bingo-table td', function(){
  var id = $(this).attr('position');
  // $(this).toggleClass('green',500);
  // $('#'+)
  if($(this).hasClass('green')){
    $(this).removeClass('green', 500);
    $(this).addClass('none', 500);
    $('#'+id).val('none');
    // console.log('none');
  }else{
    $(this).removeClass('none', 500);
    $(this).addClass('green', 500);
    $('#'+id).val('green');
    // console.log('green');
  }
});
