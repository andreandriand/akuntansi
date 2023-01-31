<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header mt-2">
                <a class="navbar-brand text-dark text-decoration-none" href="/"><img
                        src="{{ asset('/images/logo2.png') }}" alt="Logo" width="60" />Sistem Akuntansi
                    SKPD</a>
                <a class="navbar-brand hidden" href="/"><img src="{{ asset('/images/logo2.png') }}"
                        alt="Logo" /></a>
                <a onclick="hideMenu()" id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="user-area dropdown float-right">
                    <button class="dropdown-toggle active mt-2 px-3 bg-light" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <h6 class="text-dark">{{ Auth::user()->name }}</h6>
                    </button>

                    <div class="user-menu dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form class="mt-3" action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger btn-sm" type="submit" name="logout">Keluar</button>
                        </form>
                    </div>
                </div>
                {{-- <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Dropdown
                    </button>
                    <ul class="dropdown-menu">
                        <li><button class="dropdown-item" type="button">Action</button></li>
                        <li><button class="dropdown-item" type="button">Another action</button></li>
                        <li><button class="dropdown-item" type="button">Something else here</button></li>
                    </ul>
                </div> --}}
            </div>
        </div>
    </header>
    <!-- /#header -->
</div>
