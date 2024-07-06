@extends('layouts.admin')
@section('title', 'Tambah Jemaat')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Jemaat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Jemaat</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.jemaat.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="nomor_hp">Nomor HP</label>
                                    <input type="number" name="nomor_hp" value="{{ old('nomor_hp') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nomor_hp') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ old('alamat') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('alamat') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir">Tempat Lahir</label>
                                    <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('tempat_lahir') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_lahir">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('tanggal_lahir') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('pekerjaan') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="surat_baptis">Surat Baptis</label>
                                    <input type="file" name="surat_baptis" value="{{ old('surat_baptis') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('surat_baptis') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="surat_atestasi">Surat Atestasi</label>
                                    <input type="file" name="surat_atestasi" value="{{ old('surat_atestasi') }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('surat_atestasi') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm btn-block">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
