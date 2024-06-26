<header>

    <nav class="navbar h-100">
        <div class="container-fluid ">
            <?php
            if (Auth::check()) {
                $user = Auth::user();

                $firstLetter = Str::substr($user->name, 0, 1);
                $lastLetter = Str::substr($user->name, -1, 1);

                $iniziali = $firstLetter . $lastLetter;
            }

            ?>
            @if (Auth::check())
                <div class="circle">
                    {{ $iniziali }}
                </div>
            @else
                <div class="h-100 d-flex align-items-center ">
                    <h5 class="text-white"><i class="fa-solid fa-user"></i>
                        Guest</h5>
                </div>
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="text-white"><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
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
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">Project</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>

                    {{-- Auth::check() restituisce true o false, se sono logggato o meno --}}
                    @if (Auth::check())
                        <form class="d-flex mt-3" action="{{ route('logout') }}" method="POST" role="search">
                            @csrf
                            <button class="btn btn-danger " type="submit"><i
                                    class="fa-solid fa-right-from-bracket"></i></button>
                            <p class="pt-2 px-2 ">{{ Auth::user()->name }}</p>
                        </form>
                    @else
                        <form class="d-flex mt-3" action="{{ route('login') }}" method="GET" role="search">
                            @csrf
                            <button class="btn btn-success  " type="submit"><i
                                    class="fa-solid fa-right-to-bracket"></i></button>
                        </form>
                    @endif


                </div>
            </div>
        </div>
    </nav>

</header>
