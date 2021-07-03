<div class="container my-5">
  <div class="row justify-content-md-center ">
    <div class="col col-5">

      <div class="card">
        <h5 class="card-header qliq-card-header">Enter your username to receive a temporary password</h5>
        <div class="card-body text-center">

          <div class="alert alert-danger" role="alert" hidden id="alert_reset">
            <h5 class="alert-heading">Reset password, failed</h5>
            <p>Please contact our admin at temancreator@guyubmoto.com</p>
          </div>
          <div class="alert alert-success" role="alert" hidden id="alert_reset_success">
            <h5 class="alert-heading">Reset password, Success</h5>
            <p>Please check your email</p>
          </div>

          <div class="form-group">
            <input type="text" class="form-control" id="username" name="username" placeholder="Username">
          </div>

          <button type="button" onclick="reset_password()" id="button_reset" class="btn btn-secondary ">Reset</button>
          <hr/>
          <a href="<?php echo base_url()."/auth/login"; ?>" > Back to login </a>

        </div>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">

  function reset_password(){
    var r = confirm("Reset Password?");
    if (r == true) {

      $('#button_reset').prop( "disabled", true );
      $('#button_reset').html(
        '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please wait...'
      );

      var dataArray={};
      dataArray['username'] = $("#username").val();

      $.when(callAjaxPost_Array(dataArray, 'resetConfirm')).then(function(response){
        console.log(response);
        if (response['data']['status'] == 'success') {

          $('#alert_reset_success').prop( "hidden", false );

        }else{
          $('#alert_reset').prop( "hidden", false );
        }

        $('#button_reset').prop( "disabled", false );
        $('#button_reset').html(
          'Reset'
          );

      });

    }
  }


</script>
