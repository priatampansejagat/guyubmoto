<link rel="stylesheet" href="<?php echo base_url().'/css/sidebar.css'; ?>">

<style>
.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 10%;
    transform: translateY(-50%);
}
</style>


<div class="wrapper">
  <nav id="sidebar">

      <div class="sidebar-header">
          <ul class="navbar-nav mr-auto">

          </ul>

          <div class="topnav-right sidebarCollapse_sidebar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">

                <button type="button" id="sidebarCollapse" class="btn btn-info ">
                    <i class="fas fa-align-left"></i>
                    <span></span>
                </button>

              </li>
            </ul>
          </div>

          <div class="topnav-right brand_button_sidebar">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">

                <a href="#">
                  <img src="<?php echo base_url().LOGO_URL; ?>" width="40" height="40" alt="">
                </a>

              </li>
            </ul>
          </div>

      </div>

      <ul class="list-unstyled components">
          <p>Hello There</p>

          <li>
              <a href="<?php base_url().'/family/home' ?>">Dashboard</a>
          </li>

          <li>
              <a href="#MyWorks" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                My Works
              </a>
              <ul class="collapse list-unstyled" id="MyWorks">
                  <li>
                      <a href="<?php base_url().'/family/myworks/photography' ?>">Photography</a>
                  </li>
              </ul>
          </li>

          <li>
              <a href="#">Blog</a>
          </li>
          
          <li>
              <a href="#MyStore" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">My Store</a>
              <ul class="collapse list-unstyled" id="MyStore">
                  <li>
                      <a href="#">Photography</a>
                  </li>
                  <li>
                      <a href="#">Presets</a>
                  </li>
                  <li>
                      <a href="#">Prints</a>
                  </li>
              </ul>
          </li>

          <li>
              <a href="#Sharing" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Sharing</a>
              <ul class="collapse list-unstyled" id="Sharing">
                  <li>
                      <a href="#">Sharing Time</a>
                  </li>
                  <li>
                      <a href="#">Course</a>
                  </li>

              </ul>
          </li>

          <li>
              <a href="#Learning" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Learning</a>
              <ul class="collapse list-unstyled" id="Learning">
                  <li>
                      <a href="#">Let's Grow Up!</a>
                  </li>
                  <li>
                      <a href="#">My Study</a>
                  </li>

              </ul>
          </li>

          <li>
              <a href="#MyStore" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">About Me</a>
              <ul class="collapse list-unstyled" id="MyStore">
                  <li>
                      <a href="#">Biography</a>
                  </li>
                  <li>
                      <a href="#">Contact</a>
                  </li>
                  <li>
                      <a href="#">Dll</a>
                  </li>
              </ul>
          </li>

          <li>
              <a href="#">Settings</a>
          </li>
      </ul>


  </nav>


  <!-- <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button type="button" id="sidebarCollapse" class="btn btn-info">
            <i class="fas fa-align-left"></i>
            <span></span>
        </button>
      </nav>
    </div> -->
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        $('#sidebarCollapse_topbar').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        // if ($(window).width() >=768) {
        //   $(".brand_button_sidebar").hide();
        // }
    });
</script>
