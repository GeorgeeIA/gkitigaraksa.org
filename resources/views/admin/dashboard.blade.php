@extends('layouts.admin')
@section('title', 'Dashboard')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$keluar}}</h3>
                            <p>Formulir Atestasi Keluar</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-external-link-alt"></i>
                        </div>
                        <a href="{{route('admin.atestasi.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$masuk}}</h3>
                            <p>Formulir Atestasi Masuk</p>
                        </div>
                        <div class="icon">

                            <i class="fas fa-sign-in-alt"></i>
                        </div>
                        <a href="{{route('admin.atestasi_masuk.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$anggota}}</h3>
                            <p>Formulir Keanggotaan</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route('admin.keanggotaan.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$anak}}</h3>
                            <p>Formulir Baptis Anak</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-child"></i>
                        </div>
                        <a href="{{route('admin.baptisAnak.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$dewasa}}</h3>
                            <p>Formulir Baptis Dewasa</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-user-tie"></i>
                        </div>
                        <a href="{{route('admin.baptisDewasa.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-secondary">
                        <div class="inner">
                            <h3>{{$sidi}}</h3>
                            <p>Formulir Baptis Sidi</p>
                        </div>
                        <div class="icon">
                          <i class="far fa-user-circle"></i>
                        </div>
                        <a href="{{route('admin.sidi.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$nikah}}</h3>
                            <p>Formulir Pernikahan</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-ring"></i>
                        </div>
                        <a href="{{route('admin.peneguhan_nikah.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{$izin}}</h3>
                            <p>Formulir Izin Nikah</p>
                        </div>
                        <div class="icon">
                          <i class="fab fa-gratipay"></i>
                        </div>
                        <a href="{{route('admin.izin_nikah.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">

                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$nilai}}</h3>
                            <p>Formulir Nilai Agama</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-pencil-ruler"></i>
                        </div>
                        <a href="{{route('admin.nilai_agama.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
