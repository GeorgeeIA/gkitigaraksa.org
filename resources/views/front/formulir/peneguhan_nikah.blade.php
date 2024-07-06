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
    <style>
        #sig-canvas-pria {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }

        #sig-canvas-wanita {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }
    </style>
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
                            <img src="{{ asset('front/asset/img/LogoGKIremove.png') }}" width="60" height="50"
                                alt="" />
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
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
                                        <a class="nav-link dropdown-toggle font-weight-bold" href="#"
                                            id="navbarDropdown" role="button" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            Formulir
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('formulir.atestasi.index') }}">
                                                Formulir Atestasi Keluar/Pindah
                                            </a>
                                            <a class="dropdown-item"
                                                href="{{ route('formulir.atestasi_masuk.index') }}">
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
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.baptisAnak.index') }}">Baptis
                                                    Anak</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.baptisDewasa.index') }}">Baptis
                                                    Dewasa</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.sidi.index') }}">Sidi</a>
                                            </div>

                                            <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Formulir Pernikahan
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.peneguhan_nikah.index') }}">Peneguhan
                                                    Pernikahan</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.izin_nikah.index') }}">Ijin
                                                    Nikah</a>
                                            </div>
                                            <a class="dropdown-item dropdown-toggle" href="#" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Formulir Nilai Agama
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                    href="{{ route('formulir.nilaiagama.sekolah') }}">SD, SMP,
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
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent"
                                        style="display: block;">
                                        <div class="d-flex mx-auto flex-column flex-lg-row align-items-center">
                                            <ul class="navbar-nav">
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#"
                                                        id="navbarDropdown" role="button" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        {{ Auth::user()->name }}
                                                    </a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        @if (Auth::user()->role == 'admin')
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.dashboard') }}">
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


                                                        <form id="logout-form" action="{{ route('logout') }}"
                                                            method="POST" style="display: none;">
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
                        <li class="breadcrumb-item">
                            <a href="{{ route('front.index') }}">Home</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir Peneguhan Nikah
                        </li>
                    </ol>
                </nav>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="card p-3">
                        <form action="{{ route('formulir.peneguhan_nikah.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <h5 class="card-title">Formulir Peneguhan Nikah</h5>
                            <hr />



                            <div class="form-group d-flex justify-content-between">
                                <label for="nama">Masukkan Nama Pria</label>
                                <input type="nama_pria" class="form-control" name="nama_pria" id="nama_pria"
                                    required placeholder="Enter Nama Pria " value="{{ old('nama_pria') }}" />
                                @error('nama_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="kewarganegaraan">Masukkan Kewarganegaraan Pria</label>
                                <input type="text" class="form-control" name="kewarganegaraan_pria"
                                    id="kewarganegaraan" required placeholder="Enter Kewarganegaraan Pria "
                                    value="{{ old('kewarganegaraan_pria') }}" />
                                @error('kewarganegaraan_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="alamat_pria">Masukkan Alamat Pria</label>
                                <input class="form-control" id="alamat_pria" name="alamat_pria"
                                    placeholder="Masukan alamat_pria" value="{{ old('alamat_pria') }}" required>

                                @error('alamat_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="nomor_hp_pria">Masukkan Nomor HP</label>
                                <input type="number" class="form-control" name="nomor_hp_pria"
                                    value="{{ old('nomor_hp_pria') }}" id="nomor_hp_pria" required
                                    placeholder="Enter Nomor HP " />
                                @error('nomor_hp_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="tempat_lahir_pria">Masukkan Tempat Lahir Pria</label>
                                <input type="text" class="form-control" value="{{ old('tempat_lahir_pria') }}"
                                    name="tempat_lahir_pria" id="tempat_lahir_pria" required
                                    placeholder="Enter  Tempat Lahir Pria " />
                                @error('tempat_lahir_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="tanggal_lahir_pria">Masukkan Tanggal Lahir Pria</label>
                                <input type="date" class="form-control" value="{{ old('tanggal_lahir_pria') }}"
                                    name="tanggal_lahir_pria" id="tanggal_lahir_pria" required
                                    placeholder="Enter  Tanggal Lahir Pria " />
                                @error('tanggal_lahir_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="sidi_pria">Sidi Pria <sup class="text-danger">Lampirkan Jika bukan anggota
                                        gereja</sup></label>

                                <input type="file" class="form-control-file" name="sidi_pria" id="sidi_pria"
                                    accept="application/pdf/png/jpg" />
                                @error('sidi_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="anggota_gereja_pria">Anggota Gereja Pria</label>
                                <input type="text" class="form-control" value="{{ old('anggota_gereja_pria') }}"
                                    name="anggota_gereja_pria" id="anggota_gereja_pria" required
                                    placeholder="Enter  Anggota Gereja " />
                                @error('anggota_gereja_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="nama_ayah_pria">Nama Ayah Pria</label>
                                <input type="text" class="form-control" value="{{ old('nama_ayah_pria') }}"
                                    name="nama_ayah_pria" id="nama_ayah_pria" required
                                    placeholder="Enter  Nama Ayah " />
                                @error('nama_ayah')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="nama_ibu_pria">Nama Ibu Pria</label>
                                <input type="text" class="form-control" value="{{ old('nama_ibu_pria') }}"
                                    name="nama_ibu_pria" id="nama_ibu_pria" required
                                    placeholder="Enter  Nama Ibu Pria " />
                                @error('nama_ibu_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="foto_pria">Pas Foto Mempelai Pria ( 3 X 4 )</label>
                                <input type="file" class="form-control-file" name="foto_pria" id="foto_pria"
                                    required accept="application/pdf/png/jpg" />
                                @error('foto_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <input type="hidden" name="ttd_pria" id="sig-dataUrl-pria"
                                    value="{{ old('ttd_pria') }}" class="form-control" placeholder="Input ttd">
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <label for="group">Tanda Tangan</label>
                                <canvas id="sig-canvas-pria" height="160">

                                </canvas>
                                <img id="sig-image-pria" width="200" src="" alt="Hasil TTD" />
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <label for="ttd_pria"></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="btn btn-primary" id="sig-submitBtn-pria">Buat TTD</span>
                                        <span class="btn btn-default" id="sig-clearBtn-pria">Hapus TTD</span>
                                    </div>
                                </div>
                            </div>


                            <hr>

                            <div class="form-group d-flex justify-content-between">
                                <label for="nama">Masukkan Nama Wanita</label>
                                <input type="nama_wanita" class="form-control" name="nama_wanita" id="nama_wanita"
                                    required placeholder="Enter Nama Wanita " value="{{ old('nama_wanita') }}" />
                                @error('nama_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="kewarganegaraan">Masukkan Kewarganegaraan Wanita</label>
                                <input type="text" class="form-control" name="kewarganegaraan_wanita"
                                    id="kewarganegaraan" required placeholder="Enter Kewarganegaraan Wanita "
                                    value="{{ old('kewarganegaraan_wanita') }}" />
                                @error('kewarganegaraan_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="alamat_wanita">Masukkan Alamat Wanita</label>
                                <input class="form-control" id="alamat_wanita" name="alamat_wanita"
                                    placeholder="Masukan alamat_wanita" value="{{ old('alamat_wanita') }}" required>

                                @error('alamat_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="nomor_hp_wanita">Masukkan Nomor HP Wanita</label>
                                <input type="number" class="form-control" name="nomor_hp_wanita"
                                    value="{{ old('nomor_hp_wanita') }}" id="nomor_hp_wanita" required
                                    placeholder="Enter Nomor HP " />
                                @error('nomor_hp_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="tempat_lahir_wanita">Masukkan Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" value="{{ old('tempat_lahir_wanita') }}"
                                    name="tempat_lahir_wanita" id="tempat_lahir_wanita" required
                                    placeholder="Enter  Tempat Lahir Wanita " />
                                @error('tempat_lahir_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="tanggal_lahir_wanita">Masukkan Tanggal Lahir Wanita</label>
                                <input type="date" class="form-control" value="{{ old('tanggal_lahir_wanita') }}"
                                    name="tanggal_lahir_wanita" id="tanggal_lahir_wanita" required
                                    placeholder="Enter  Tanggal Lahir Wanita " />
                                @error('tanggal_lahir_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="sidi_wanita">Sidi Wanita <sup class="text-danger">Lampirkan Jika bukan
                                        anggota
                                        gereja</sup></label>

                                <input type="file" class="form-control-file" name="sidi_wanita" id="sidi_wanita"
                                    accept="application/pdf/png/jpg" />
                                @error('sidi_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="anggota_gereja_wanita">Anggota Gereja Wanita</label>
                                <input type="text" class="form-control"
                                    value="{{ old('anggota_gereja_wanita') }}" name="anggota_gereja_wanita"
                                    id="anggota_gereja_wanita" required placeholder="Enter  Anggota Gereja Wanita " />
                                @error('anggota_gereja_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="nama_ayah_wanita">Nama Ayah Wanita</label>
                                <input type="text" class="form-control" value="{{ old('nama_ayah_wanita') }}"
                                    name="nama_ayah_wanita" id="nama_ayah_wanita" required
                                    placeholder="Enter  Nama Ayah Wanita " />
                                @error('nama_ayah')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="nama_ibu_wanita">Nama Ibu Wanita</label>
                                <input type="text" class="form-control" value="{{ old('nama_ibu_wanita') }}"
                                    name="nama_ibu_wanita" id="nama_ibu_wanita" required
                                    placeholder="Enter  Nama Ibu Wanita " />
                                @error('nama_ibu_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="foto_wanita">Pas Foto Mempelai Wanita ( 3 X 4 )</label>
                                <input type="file" class="form-control-file" name="foto_wanita" id="foto_wanita"
                                    required accept="application/pdf/png/jpg" />
                                @error('foto_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>



                            <div>
                                <input type="hidden" name="ttd_wanita" id="sig-dataUrl-wanita"
                                    value="{{ old('ttd_wanita') }}" class="form-control" placeholder="Input ttd">
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <label for="group">Tanda Tangan</label>
                                <canvas id="sig-canvas-wanita" height="160">

                                </canvas>
                                <img id="sig-image-wanita" width="200" src="" alt="Hasil TTD" />
                            </div>

                            <div class="form-group d-flex justify-content-start">
                                <label for="ttd_wanita"></label>
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="btn btn-primary" id="sig-submitBtn-wanita">Buat TTD</span>
                                        <span class="btn btn-default" id="sig-clearBtn-wanita">Hapus TTD</span>
                                    </div>
                                </div>
                            </div>


                            <hr>

                            <div class="form-group d-flex justify-content-between">
                                <label for="tanggal_peneguhan">Tanggal Peneguhan</label>
                                <input type="date" class="form-control" value="{{ old('tanggal_peneguhan') }}"
                                    name="tanggal_peneguhan" id="tanggal_peneguhan" required
                                    placeholder="Enter  Tanggal Peneguhan " />
                                @error('tanggal_peneguhan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group d-flex justify-content-between">
                                <label for="jam_peneguhan">Jam Peneguhan</label>
                                <input type="text" class="form-control" value="{{ old('jam_peneguhan') }}"
                                    name="jam_peneguhan" id="jam_peneguhan" required
                                    placeholder="Enter  Jam Peneguhan " />
                                @error('jam_peneguhan')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group d-flex justify-content-between">
                                <label for="tempat_peneguhan">Tempat Peneguhan</label>
                                <input type="text" class="form-control" value="{{ old('tempat_peneguhan') }}"
                                    name="tempat_peneguhan" id="tempat_peneguhan" required
                                    placeholder="Enter  Tempat Peneguhan " />
                                @error('tempat_peneguhan')
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

    <script>
        (function() {
            window.requestAnimFrame = (function(callback) {
                return window.requestAnimationFrame ||
                    window.webkitRequestAnimationFrame ||
                    window.mozRequestAnimationFrame ||
                    window.oRequestAnimationFrame ||
                    window.msRequestAnimaitonFrame ||
                    function(callback) {
                        window.setTimeout(callback, 1000 / 60);
                    };
            })();

            var canvasPria = document.getElementById("sig-canvas-pria");
            var ctxPria = canvasPria.getContext("2d");
            ctxPria.strokeStyle = "#222222";
            ctxPria.lineWidth = 4;

            var canvasWanita = document.getElementById("sig-canvas-wanita");
            var ctxWanita = canvasWanita.getContext("2d");
            ctxWanita.strokeStyle = "#222222";
            ctxWanita.lineWidth = 4;

            var drawingPria = false;
            var mousePosPria = {
                x: 0,
                y: 0
            };
            var lastPosPria = mousePosPria;

            var drawingWanita = false;
            var mousePosWanita = {
                x: 0,
                y: 0
            };
            var lastPosWanita = mousePosWanita;

            canvasPria.addEventListener("mousedown", function(e) {
                drawingPria = true;
                lastPosPria = getMousePos(canvasPria, e);
            }, false);

            canvasPria.addEventListener("mouseup", function(e) {
                drawingPria = false;
            }, false);

            canvasPria.addEventListener("mousemove", function(e) {
                mousePosPria = getMousePos(canvasPria, e);
            }, false);

            canvasWanita.addEventListener("mousedown", function(e) {
                drawingWanita = true;
                lastPosWanita = getMousePos(canvasWanita, e);
            }, false);

            canvasWanita.addEventListener("mouseup", function(e) {
                drawingWanita = false;
            }, false);

            canvasWanita.addEventListener("mousemove", function(e) {
                mousePosWanita = getMousePos(canvasWanita, e);
            }, false);

            // Add touch event support for mobile
            canvasPria.addEventListener("touchstart", function(e) {
                mousePosPria = getTouchPos(canvasPria, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvasPria.dispatchEvent(me);
            }, false);

            canvasPria.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvasPria.dispatchEvent(me);
            }, false);

            canvasPria.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvasPria.dispatchEvent(me);
            }, false);

            canvasWanita.addEventListener("touchstart", function(e) {
                mousePosWanita = getTouchPos(canvasWanita, e);
                var touch = e.touches[0];
                var me = new MouseEvent("mousedown", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvasWanita.dispatchEvent(me);
            }, false);

            canvasWanita.addEventListener("touchmove", function(e) {
                var touch = e.touches[0];
                var me = new MouseEvent("mousemove", {
                    clientX: touch.clientX,
                    clientY: touch.clientY
                });
                canvasWanita.dispatchEvent(me);
            }, false);

            canvasWanita.addEventListener("touchend", function(e) {
                var me = new MouseEvent("mouseup", {});
                canvasWanita.dispatchEvent(me);
            }, false);

            function getMousePos(canvasDom, mouseEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: mouseEvent.clientX - rect.left,
                    y: mouseEvent.clientY - rect.top
                }
            }

            function getTouchPos(canvasDom, touchEvent) {
                var rect = canvasDom.getBoundingClientRect();
                return {
                    x: touchEvent.touches[0].clientX - rect.left,
                    y: touchEvent.touches[0].clientY - rect.top
                }
            }

            function renderCanvasPria() {
                if (drawingPria) {
                    ctxPria.moveTo(lastPosPria.x, lastPosPria.y);
                    ctxPria.lineTo(mousePosPria.x, mousePosPria.y);
                    ctxPria.stroke();
                    lastPosPria = mousePosPria;
                }
            }

            function renderCanvasWanita() {
                if (drawingWanita) {
                    ctxWanita.moveTo(lastPosWanita.x, lastPosWanita.y);
                    ctxWanita.lineTo(mousePosWanita.x, mousePosWanita.y);
                    ctxWanita.stroke();
                    lastPosWanita = mousePosWanita;
                }
            }

            // Prevent scrolling when touching the canvas
            document.body.addEventListener("touchstart", function(e) {
                if (e.target == canvasPria || e.target == canvasWanita) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchend", function(e) {
                if (e.target == canvasPria || e.target == canvasWanita) {
                    e.preventDefault();
                }
            }, false);
            document.body.addEventListener("touchmove", function(e) {
                if (e.target == canvasPria || e.target == canvasWanita) {
                    e.preventDefault();
                }
            }, false);

            (function drawLoop() {
                requestAnimFrame(drawLoop);
                renderCanvasPria();
                renderCanvasWanita();
            })();

            function clearCanvasPria() {
                canvasPria.width = canvasPria.width;
            }

            function clearCanvasWanita() {
                canvasWanita.width = canvasWanita.width;
            }

            // Set up the UI for Pria
            var sigTextPria = document.getElementById("sig-dataUrl-pria");
            var sigImagePria = document.getElementById("sig-image-pria");
            var clearBtnPria = document.getElementById("sig-clearBtn-pria");
            var submitBtnPria = document.getElementById("sig-submitBtn-pria");
            clearBtnPria.addEventListener("click", function(e) {
                clearCanvasPria();
                sigTextPria.innerHTML = "Data URL for your signature will go here!";
                sigImagePria.setAttribute("src", "");
            }, false);
            submitBtnPria.addEventListener("click", function(e) {
                var dataUrlPria = canvasPria.toDataURL();
                sigTextPria.value = dataUrlPria;
                sigImagePria.setAttribute("src", dataUrlPria);
            }, false);

            // Set up the UI for Wanita
            var sigTextWanita = document.getElementById("sig-dataUrl-wanita");
            var sigImageWanita = document.getElementById("sig-image-wanita");
            var clearBtnWanita = document.getElementById("sig-clearBtn-wanita");
            var submitBtnWanita = document.getElementById("sig-submitBtn-wanita");
            clearBtnWanita.addEventListener("click", function(e) {
                clearCanvasWanita();
                sigTextWanita.innerHTML = "Data URL for your signature will go here!";
                sigImageWanita.setAttribute("src", "");
            }, false);
            submitBtnWanita.addEventListener("click", function(e) {
                var dataUrlWanita = canvasWanita.toDataURL();
                sigTextWanita.value = dataUrlWanita;
                sigImageWanita.setAttribute("src", dataUrlWanita);
            }, false);

        })();
    </script>


    @include('layouts.front.footer')




</body>

</html>
