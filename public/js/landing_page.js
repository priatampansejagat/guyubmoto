var page_position = 1;
var results_per_page = 15;
var result_per_row = results_per_page/5;
var photo_list = $('#photo_list');
var list_template = $('#list_template').clone();

$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           refresh_list();
    }
});

// handle links with @href started with '#' only
$(document).on('click', 'a[href^="#"]', function(e) {
    // target element id
    var id = $(this).attr('href');

    // target element
    var $id = $(id);
    if ($id.length === 0) {
        return;
    }

    // prevent standard hash navigation (avoid blinking in IE)
    e.preventDefault();

    // top position relative to the document
    var pos = $id.offset().top;

    // animated top scrolling
    $('body, html').animate({scrollTop: pos});
});

function refresh_list(){

  var dataArray={};
  dataArray['page_position'] = page_position;
  dataArray['results_per_page'] = results_per_page;

  // get content page
  $.when(callAjaxPost_Array(dataArray, 'landing_photolist')).then(function(response){
    // console.log(response);
    //sesuai semua hasil
    for (var i = 0; i < response['data']['data'].length;) {
      var temp_template = list_template.clone();
      //per row
      for (var j = 0; j < result_per_row; j++) {
          // isi data per card
          var content_template = $('#content_template').clone();

          if (response['data']['data'][i]) {
            var encoded_response = JSON.stringify(response['data']['data'][i]);
            content_template.find('.card-img-top').attr('src',response['data']['data'][i]['link']);
            content_template.find('#photo_link').attr('onclick','profile_info('+encoded_response+')');
            content_template.find('.card-title').html(response['data']['data'][i]['title']);

            temp_template.append(content_template);
            i++;
          }else{
            break;
          }

      }
      photo_list.append(temp_template);
    }
    page_position++;
  });

}
refresh_list();

function profile_info(data){
  $("#creator_link").attr('href',base_url+'fams/'+data['username']);
  $("#modal_image").attr('src',data['link']);
}
