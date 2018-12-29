
jQuery(document).ready(function() {
	
    /*
        Fullscreen background
    */
//    $.backstretch([
//                    homeURL + "oy_engine/oy_core/oy_theme/def/account/assets/img/backgrounds/2.jpg"
//	              ,  homeURL + "oy_engine/oy_core/oy_theme/def/account/assets/img/backgrounds/3.jpg"
//	              ,  homeURL + "oy_engine/oy_core/oy_theme/def/account/assets/img/backgrounds/1.jpg"
//	             ], {duration: 3000, fade: 750});
    
    /*
        Form validation
    */
    $('.login-form input[type="text"], .login-form input[type="password"], .login-form textarea').on('focus', function() {
    	$(this).removeClass('input-error');
    });
    
    $('.login-form').on('submit', function(e) {
    	
    	$(this).find('input[type="text"], input[type="password"], textarea').each(function(){
    		if( $(this).val() == "" ) {
    			e.preventDefault();
    			$(this).addClass('input-error');
    		}
    		else {
    			$(this).removeClass('input-error');
    		}
    	});
    	
    });
    
$("#uname").on('blur', function(){
    //var n = ($(this).val());
    var n = replaceSubstring(($(this).val()),' ','');
    //n  = n.replace(/[^a-zA-Z0-9]/g, '');
    $(this).val(formatiton($(this).val()));
});

$("#fullname").on('blur', function(){
    $("#uname").val(formatiton($(this).val()));
});

});


function formatiton(valx){
  
    //n  = n.replace(/[^a-zA-Z0-9]/g, '');
    valx = valx.replace(/[^a-zA-Z ]/g, "");
     valx  = replaceSubstring(valx,' ','');
   return valx;  
}

function replaceSubstring(inSource, inToReplace, inReplaceWith) {

  var outString = inSource;
  while (true) {
    var idx = outString.indexOf(inToReplace);
    if (idx == -1) {
      break;
    }
    outString = outString.substring(0, idx) + inReplaceWith +
      outString.substring(idx + inToReplace.length);
  }
  return outString.toLowerCase();

}