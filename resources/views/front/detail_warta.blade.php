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
    <link rel="stylesheet" href="{{ asset('front/asset/css/warta.css') }}" />

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
            <div class="p-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("front.index")}}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{route('front.warta')}}">Warta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Ibadah ....
                        </li>
                    </ol>
                </nav>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail</h5>
                        <hr>
                        <!-- Garis bawah detail -->
                        <div class="row">
                            <div class="col-6">
                                <p class="card-text">Worship Leader (WL)</p>
                                <p class="card-text">Pelayan Firman</p>
                                <p class="card-text">Singer</p>
                                <p class="card-text">Multimedia</p>
                                <p class="card-text">Kolektan</p>
                                <p class="card-text">Pemerhati</p>
                                <p class="card-text">Pembaca Warta</p>
                                <p class="card-text">Catatan</p>
                            </div>
                            <div class="col-6">
                                <!-- Placeholder untuk nilai -->
                                <p class="card-text">{{$data->worship_leader}}</p>
                                <p class="card-text">{{$data->pelayan_firman}}</p>
                                <p class="card-text">{{$data->singer}}</p>
                                <p class="card-text">{{$data->multimedia}}</p>
                                <p class="card-text">{{$data->kolektan}}</p>
                                <p class="card-text">{{$data->pemerhatian}}</p>
                                <p class="card-text">{{$data->pembaca_warta}}</p>
                                <p class="card-text">{{$data->notes}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- info section -->
    @include('layouts.front.footer')
</body>

</html>
