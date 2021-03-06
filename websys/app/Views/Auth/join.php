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
        <div class="row justify-content-md-end ">
          <div class="col col-5">

            <div class="card">
              <h5 class="card-header qliq-card-header">Create an account for free</h5>
              <div class="card-body">

                <div id="joinConfirm_input">

                  <div id="message"></div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="ulangi_password">Ulangi Password</label>
                    <input type="password" class="form-control" id="ulangi_password" name="ulangi_password" placeholder="Ulangi Password">
                  </div>
                  <hr/>
                  <div class="form-group">
                    <label for="instagram">Instagram link or username</label>
                    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="Instagram">
                  </div>
                  <div class="form-group">
                    <label for="portfolio">Or another portfolio link</label>
                    <input type="text" class="form-control" id="portfolio" name="portfolio" placeholder="Portfolio">
                  </div>

                  <div class="form-group">
                    <p class="font-italic font-weight-light">Dengan menekan tombol Next, berarti menyetujui <a href="<?php echo base_url()."/rules"; ?>" target="_blank"> Rules Guyubmoto</a></p>
                  </div>

                  <button onclick="doJoin(this)" class="btn btn-primary" id="joinConfirm">
                    Next
                  </button>

                  <hr/>

                  <div class="wrapper">
                    <div class="row">
                      <div class="col-8">
                        <a href="<?php echo base_url()."/auth/login"; ?>" > Already have an account? </a>
                      </div>
                      <div class="col-4 text-right">
                        <a href="<?php echo base_url(); ?>" type="button" class="btn btn-light" style="background:none; border:none;"><i class="fas fa-home"></i></a>
                      </div>
                    </div>

                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<script type = "text/javascript" src =<?php echo base_url()."/js/auth_handler.js"; ?>></script>
