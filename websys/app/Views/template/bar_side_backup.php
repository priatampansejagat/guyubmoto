
    <div class="wrapper">
      <nav id="sidebar">


          <div class="sidebar-header">
              <h3>Guyubmoto</h3>
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

          <ul class="list-unstyled CTAs">
              <li>
                  <a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a>
              </li>
              <li>
                  <a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a>
              </li>
          </ul>


      </nav>


      <div id="content">

          <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">

                  <button type="button" id="sidebarCollapse" class="btn btn-info">
                      <i class="fas fa-align-left"></i>
                      <span></span>
                  </button>
                  <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <i class="fas fa-align-justify"></i>
                  </button>

              </div>
          </nav>


        </div>
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
    });
</script>
