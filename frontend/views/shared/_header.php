<header id="header" class="site-header text-black">
    <div class="header-top border-bottom py-2">
      <div class="container-lg">
        <div class="row justify-content-evenly">
          <div class="col">
            <ul class="social-links list-unstyled d-flex m-0">
              <li class="pe-2">
                <a href="#">
                  <svg class="facebook" width="20" height="20">
                    <use xlink:href="#facebook"></use>
                  </svg>
                </a>
              </li>
              <li class="pe-2">
                <a href="#">
                  <svg class="instagram" width="20" height="20">
                    <use xlink:href="#instagram"></use>
                  </svg>
                </a>
              </li>
              <li class="pe-2">
                <a href="#">
                  <svg class="youtube" width="20" height="20">
                    <use xlink:href="#youtube"></use>
                  </svg>
                </a>
              </li>
              <li>
                <a href="#">
                  <svg class="pinterest" width="20" height="20">
                    <use xlink:href="#pinterest"></use>
                  </svg>
                </a>
              </li>
            </ul>
          </div>
          <div class="col d-none d-md-block">
            <p class="text-center text-black m-0"><strong>Special Offer</strong>: Free Shipping on all the orders above $100
            </p>
          </div>
          <div class="col">
            <ul class="d-flex justify-content-end gap-3 list-unstyled m-0">
              <li>
                <a href="#">Contact</a>
              </li>
              <li>
                <a href="#">Cart</a>
              </li>
              <li>
                <a href="#">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <nav id="header-nav" class="navbar navbar-expand-lg">
      <div class="container-lg">
        <a class="navbar-brand" href="index.html">
          <img src="images/main-logo.png" class="logo" alt="logo">
        </a>
        <button class="navbar-toggler d-flex d-lg-none order-3 border-0 p-1 ms-2" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#bdNavbar" aria-controls="bdNavbar" aria-expanded="false" aria-label="Toggle navigation">
          <svg class="navbar-icon">
            <use xlink:href="#navbar-icon"></use>
          </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="bdNavbar">
          <div class="offcanvas-header px-4 pb-0">
            <a class="navbar-brand ps-3" href="index.html">
              <img src="images/main-logo.png" class="logo" alt="logo">
            </a>
            <button type="button" class="btn-close btn-close-black p-5" data-bs-dismiss="offcanvas" aria-label="Close"
              data-bs-target="#bdNavbar"></button>
          </div>
          <div class="offcanvas-body">
            <ul id="navbar" class="navbar-nav fw-bold justify-content-end align-items-center flex-grow-1">
              <li class="nav-item dropdown">
                <a class="nav-link me-5 active dropdown-toggle border-0" href="#" data-bs-toggle="dropdown"
                  aria-expanded="false">Home</a>
                <ul class="dropdown-menu fw-bold">
                  <li>
                    <a href="index.html" class="dropdown-item">Home V1</a>
                  </li>
                  <li>
                    <a href="index.html" class="dropdown-item">Home V2 </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="#">Men</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="#">Women</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link me-5 active dropdown-toggle border-0" href="#" data-bs-toggle="dropdown"
                  aria-expanded="false">Page</a>
                <ul class="dropdown-menu fw-bold">
                  <li>
                    <a href="index.html" class="dropdown-item">About Us </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Shop </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Blog </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Single Product </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Single Post </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="index.html">Styles </a>
                  </li>
                  <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="dropdown-item">cart</a>
                  </li>
                  <li>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#modallogin" class="dropdown-item">Login</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="index.html">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link me-5" href="#">Sale</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="user-items ps-0 ps-md-5">
          <ul class="d-flex justify-content-end list-unstyled align-item-center m-0">
            <li class="pe-3">
              <a href="login" data-bs-toggle="modal" data-bs-target="#modallogin" class="border-0">
                <svg class="user" width="24" height="24">
                  <use xlink:href="#user"></use>
                </svg>
              </a>
            </li>
            <li class="pe-3">
              <a href="#" data-bs-toggle="modal" data-bs-target="#modallong" class="border-0">
                <svg class="shopping-cart" width="24" height="24">
                  <use xlink:href="#shopping-cart"></use>
                </svg>
              </a>
            </li>
            <li>
              <a href="#" class="search-item border-0" data-bs-toggle="collapse" data-bs-target="#search-box" aria-label="Toggle navigation">
                <svg class="search" width="24" height="24">
                  <use xlink:href="#search"></use>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>