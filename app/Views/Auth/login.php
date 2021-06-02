<style>

.bg {
  /* The image used */
  background-image: url("<?php echo base_url().'/assets/img/auth/'. rand(2, 10) .'.jpg'; ?>");

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

        <!-- <div class="row justify-content-md-start ">
          <a class="btn btn-outline-dark" href="<?php echo base_url(); ?>">Home <span class="sr-only"></span></a>
        </div> -->

        <div class="row justify-content-md-end ">
          <div class="col col-5">
            <div class="card">
              <h5 class="card-header qliq-card-header">Sign in to your Guyubmoto account</h5>
              <div class="card-body">

                <div id="loginConfirm_input">

                  <?php
                    if (isset($regis_header)) {
                      if (isset($regis_message)) {
                        if ($status == 'sukses') {

                          ?>

                          <div id="message-flash">

                            <div class="alert alert-success" role="alert">
                              <h5 class="alert-heading"><?php echo $regis_header; ?></h5>
                              <p><?php echo $regis_message; ?></p>
                            </div>

                          </div>

                          <?php

                        }else{
                          ?>
                          <div id="message-flash">

                            <div class="alert alert-danger" role="alert">
                              <h5 class="alert-heading"><?php echo $regis_header; ?></h5>
                              <p><?php echo $regis_message; ?></p>
                            </div>

                          </div>
                          <?php
                        }
                      }
                    }
                  ?>


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

                <button onclick="doLogin(this)" class="btn btn-primary" id="loginConfirm">Login</button>

                <a href="<?php echo base_url()."/auth/reset_password"; ?>" > Forgot password? </a>
                <hr/>

                Want to be part of the family? <a href="<?php echo base_url()."/auth/join"; ?>" > Join </a>

              </div>
            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

<script type = "text/javascript" src =<?php echo base_url()."/js/auth_handler.js"; ?>></script>
