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
  $('#form').submit();
});

$('.ajax-form').on('submit', function(e){
    e.preventDefault();
    $.ajaxSetup({
      header:$('meta[name="csrf-token"]').attr('content')
    });
    
    console.log(e);
    var id = $(this).attr('formId');
    var url = $(this).attr('action');
    console.log("URL:"+url);
    // $.post($(this).attr('func'), function(data){
    //   console.log(data);
    //   $('#'+id).html(data);
    // });
    $.ajax({
      type:'post',
      url: url,
      data: $(this).serialize(),
      header:$('meta[name="csrf-token"]').attr('content'),
      dataType: 'json',
      success:function(response){
          console.log(response.correct);
      },
      error:function(data){
        console.log("error:"+data);
      }
    });

  });