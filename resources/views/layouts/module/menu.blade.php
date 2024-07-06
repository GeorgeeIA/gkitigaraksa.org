<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-3" id="navbarCollapse">

          @if (!Auth::guest())
          <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">{{ Auth::user()->name }}</a>
            </li>

            <li class="nav-item dropdown">
                <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false" class="nav-link dropdown-toggle">Menu</a>
                <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                    <li><a href="{{ route('front.index') }}" class="dropdown-item">Home</a></li>
                    <li><a href="{{ route('dashboard') }}" class="dropdown-item">Dashboard</a></li>
                    <li><a href="{{ route('user.atestasi') }}" class="dropdown-item">Formulir Atestasi Keluar</a></li>
                    <li><a href="{{ route('user.atestasiMasuk') }}" class="dropdown-item">Formulir Atestasi Masuk</a></li>
                    <li><a href="{{ route('user.keanggotaan') }}" class="dropdown-item">Formulir Keterangan Keanggotaan</a>
                    </li>


                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Formulir Baptis</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow"
                            style="display: none;">
                            <li>
                                <a tabindex="-1" href="{{route("user.baptisAnak")}}" class="dropdown-item">Anak</a>
                                <a tabindex="-1" href="{{route("user.baptisDewasa")}}" class="dropdown-item">Dewasa</a>
                                <a tabindex="-1" href="{{route("user.sidi")}}" class="dropdown-item">Sidi</a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown-submenu dropdown-hover">
                        <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Formulir Pernikahan</a>
                        <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow"
                            style="display: none;">
                            <li>
                                <a tabindex="-1" href="{{route('user.nikah')}}" class="dropdown-item">Peneguhan Pernikahan</a>
                                <a tabindex="-1" href="{{route('user.izinNikah')}}" class="dropdown-item">Ijin Nikah</a>
                            </li>
                        </ul>
                    </li>

                    <li><a href="{{ route('user.NilaiAgama') }}" class="dropdown-item">Formulir Nilai Agama</a>


                </ul>
            </li>

        </ul>
          @endif


        </div>

        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">



            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"
                    role="button">
                    Logout

                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</nav>
