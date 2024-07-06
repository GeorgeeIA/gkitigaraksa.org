<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/asset/img/logo gki sulsel.png') }}" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/elegant-icons.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/owl.carousel.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/slicknav.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('front/asset/css/styles.css') }}" />

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

            <!-- Hero -->
            <section class="hero">
                <div class="m-2">
                    <div class="hero__slider owl-carousel">

                        @foreach ($hero as $item)
                            <div class="hero__items set-bg" data-setbg="{{ asset('storage/hero/' . $item->gambar) }}">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="hero__text">
                                            <h2>{{ $item->judul }}</h2>
                                            <p>{{ $item->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach




                    </div>
                </div>
            </section>
            <!-- End Hero -->
        </div>
    </div>
    <!-- End Nav & Hero -->


    <!-- -->
    <div class="container my-5">
        <div class="card custom-card my-5">
            @foreach ($subhero as $item)
                <img class="img-herobawah" src="{{ asset('storage/subhero/' . $item->gambar) }}" height="280px"
                    alt="" />
            @endforeach
        </div>
    </div>
    <!-- -->

    <!-- -->
    <div class="my-5">
        <div class="" style="background-color: #327e3fcc">
            <div class="untree_co-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
                            <h2 class="line-bottom text-center mb-4">Komisi - Komisi</h2>
                        </div>
                        <div class="row mx-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="feature">
                                    <span class="uil uil-music"></span>
                                    <h3>Komisi Pria</h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind
                                        texts.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up"
                                data-aos-delay="200">
                                <div class="feature">
                                    <span class="uil uil-calculator-alt"></span>
                                    <h3>Komisi Wanita</h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind
                                        texts.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up"
                                data-aos-delay="300">
                                <div class="feature">
                                    <span class="uil uil-book-open"></span>
                                    <h3>Komisi Pemuda & Remaja</h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind
                                        texts.
                                    </p>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="feature">
                                    <span class="uil uil-book-alt"></span>
                                    <h3>Komisi Sekolah Minggu</h3>
                                    <p>
                                        Far far away, behind the word mountains, far from the
                                        countries Vokalia and Consonantia, there live the blind
                                        texts.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- -->

    <!-- -->
    {{-- <div class="container my-5">
        <div class="card custom-card" style="background-color: rgba(255, 255, 255, 0.58)">
            <div class="untree_co-section">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="0">
                            <h2 class="line-bottom-kegiatan text-center mb-4">
                                Kegiatan Ibadah
                            </h2>
                        </div>
                    </div>
                    <div class="row mx-5">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="{{asset('front/asset/img/hero/hero3.png')}}" alt="Image"
                                        class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Ibadah Raya Umum</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="img/hero/hero2.png" alt="Image" class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Ibadah Sekolah Minggu</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="img/hero/hero1.png" alt="Image" class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Ibadah Pemuda & Remaja</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="img/hero/hero3.png" alt="Image" class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Ibadah Raya Umum Barengkok</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="img/hero/hero2.png" alt="Image" class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Kebaktian Rumah Tangga</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                            <div class="custom-media">
                                <a href="#"><img src="img/hero/hero2.png" alt="Image" class="img-fluid" /></a>
                                <div class="custom-media-body">
                                    <div class="d-flex justify-content-between pb-3"></div>
                                    <h3>Ibadah Persekutuan Doa</h3>
                                    <p class="mb-4">
                                        Lorem ipsum dolor sit amet once is consectetur adipisicing
                                        elit optio.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- -->

    @include('layouts.front.footer')

      </script>
</body>

</html>
