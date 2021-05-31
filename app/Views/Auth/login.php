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

<script type = "text/javascript" src =<?php echo base_url()."/js/auth_handler.js"; ?>></script>
