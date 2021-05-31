<div class="container my-5">
  <div class="row justify-content-md-center ">
    <div class="col col-5">

      <div class="card">
        <h5 class="card-header qliq-card-header">Enter your username to receive a temporary password</h5>
        <div class="card-body text-center">

          <form action="<?php echo base_url();?>/auth/reset_passwordConfirm" method="POST">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username">
            </div>

            <button type="submit" class="btn btn-secondary ">Submit</button>
            <hr/>
            <a href="<?php echo base_url()."/auth/login"; ?>" > Back to login </a>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
