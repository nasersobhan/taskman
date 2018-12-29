

$(document).ready(function(){


cat_parent = $('#cat_category1');
cat_child = $('#cat_category');
cascadecat(cat_parent, cat_child);


$(".seladdpost").each(function(){
  var $this = $(this);
  var type = $(this).attr('data-type');
   $this.select2({
       placeholder: function(){
           $(this).data('placeholder');
       },
    minimumInputLength: 1, tags: true, multiple: true,
    ajax: {
      url: homeURL + '/?API=post&type='+ type,
      dataType: 'json',
      data: function (term) {
        return {
          term: term.term
        };
      },
      results: function (data) {
        return { results: data };
      }
    }
  ,    tokenSeparators: [","],
    createSearchChoice: function (term) {
        var text = term + (lastResults.some(function(r) { return r.text == term }) ? "" : " (new)");
        return { id: term, text: text };
    },
    });
});
  



$("#job_experience").on('change keyup paste', function() {
var vx = $(this).val();
$('#textvalue').text((vx == 0 ? ' No Experience' : (vx + ' year' +  ( vx > 1 ? 's' : ''))));
});


var vx = $("#job_experience").val();
$('#textvalue').text((vx == 0 ? ' No Experience' : (vx + ' year' +  ( vx > 1 ? 's' : ''))));



//$("#job_education").select2({
//    tags: true, placeholder: "Please enter tags",
//});
//$("#job_title").select2({
//    tags: true, placeholder: "Please enter tags",
//});
$('.select3').selectpicker(); 


//   $('#skills').select2({
//    multiple: true,
//    placeholder: "Please enter tags",
//    tokenSeparators: [","],
//   tags: true,
//    createSearchChoice: function (term) {
//        var text = term + (lastResults.some(function(r) { return r.text == term }) ? "" : " (new)");
//        return { id: term, text: text };
//    },
//});




  });   
  

  
  function readURL(input,imgbox) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function(e) {
      $('#'+imgbox).attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$(".loadimg").change(function() {
    var img = $(this).attr('id')+'i';
  readURL(this,img);
});




