@extends('layouts.admin')
@section('title', 'Tambah Pengurus')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pengurus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Pengurus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <form action="{{ route('admin.pengurus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Pengurus</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama">Nama Pengurus</label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nama') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="jabatan"> Jabatan</label>
                                    <select name="jabatan" id="jabatan" class="form-control">
                                        <option disabled selected>Pilih  Jabatan</option>
                                        <option value="Ketua">Ketua</option>
                                        <option value="Sekretaris">Sekretaris</option>
                                        <option value="Gembala Sidang">Gembala Sidang</option>
                                        <option value="Guru Sekolah Minggu">Guru Sekolah Minggu</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('jabatan') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="tahun_menjabat">Tahun Menjabat</label>
                                    <input type="date" name="tahun_menjabat" value="{{ old('tahun_menjabat') }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('tahun_menjabat') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="status_jabatan">Status Jabatan</label>
                                    <select name="status_jabatan" id="status_jabatan" class="form-control">
                                        <option disabled selected>Pilih Status Jabatan</option>
                                        <option value="Aktif">Aktif</option>
                                        <option value="Non-Aktif">Non-Aktif</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status_jabatan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanda_tangan">Tanda Tangan</label>
                                    <input type="file" name="tanda_tangan" value="{{ old('tanda_tangan') }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('tanda_tangan') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </section>
@endsection
