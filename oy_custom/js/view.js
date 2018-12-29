

$('.imgchanger').hover(function() {
 var src = $(this).attr('data-img');
     
    // increase the 500 to larger values to lengthen the duration of the fadeout 
       // and/or fadein
    $('#thumbimg').fadeOut(200, function() {
        $('#thumbimg').attr('src',src); 
         $('#thumbimg').fadeIn(200);
    });

});

