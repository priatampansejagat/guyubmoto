<style>
body, html {
  height: 100%;
  margin: 0;
}

.bg {
  /* The image used */
  background-image: url("<?php echo base_url().'/assets/img/login/'. rand(2, 10) .'.jpg'; ?>");

  /* Full height */
  height: 100%;

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}
</style>
<div class="bg">
  <div class="container-liquid">

    <div class="row">
      <div class="container my-5">
        <div class="row justify-content-md-end ">
          <div class="col col-5">
            <div class="card">
              <h5 class="card-header qliq-card-header">Sign in to your Guyubmoto account</h5>
              <div class="card-body">

                <div id="loginConfirm_input">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" id="keep_login" name="keep_login">
                    <label class="form-check-label" for="keep_login">Keep me login</label>
                  </div>
                </div>

                <button onclick="doLogin(this)" class="btn btn-primary" id="loginConfirm">Submit</button>

                <a href="<?php echo base_url()."/auth/reset_password"; ?>" > Forgot password? </a>
                <hr/>
                Don't have an account? <a href="<?php echo base_url()."/auth/register"; ?>" > Create one </a>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
