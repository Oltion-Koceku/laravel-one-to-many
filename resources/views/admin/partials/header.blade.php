<header>

    <nav class="navbar">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#">Brand</a>


          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
            <span class="text-white"><i class="fa-solid fa-bars"></i></span>
          </button>



          <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
              <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
              <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
              <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('home') }}">Vai in Pagina</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('admin.home') }}">Home</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
              </ul>
              <form class="d-flex mt-3" action="{{ route('logout') }}" method="POST" role="search">
                @csrf
                <button class="btn btn-danger " type="submit"><i class="fa-solid fa-right-from-bracket"></i></button>
                <p class="pt-2 px-2 ">{{ Auth::user()->name }}</p>
              </form>
            </div>
          </div>
        </div>
      </nav>

</header>
