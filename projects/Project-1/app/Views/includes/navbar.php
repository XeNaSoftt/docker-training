

<div class="superNav border-bottom py-2 bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 centerOnMobile">
            <span class="d-none d-lg-inline-block d-md-inline-block d-sm-inline-block d-xs-none me-3"><strong>boraardaavci@gmail.com</strong></span>
<!--            <span class="me-3"> <strong>B-Arda</strong></span>-->
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 d-none d-lg-block d-md-block-d-sm-block d-xs-none text-end">
            <span class="me-3"><a class="text-muted" href="https://github.com/bora-arda">Github</a></span>
            <span class="me-3"><a class="text-muted" href="https://www.linkedin.com/in/bora-arda-avci/">Linkedin</a></span>
          </div>
        </div>
      </div>
</div>
<nav class="navbar navbar-expand-lg bg-white sticky-top navbar-light p-3 shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="/"><i class="fa-solid fa-shop me-2"></i> <strong>Nutrition Town</strong></a>
      <?php if(isset($_SESSION['USER'])): ?>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="mx-auto my-3 d-lg-none d-sm-block d-xs-block">
      <div class="input-group">
        <input type="text" class="form-control border-dark" style="color:#7a7a7a">
        <button class="btn btn-dark text-white">Search</button>
      </div>
    </div>
    <div class=" collapse navbar-collapse" id="navbarNavDropdown">
      <div class="ms-auto d-none d-lg-block">
        <div class="input-group">
          <input type="text" class="form-control border-black" style="color:#7a7a7a">
          <button class="btn btn-dark text-white">Search</button>
        </div>
      </div>

      <ul class="navbar-nav ms-auto ">
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" aria-current="page" href="home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="#">Recipes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="#">Discover</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="#">Calorie Calculator</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="#">Pick for me</a>
        </li>
          <?php endif; ?>
      </ul>
      <ul class="navbar-nav ms-auto ">
          <?php if(!isset($_SESSION['USER'])): ?>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link mx-2 text-black fw-bold" href="signup">Signup</a>
        </li>
          <?php endif; ?>
          <?php if(isset($_SESSION['USER'])): ?>
              <li class="nav-item me-3 me-lg-0 dropdown">
                <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="outline: none; box-shadow: none; border: none;">
                    <i class="fa-solid fa-user fa-lg" style="color: #000000;"></i>
                  </button>
                  <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Basket</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout">Logout</a></li>
                  </ul>
              </li>
           <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>