<div class="container my-5">
  <div class="row justify-content-md-end ">
    <div class="col col-5">

      <div class="card">
        <h5 class="card-header qliq-card-header">Create an account for free</h5>
        <div class="card-body">

          <div id="regisConfirm_input">
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

            <button onclick="doRegis(this)" class="btn btn-primary" id="regisConfirm">Submit</button>

            <hr/>
            <a href="<?php echo base_url()."/auth/login"; ?>" > Already have an account? </a>

          </div>

        </div>
      </div>

    </div>
  </div>
</div>
