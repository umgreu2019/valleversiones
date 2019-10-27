  <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent fixed-top wow slideInDown delay-1s  mt-2">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand text-primary" href="#pablo"> <b>PUESTO: <?php echo " ".$puesto; ?></b></a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="#?" id="cambiartema">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification" id="count">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" id="dropdownmenu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">
                    <div class="row">
                      <div class="col-md-12"><strong>You have 5 new tasks</strong></div>
                      <div class="col-md-12"><small><em>Experiencia en 2 minutos 1201</em></small></div>
                      <div class="dropdown-divider"></div>
                      <div class="col-md-12 text-center mt-2"><small class="font-weight-bold">Hoy 2019 10:14 AM</small></div>
                    </div>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="#"><i class="material-icons">account_balance_wallet</i><?php echo " ".$nombre." ".$apellido." ";?></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="logout"><i class="material-icons">power_settings_new</i>Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

