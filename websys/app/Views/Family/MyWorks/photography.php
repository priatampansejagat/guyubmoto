
<div class="container">
    <div id="content">

      <div id="uploadPhoto_input">
        <input type="hidden" id="user_id" name="user_id" value="<?php echo $_SESSION['data_login']['user_id']; ?>">
        <div id="accordion" >

          <div class="row">
            <div class="mb-3">
              <button type="button" class="btn btn-warning"  data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" aria-controls="collapse_1">Add Photo</button>
            </div>
          </div>

          <div class="row" >
            <div class="w-100 mb-3">
                <div id="collapse_1" class="collapse" aria-labelledby="heading_1" data-parent="#accordion" >

                  <div id="message"></div>

                  <div class="">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Title" id="photo_title" name="photo_title">

                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="uploadPhoto_file" name="uploadPhoto_file">
                        <label class="custom-file-label" for="uploadPhoto_file">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button id="uploadPhoto" onclick="uploadPhoto(this)" class="btn btn-secondary" type="button" style="background: #FF785A; border: none;">Upload</button>
                      </div>
                    </div>
                  </div>

                </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">

        <div id="deck_list">
          <div id="photo_list" class="w-100 mb-2"></div>
        </div>

        <div style="display:none;">
          <div class="card-group mb-2" id="list_template">

          </div>
          <div class="card" id="content_template">
            <img class="card-img-top" src="" alt="Card image cap" style="height:80%;object-fit: cover;">
            <div class="card-body">
              <h5 class="card-title text-left w-100">Card title</h5>
              <div class="btn-group">
                <button href="#" class="card-link" style="color:#FF785A; background:none; border:none;">delete</button>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>
</div>
<script>

var page_position = 1;
var results_per_page = 15;
var result_per_row = results_per_page/3;
var photo_list = $('#photo_list');
var list_template = $('#list_template').clone();

// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});



/* = = = = = P A G I N A T I O N = = = = = */

$(window).scroll(function() {
    if($(window).scrollTop() == $(document).height() - $(window).height()) {
           refresh_list();
    }
});

function refresh_list(){
  var user_id = $('#user_id').val();

  var dataArray={};
  dataArray['user_id'] = user_id;
  dataArray['page_position'] = page_position;
  dataArray['results_per_page'] = results_per_page;

  // get content page
  $.when(callAjaxPost_Array(dataArray, 'myworks_photography_list')).then(function(response){
    //sesuai semua hasil
    console.log(response);
    for (var i = 0; i < response['data']['data'].length;) {
      var temp_template = list_template.clone();
      //per row
      for (var j = 0; j < result_per_row; j++) {
          // isi data per card
          var content_template = $('#content_template').clone();

          if (response['data']['data'][i]) {
            content_template.find('.card-img-top').attr('src',response['data']['data'][i]['link']);
            content_template.find('.card-link').attr('onclick','(this).blur();delete_photo('+response['data']['data'][i]['mw_photography_id']+');');
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

function reset_list(){
  $('#photo_list').html('');
  page_position = 1;
  // refresh_list();
}

function delete_photo(photo_id){
  var conf = confirm("Hapus foto?");
  if (conf == true) {
    var user_id = $('#user_id').val();
    var dataArray={};
    dataArray['user_id'] = user_id;
    dataArray['photo_id'] = photo_id;

    $.when(callAjaxPost_Array(dataArray, 'myworks_photography_delete')).then(function(response){
      // clear and reset data
      reset_list();
      refresh_list();
    });
  }

}
/* = = = = = E N D - P A G I N A T I O N = = = = = */

function uploadPhoto(obj){
  var target_id = obj.id;
  var message ='';

  obj.disabled = true;
  $('#'+obj.id).html(
    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Uploading...'
  );

  // cek kosong
  if (!$('#photo_title').val() || $('#uploadPhoto_file')[0].files.length === 0) {

    message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"+ 'Hai, kamu harus memilih foto dan memberinya title terlebih dahulu :)' +"<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";

    $('#message').html(message);
    $('#'+obj.id).html('Upload');
    obj.disabled = false;

  }else {
      $.when(callAjaxPost(obj)).then(function(response){
        console.log(response);
        var formData =  new FormData();

        var files = $('#'+target_id+'_file')[0].files;

        formData.append('file_var' , target_id+'_file');
        formData.append(target_id+'_file' , files[0]);
        formData.append('url' , api_url[target_id+'_file']);
        formData.append('photo_id' , response['data']['photo_id']);

        // Ngirim foto
        $.when(callAjaxPost_file_formdata(formData)).then(function(response){
          $('#'+obj.id).html('Upload');
          obj.disabled = false;
          var $decoded_data = JSON.parse(response);
          if ($decoded_data['data']['status'] == 'success') {
            // clear and reset data
            $("#photo_title").val("");
            $('#'+target_id+'_file').val(null);
            $('#'+target_id+'_file').siblings(".custom-file-label").addClass("selected").html('Choose file');
            reset_list();
            refresh_list();

            // message
            message = "<div class='alert alert-success alert-dismissible fade show' role='alert'>"+ 'Selamat, karya photography kamu telah berhasil diupload!' +"<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";
            $('#message').html(message);
            $('#'+obj.id).html('Upload');
            obj.disabled = false;

          }else{

              message = "<div class='alert alert-danger alert-dismissible fade show' role='alert'>"+ 'Gagal mengupload karya photography. Periksa jaringan kamu.' +"<button type='button' class='close' data-dismiss='alert' aria-label='Close'> <span aria-hidden='true'>&times;</span> </button></div>";
              $('#message').html(message);
              $('#'+obj.id).html('Upload');
              obj.disabled = false;
          }
        });
      });
  }

}


</script>
