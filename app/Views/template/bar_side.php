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

          <li class="active">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                  <li>
                      <a href="#">Home 1</a>
                  </li>
                  <li>
                      <a href="#">Home 2</a>
                  </li>
                  <li>
                      <a href="#">Home 3</a>
                  </li>
              </ul>
          </li>

          <li>
              <a href="#">About</a>
          </li>

          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                  <li>
                      <a href="#">Page 1</a>
                  </li>
                  <li>
                      <a href="#">Page 2</a>
                  </li>
                  <li>
                      <a href="#">Page 3</a>
                  </li>
              </ul>
          </li>
          <li>
              <a href="#">Portfolio</a>
          </li>
          <li>
              <a href="#">Contact</a>
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
