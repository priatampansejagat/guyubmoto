
</style>
<div class="container-fluid">
  <div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
      <h1 class="display-4 font-weight-bold  mb-4">Gallery-nya <span style="color:#FE4A49;">photographers!</span></h1>
      <p class="lead font-weight-normal">Yuk explore para photographer di keluarga kami. Dukung mereka dengan memakai jasa atau membeli karyanya. <span class="font-weight-bold font-italic" style="color:#FE4A49;">Dapatkan kolaborasi hebatmu.</span> </p>
      <a class="btn btn-outline-danger" href="#album">Start from here</a>
    </div>
  </div>
</div>


<div class="album bg-light" id="album">
  <div class="container">
    <div class="row" id="photo_list">


    </div>
  </div>
</div>

<div class="row">

    <!-- <div id="deck_list">
      <div id="photo_list" class="w-100"></div>
    </div> -->

    <div style="display:none;">
      <div class="card-deck mb-4" id="list_template"></div>

      <div class="card" id="content_template" >
          <img class="card-img-top" src="" alt="Card image cap" style="height:100%;object-fit: cover;">
          <div class="card-img-overlay">
            <button href="#" id="photo_link" data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-primary stretched-link" style="background:none;border:none;color:none;"><i class="fa fa-search-plus" aria-hidden="true"></i></button>
          </div>
      </div>
    </div>

</div>


<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <img id="modal_image" src="">
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" id="creator_link" target="_blank" type="button" class="btn btn-danger">Visit Creator</a>
      </div>
    </div>
  </div>
</div>

<script type = "text/javascript" src =<?php echo base_url()."/js/landing_page.js"; ?>></script>
