
<div class="position-relative overflow-hidden p-3 p-md-5 bg-light">
  <div class="col-md-10 p-lg-3 mx-auto my-5">

    <input type="hidden" id="username" value="<?php echo $username;?>">

    <div class="row">
      <div class="col-5">

        <div class="card mb-5">
          <img id="profile_pic_prev" class="card-img-top" src="" alt="Card image">

          <div class="card-body">
            <i><h4 id="profile_name_prev" class="card-title"></h4></i>

            <div class="form-group">
              <p class="card-text" id="profile_phone"></p>
            </div>


            <div class="row">
              <div class="col-sm-3">
                Age
              </div>:
              <div class="col-sm-3">
                <p class="card-text" id="profile_age"></p>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-3">
                Gender
              </div>:
              <div class="col-sm-3">
                <p class="card-text " id="profile_gender"></p>
              </div>

            </div>
            <div class="row">
              <div class="col-sm-3">
                Email
              </div>:
              <div class="col-sm-8">
                <p class="card-text " id="profile_mail"></p>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-3">
                Address
              </div>:
              <div class="col-sm-8">
                <p class="card-text " id="profile_address"></p>
              </div>

            </div>

            <div class="row">
              <div class="col-sm-3">
                City
              </div>:
              <div class="col-sm-8">
                <p class="card-text " id="profile_city"></p>
              </div>

            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                Country
              </div>:
              <div class="col-sm-8">
                <p class="card-text " id="profile_country"></p>
              </div>

            </div>




            <div class="btn-group" role="group" aria-label="Basic example">

              <!-- Call -->
              <a href="<?php echo base_url(); ?>" type="button" class="btn btn-light" style="background:none; border:none;"><i class="fas fa-home"></i></a>
              <!-- go to store -->
              <a href="<?php echo base_url(); ?>" type="button" class="btn btn-light" style="background:none; border:none;"><i class="fas fa-home"></i></a>
              <!-- portfolio -->
              <a href="<?php echo base_url(); ?>" type="button" class="btn btn-light" style="background:none; border:none;"><i class="fas fa-home"></i></a>

            </div>
          </div>

        </div>
      </div>

      <div class="col-7">

        <div class="form-group">
          <label>Biography</label>
          <p class="card-text " id="profile_bio"></p>
        </div>

        <div class="form-group">
          <label for="profile_instagram">Instagram</label>
          <div class="input-group">
            <input type="text" class="form-control" id="profile_instagram"  disabled>
            <div class="input-group-append">
              <a target="_blank" href="#" class="btn btn-outline-secondary">Visit</a>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label for="profile_instagram">Another portfolio</label>
          <div class="input-group">
            <input type="text" class="form-control" id="profile_portfolio" disabled>
            <div class="input-group-append">
              <a target="_blank" href="#" class="btn btn-outline-secondary">Visit</a>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
</div>

<script type="text/javascript">
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

function refresh_data(){
  var dataArray={};
  dataArray['username'] = $("#username").val();

  $.when(callAjaxPost_Array(dataArray, 'get_fams_member')).then(function(response){
    var data_user = response['data']['data']['data_personal_data'];
    // console.log(response);
    $("#profile_name_prev").html(data_user['first_name']+' Tetangga sebelah');
    // $("#profile_name_prev").html(data_user['first_name']+' '+data_user['mid_name']+' '+data_user['last_name']);
    $("#profile_age").html(data_user['age']);
    $("#profile_mail").html(data_user['email']);
    $("#profile_phone").html(data_user['phone_number']);
    $("#profile_bio").html(data_user['biography']);
    $("#profile_address").html(data_user['address']);
    $("#profile_city").html(data_user['city']);
    $("#profile_country").html(data_user['country']);
    $("#profile_instagram").val(data_user['instagram']);
    $("#profile_portfolio").val(data_user['portfolio']);
    $("#profile_gender").html(data_user['gender']);

    if (data_user['picture_profile'] != '') {
      $('#profile_pic_prev').attr('src',data_user['picture_profile']);
    }else {
      $('#profile_pic_prev').attr('src',"<?php echo base_url().'/assets/img/auth/'. rand(2, 10) .'.jpg'; ?>");
    }
  });
}
refresh_data();

// function copySource(source){
//   var copyText = document.getElementById('profile_portfolio');
//   copyText.select();
//   copyText.setSelectionRange(0, 99999);
//   document.execCommand("copy");
// }
</script>
