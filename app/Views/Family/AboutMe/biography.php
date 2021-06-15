
<div class="container">
    <div id="content">
      <input type="hidden" id="user_id" value="<?php echo $_SESSION['data_login']['user_id'];?>">
      <form>

        <div class="row">
          <div class="col-4">

            <div class="card mb-5">
              <img id="profile_pic_prev" class="card-img-top" src="" alt="Card image">
              <input type="file" id="profile_pic" name="profile_pic" hidden>

              <div class="card-body">
                <h4 id="profile_name_prev" class="card-title"></h4>

                <div class="form-group">
                  <input type="number" class="form-control" id="profile_phone" name="profile_phone" placeholder="+62 ">
                </div>

                <div class="form-group">
                  <textarea placeholder="tell us about you" class="form-control" id="profile_biography" name="profile_biography" rows="3"></textarea>
                </div>

                <input type="number" class="form-control col-4 mb-3" id="profile_age" name="profile_age" placeholder="your age">

                <fieldset class="form-group">
                  <div class="row">
                    <div class="col-sm-6">

                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="profile_gender" id="profile_gender_m" value="male" checked>
                        <label class="form-check-label" for="profile_gender_m">
                          Male
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="profile_gender" id="profile_gender_f" value="female">
                        <label class="form-check-label" for="profile_gender_f">
                          Female
                        </label>
                      </div>

                    </div>

                  </div>
                </fieldset>

                <a class="btn btn-danger" target="_blank" href="<?php echo base_url().'/fams/'.$_SESSION['data_login']['username']; ?>"><i class="fa fa-eye" aria-hidden="true"></i> Preview</a>

              </div>

            </div>
          </div>

          <div class="col-8">
            <div class="form-row">

              <div class="form-group col-md-4">
                <label>First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="your first name">
              </div>

              <div class="form-group col-md-4">
                <label>Middle Name</label>
                <input type="text" class="form-control" id="middle_name" name="middle_name" placeholder="your middle name">
              </div>

              <div class="form-group col-md-4">
                <label>Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="your last name">
              </div>

            </div>

            <div class="form-group">
              <label for="profile_email">Your eMail</label>
              <input type="email" class="form-control" id="profile_email" name="profile_email" placeholder="example: goku@dgball.com">
            </div>
            <div class="form-group">
              <label for="profile_address">Address</label>
              <input type="text" class="form-control" id="profile_address" name="profile_address" placeholder="complete address">
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="profile_city">City</label>
                <input type="text" class="form-control" id="profile_city" name="profile_city" placeholder="your city">
              </div>

              <div class="form-group col-md-4">
                <label for="profile_country">Country</label>
                <input type="text" class="form-control" id="profile_country" name="profile_country" placeholder="your country">
              </div>
            </div>

            <div class="form-group">
              <label for="profile_instagram">Instagram</label>
              <input type="text" class="form-control" id="profile_instagram" name="profile_instagram" placeholder="Your instagram profile link">
            </div>
            <div class="form-group">
              <label for="profile_portfolio">Another portfolio</label>
              <input type="text" class="form-control" id="profile_portfolio" name="profile_portfolio" placeholder="Your another portfolio link">
            </div>

          </div>

        </div>

      </form>

    </div>
</div>

<script>

$('#profile_pic_prev').click(function(){
  $('#profile_pic').click();
  $('#profile_pic_prev').css("-webkit-filter", "blur(2px)");
});

$('#profile_pic').on('change',function(){

  var formData =  new FormData();

  var files = $('#profile_pic')[0].files;

  formData.append('file_var' , 'picture_profile');
  formData.append('picture_profile' , files[0]);
  formData.append('url' , api_url['updateProfilePic']);
  formData.append('login_id' , $("#user_id").val());

  $.when(callAjaxPost_file_formdata(formData)).then(function(response){
    var decoded_data = JSON.parse(response);
    if (decoded_data['data']['status'] == 'success') {
      $('#profile_pic_prev').attr('src',decoded_data['data']['data']);
    }

    $('#profile_pic_prev').css("-webkit-filter", "blur(0px)");

  });


});

$('#first_name').change(function() {
  $('#profile_name_prev').html($('#first_name').val()+' '+$('#middle_name').val()+' '+$('#last_name').val());
  update_data();

});

$('#middle_name').change(function() {
  $('#profile_name_prev').html($('#first_name').val()+' '+$('#middle_name').val()+' '+$('#last_name').val());
  update_data();

});

$('#last_name').change(function() {
  $('#profile_name_prev').html($('#first_name').val()+' '+$('#middle_name').val()+' '+$('#last_name').val());
  update_data();

});

$('#profile_biography').change(function(){
  update_data();

});

$('#profile_age').change(function(){
  update_data();

});

$('input[name="profile_gender"]').change(function(){
  update_data();

});

$('#profile_email').change(function(){
  update_data();

});

$('#profile_phone').change(function(){
  update_data();

});

$('#profile_city').change(function(){
  update_data();

});

$('#profile_country').change(function(){
  update_data();

});

$('#profile_instagram').change(function(){
  update_data();

});

$('#profile_portfolio').change(function(){
  update_data();
});

function update_data(){
  var dataArray={};
  dataArray['login_id'] = $("#user_id").val();
  dataArray['first_name'] = $("#first_name").val();
  dataArray['mid_name'] = $("#middle_name").val();
  dataArray['last_name'] = $("#last_name").val();
  dataArray['age'] = $("#profile_age").val();
  dataArray['gender'] = $('input[name="profile_gender"]:checked').val();
  dataArray['email'] = $("#profile_email").val();
  dataArray['phone_number'] = $("#profile_phone").val();
  dataArray['biography'] = $("#profile_biography").val();
  dataArray['address'] = $("#profile_address").val();
  dataArray['city'] = $("#profile_city").val();
  dataArray['country'] = $("#profile_country").val();
  dataArray['instagram'] = $("#profile_instagram").val();
  dataArray['portfolio'] = $("#profile_portfolio").val();

  // console.log(JSON.stringify(dataArray));
  $.when(callAjaxPost_Array(dataArray, 'updateBio')).then(function(response){
  });

}


function refresh_data(){
  var dataArray={};
  dataArray['login_id'] = $("#user_id").val();

  $.when(callAjaxPost_Array(dataArray, 'refreshBio')).then(function(response){
    var data_user = response['data']['data']['data_personal_data'];
    $("#first_name").val(data_user['first_name']);
    $("#middle_name").val(data_user['mid_name']);
    $("#last_name").val(data_user['last_name']);
    $("#profile_age").val(data_user['age']);
    $("#profile_email").val(data_user['email']);
    $("#profile_phone").val(data_user['phone_number']);
    $("#profile_biography").val(data_user['biography']);
    $("#profile_address").val(data_user['address']);
    $("#profile_city").val(data_user['city']);
    $("#profile_country").val(data_user['country']);
    $("#profile_instagram").val(data_user['instagram']);
    $("#profile_portfolio").val(data_user['portfolio']);
    if (data_user['gender'] == 'male') {
      $("#profile_gender_m").prop("checked", true);
    }else if (data_user['gender'] == 'female') {
      $("#profile_gender_f").prop("checked", true);
    }

    if (data_user['picture_profile'] != '') {
      $('#profile_pic_prev').attr('src',data_user['picture_profile']);
    }else {
      $('#profile_pic_prev').attr('src',"<?php echo base_url().'/assets/img/auth/'. rand(2, 10) .'.jpg'; ?>");
    }
  });
}
refresh_data();
</script>
