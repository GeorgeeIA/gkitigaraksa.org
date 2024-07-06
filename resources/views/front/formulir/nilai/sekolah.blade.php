<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo gki sulsel.png" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="{{ asset('front/asset/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/detailform.css') }}" />

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
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Formulir Nilai Agama Sekolah Untuk SD, SMP, SMA/K
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
                    <form action="{{ route('formulir.nilaiagama.store') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <h5 class="card-title"> Formulir Nilai Agama Sekolah Untuk SD, SMP, SMA/K</h5>
                        <hr />
                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan Nama </label>
                            <input type="text" class="form-control" name="nama" id="MasukanNama" required
                                placeholder="Enter Nama " />
                        </div>
                        <div class="form-group">
                            <label for="category">Masukkan Tingkatan Sekolah</label>
                            <select required name="category" class="form-control">
                                <option selected disabled>Pilih Tingkatan Sekolah</option>
                                <option value="SD">SD</option>
                                <option value="SMP">SMP</option>
                                <option value="SMA/K">SMA/K</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan Kelas</label>
                            <input type="number" class="form-control" name="kelas" id="MasukanKelas" required
                                placeholder="Enter Kelas" />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan Nama Sekolah </label>
                            <input type="text" class="form-control" name="nama_sekolah" id="MasukanNamaSekolah"
                                required placeholder="Enter Nama Sekolah " />
                        </div>

                        <div class="form-group">
                            <label for="exampleInputNama">Masukkan Periode Ajaran </label>
                            <input type="text" class="form-control" name="periode_ajaran"
                                id="MasukanPeriode Ajaran" required placeholder="Enter Periode Ajaran" />
                        </div>

                        <div class="d-flex justify-content-between">
                            <a class="btn btn-danger" href="{{route("front.index")}}">Batal</a>
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


    <!-- info section -->
    <section class="info_section layout_padding2">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 info_col">
                    <div class="info_contact">
                        <h4>Address</h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span> Location </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span> Call +01 1234567890 </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span> demo@gmail.com </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info_col">
                    <div class="info_detail">
                        <h4>Info</h4>
                        <p>
                            necessary, making this the first true generator on the Internet.
                            It uses a dictionary of over 200 Latin words, combined with a
                            handful
                        </p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2 mx-auto info_col">
                    <div class="info_link_box">
                        <h4>Links</h4>
                        <div class="info_links">
                            <a class="active" href="index.html">
                                <img src="images/nav-bullet.png" alt="" />
                                Home
                            </a>
                            <a class="" href="about.html">
                                <img src="images/nav-bullet.png" alt="" />
                                About
                            </a>
                            <a class="" href="informasi.html">
                                <img src="images/nav-bullet.png" alt="" />
                                E-Warta
                            </a>
                            <a class="" href="form.html">
                                <img src="images/nav-bullet.png" alt="" />
                                Formulir
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3 info_col">
                    <h4>Location Gmaps</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.9208461460207!2d106.48416689999999!3d-6.274138199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e420700066f1d0b%3A0x72940fff66f1c2a0!2sGKI%20SulSel%20Pos%20Tigaraksa!5e0!3m2!1sid!2sid!4v1714726485290!5m2!1sid!2sid"
                        width="cover" height="200" style="border: 0" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- end info section -->

    <!-- footer section -->
    <section class="footer_section">
        <div class="container">
            <p>
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a href="https://html.design/">GKI Tigaraksa</a>
            </p>
        </div>
    </section>
    <!-- footer section -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
