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

    <link rel="stylesheet" href="{{asset('front/asset/css/styles.css')}}" />
    <link rel="stylesheet" href="{{asset('front/asset/css/about.css')}}" />

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
            @include('layouts.front.header')
            <!-- End Nav -->
            <div style="
            background-image:  url({{asset('front/asset/img/hero/hero3.png')}});
            background-size: cover;
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
            height: 200px;
          "></div>
        </div>
    </div>
    <!-- End Nav & Hero -->

    <div class="container my-5">
        <div class="card custom-card my-4" style="background-color: rgba(255, 255, 255, 0.58)">
            <div class="m-5">
                <div class="mb-5">
                    <h3 class="title-about">Visi</h3>
                    <p>
                        <span class = "text-center font-weight-bold">MENJADI GEREJA YANG MENGASIHI DAN MISIONER</span>
                        <br>
                        Visi datang dari Allah untuk membawa umat Tuhan, agar cakap menjadi saksi Kristus guna pelaksanaan Amanat Agung Tuhan Yesus Kristus
                    </p>
                </div>

                <div class="">
                    <h3 class="title-about">Misi</h3>
                    <p>
                        Kami percaya visi ini ada untuk mempermuliakan Allah yang diwujudkan dengan <span class = "font-weight-bold">memperlengkapi umat Tuhan, menjadi anak - anak Tuhan (jemaat) yang
                        hidupnya berpusatkan Kristus, berintegritas, berkualitas tinggi menuju gereja yang Mengasihi dan Misioner.</span>
                        <br><br>
                        Mengasihi artinya : <br>
                        Mengasihi Allah dengan segenap hati (Mat. 22:37-38)<br>
                        Mengasihi pekerjaan-Nya (1 Kor. 15:58)<br>
                        Mengasihi sesama (Yoh. 13:34-35)<br><br>

                        Misioner artinya : <br>
                        Gereja yang suka berdoa (Markus. 11:24:26)<br>
                        Gereja yang suka bersaksi (Kisah Para Rasul. 1:8)<br>
                        Gereja yang suka mengutus (Matius. 28:18-20)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="background-color: #327e3fcc">
        <div class="my-4 text-white p-3">
            <div class="m-5">
                <h3 class="title-pengkuan">Pengakuan Iman Rasuli</h3>
                <br />
                <p>
                    Aku percaya kepada Allah, Bapa yang mahakuasa, Khalik langit dan
                    bumi <br />Dan kepada Yesus Kristus, Anak-Nya yang tunggal, Tuhan
                    kita <br />
                    Yang dikandung dari Roh Kudus, lahir dari anak dara Maria <br />
                    Yang menderita sengsara di bawah pemerintahan Pontius Pilatus <br />
                    Disalibkan, mati dan dikuburkan, turun kedalam kerajaan maut <br />
                    Pada hari yang ketiga bangkit pula dari antara orang mati <br />
                    Naik ke sorga, duduk di sebelah kanan Allah, Bapa yang mahakuasa
                    <br />
                    Dan dari sana Ia akan datang untuk menghakimi orang yang hidup dan
                    mati <br />
                    Aku percaya kepada Roh Kudus; <br />
                    Gereja yang kudus dan am; <br />
                    Persekutuan orang kudus; <br />
                    Pengampunan dosa; <br />
                    Kebangkitan Tubuh; <br />
                    Dan hidup yang kekal. <br />
                    Amin.
                </p>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <div class="card custom-card my-4" style="background-color: rgba(255, 255, 255, 0.58)">
            <div class="team-boxed">
                <div class="container">
                    <div class="intro">
                        <h3 class="text-center title-about">Gembala</h3>
                    </div>
                    <div class="row people">

                        @foreach ($gembala as $item)

                        <div class="col-md-6 col-lg-4 item">
                            <div class="box">
                                <img class="rounded-circle" src="{{asset('storage/gembala/'. $item->foto )}}" />
                                <h4 class="name">{{$item->nama_lengkap}}</h4>
                                <p class="title">{{ date('d/m/Y', strtotime($item->tanggal_mulai_jabatan)) }} - {{ date('d/m/Y', strtotime($item->tanggal_akhir_jabatan)) }}</p>

                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.front.footer')
</body>

</html>
