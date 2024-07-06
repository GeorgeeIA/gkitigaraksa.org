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
    <style>
        .single-post-news .content .post-meta {
            color: #444;
            font-size: .7rem;
            font-style: italic;
            margin-bottom: 25px;
            margin-top: 10px;
        }

        #thumbnail {
            max-width: 550px;
            border-radius: 8px;
        }
        
        @media only screen and (max-width: 800px) {
          #thumbnail {
            max-width: 450px;

        }

        @media only screen and (max-width: 500px) {
          #thumbnail {
            max-width: 250px;

        }

        }
    </style>
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

                <div class="content">

                    <article class="mb-4">
                        <div class="container px-4 px-lg-5">
                            <div class="row gx-4 gx-lg-5 justify-content-center">
                                <div class="col-md-10 col-lg-8 col-xl-7">
                                    <h1 class="main-title">{{ $data->judul }}</h1>

                                    <img src="{{ asset('storage/berita/' . $data->thumbnail) }}" class="mt-3"
                                        id="thumbnail" alt="">
                                    <br>
                                    <br>
                                    {!! $data->isi !!}


                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>


    <!-- info section -->
    @include('layouts.front.footer')
</body>

</html>
