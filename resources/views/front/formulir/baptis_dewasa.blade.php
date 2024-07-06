<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo gki sulsel.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="{{ asset('front/asset/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/Detailform.css') }}" />

    <title>GKI SulSel Pos Tigaraksa</title>
</head>

<body>
    <nav class="nav_atas" style="background-color: #327e3f">
        <div class="info_social container my-1">
            <a class="" href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-whatsapp" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-youtube-play" aria-hidden="true"></i>
            </a>
            <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
            </a>
        </div>
    </nav>

    <!-- Nav & Hero -->
    <div class="container">
        <div class="card custom-card my-4 navbar-dark">
            <!-- Nav -->
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
                            <a class="nav-link " href="{{ route('front.index') }}">Home
                                <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('front.about') }}"> About</a>
                        </li>

                        <li class=" nav-item">
                            <a class="nav-link" href="{{ route('front.warta') }}">Warta</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle font-weight-bold" href="#" id="navbarDropdown" role="button"
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
            <!-- End Nav -->
            <div
                style="
              background-image: url({{ asset('front/asset/img/hero/hero123.png') }});
              background-size: cover;
              border-bottom-left-radius: 20px;
              border-bottom-right-radius: 20px;
              height: 200px;
            ">
            </div>
        </div>
    </div>
    <!-- End Nav & Hero -->

    <div id="FormDaftar" class="container my-5">
        <div class="card custom-card">
            <div class="p-5">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir Baptis Dewasa
                        </li>
                    </ol>
                </nav>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif


                <div class="card p-3">
                    <form action="{{ route('formulir.baptisDewasa.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <h5 class="card-title">Formulir Baptis Dewasa</h5>
                        <hr />


                        <div class="form-group d-flex justify-content-between">
                            <label for="nama">Masukkan Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" required
                                placeholder="Enter Nama Anak " />
                            @error('nama')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="alamat" id="form-pilih">Masukkan Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>

                            @error('alamat')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="nomor_hp">Masukkan Nomor HP</label>
                            <input type="number" class="form-control" name="nomor_hp" id="nomor_hp" required
                                placeholder="Enter Nomor HP " />

                            @error('nama_anak')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>




                        <div class="form-group d-flex justify-content-between">
                            <label for="tempat_lahir">Masukkan Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="Masukantempat_lahir"
                                required placeholder="Enter  Tempat Lahir " />
                        </div>
                        @error('tempat_lahir')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror

                        <div class="form-group d-flex justify-content-between">
                            <label for="tanggal_lahir">Masukkan Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required
                                placeholder="Enter  Tempat Lahir " />
                            @error('tanggal_lahir')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>


                        <div class="form-group d-flex justify-content-between">
                            <label for="akte_kelahiran">Scan Akte Kelahiran</label>
                            <input type="file" class="form-control-file" name="akte_kelahiran" id="akte_kelahiran"
                                required accept="application/pdf/png/jpg" />
                            @error('akte_kelahiran')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group d-flex justify-content-between">
                            <label for="pas_foto">Pas Foto ( 3 X 4 )</label>
                            <input type="file" class="form-control-file" name="pas_foto" id="pas_foto" required
                                accept="application/pdf/png/jpg" />
                            @error('pas_foto')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="d-flex justify-content-between">
                            <a class="btn btn-danger" href="{{ route('front.index') }}">Batal</a>
                            <button id="btnSubmit" type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Form Daftar -->

    @include('layouts.front.footer')
</body>

</html>
