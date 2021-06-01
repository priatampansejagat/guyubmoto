
  <nav class="navbar sticky-top navbar-expand-lg navbar-light py-1 shadow-sm" style="background-color: white; position: sticky;">

    <div class="container" >
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url().LOGO_URL; ?>" width="30" height="30" class="d-inline-block align-top" alt="">
        Guyubmoto
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <div class="container-fluid">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Home <span class="sr-only"></span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Course <span class="sr-only"></span></a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Event <span class="sr-only"></span></a>
            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Family
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">About Us</a>
                <a class="dropdown-item" href="#">Our Family</a>
                <a class="dropdown-item" href="#">Hire</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Join</a>
              </div>
            </li>

          </ul>

          <div class="topnav-right">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url()."/auth"; ?>">Family Area <span class="sr-only"></span></a>
              </li>
            </ul>
          </div>

        </div>

      </div>

    </div>

  </nav>
