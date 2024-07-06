@extends('layouts.admin')
@section('title', 'Edit Gembala')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Gembala</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Gembala</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.gembala.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nama_lengkap') }}</p>
                                </div>
                                <div class="form-group">
                                  <label for="">Tanggal Mulai Jabatan</label>
                                  <input type="date" name="tanggal_mulai_jabatan" value="{{ $data->tanggal_mulai_jabatan }}" required
                                      class="form-control">
                                  <p class="text-danger">{{ $errors->first('tanggal_mulai_jabatan') }}</p>
                              </div>
                              <div class="form-group">
                                <label for="">Tanggal Mulai Jabatan</label>
                                <input type="date" name="tanggal_akhir_jabatan" value="{{ $data->tanggal_akhir_jabatan }}" required
                                    class="form-control">
                                <p class="text-danger">{{ $errors->first('tanggal_akhir_jabatan') }}</p>
                            </div>
                                <div class="form-group">
                                    <label for="">Foto <sup class="text-danger">Kosongkan jika tidak ingin diubah</sup></label>
                                    <input type="file" name="foto" value=""
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('foto') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm btn-block">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
