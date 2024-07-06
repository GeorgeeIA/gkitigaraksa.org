<div class="header-bg">
    <header class="header_section long_section px-0">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand ml-4" href="{{ route('front.index') }}">
                <img src="{{ asset('front/asset/img/LogoGKIremove.png') }}" width="60" height="50" alt="" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link font-weight-bold" href="{{ route('front.index') }}">Home
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.about') }}"> About</a>
                        </li>

                        <li class=" nav-item">
                            <a class="nav-link" href="{{ route('front.warta') }}">Warta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Formulir
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('formulir.atestasi.index') }}">
                                    Formulir Atestasi Keluar/Pindah
                                </a>
                                <a class="dropdown-item" href="{{ route('formulir.atestasi_masuk.index') }}">
                                    Formulir Atestasi Masuk
                                </a>
                                <a class="dropdown-item" href="{{ route('formulir.keanggotaan.index') }}">
                                    Formulir Keterangan Kaanggotaan
                                </a>

                                <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Formulir Baptis
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('formulir.baptisAnak.index') }}">Baptis
                                        Anak</a>
                                    <a class="dropdown-item" href="{{ route('formulir.baptisDewasa.index') }}">Baptis
                                        Dewasa</a>
                                    <a class="dropdown-item" href="{{ route('formulir.sidi.index') }}">Sidi</a>
                                </div>

                                <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Formulir Pernikahan
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item"
                                        href="{{ route('formulir.peneguhan_nikah.index') }}">Peneguhan Pernikahan</a>
                                    <a class="dropdown-item" href="{{ route('formulir.izin_nikah.index') }}">Ijin
                                        Nikah</a>
                                </div>
                                <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Formulir Nilai Agama
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('formulir.nilaiagama.sekolah') }}">SD, SMP,
                                        SMA/K</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="quote_btn-container">
                    @if (!Auth::user())
                        <a href="{{ route('login') }}">
                            <span> Login </span>
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </a>
                    @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="display: block;">
                            <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                            role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if (Auth::user()->role == 'admin')
                                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                                    Dashboard
                                                </a>
                                            @else
                                                <a class="dropdown-item" href="{{ route('dashboard') }}">
                                                    Dashboard
                                                </a>
                                            @endif

                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header>
</div>
