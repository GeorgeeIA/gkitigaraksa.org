@extends('layouts.admin')
@section('title', 'Konfirmasi Nilai')

@section('css')
    <style>
        #sig-canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }
    </style>

@endsection

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Konfirmasi Nilai</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Konfirmasi Nilai</li>
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
                        <div class="card-body">

                            <form action="{{ route('admin.nilai_agama.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" name="nama" value="{{ $data->nama }}" @readonly(true)
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Tingkat">Tingkat</label>
                                    <input type="text" name="Tingkat" value="{{ $data->category }}" @readonly(true)
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="Nama Instansi">Nama Instansi</label>
                                    <input type="text" name="Nama Instansi"
                                        value="{{ $data->nama_kampus != null ? $data->nama_kampus : $data->nama_sekolah }}"
                                        @readonly(true) class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="nilai">Nilai</label>
                                    <input type="text" name="nilai" value="{{ old('nilai') }}" class="form-control"
                                        placeholder="Input nilai">
                                    <p class="text-danger">{{ $errors->first('nilai') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="pengurus_gembala_sidang_id">Gembala Sidang</label>
                                    <select name="pengurus_gembala_sidang_id" id="pengurus_gembala_sidang_id"
                                        class="form-control">
                                        @foreach ($gembala as $g)
                                            <option value="{{ $g->id }}">{{ $g->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('pengurus_gembala_sidang_id') }}</p>
                                </div>

                                <div class="form-group">
                                  <label for="pengurus_guru_sekolah_minggu_id">Guru Sekolah Minggu</label>
                                  <select name="pengurus_guru_sekolah_minggu_id" id="pengurus_guru_sekolah_minggu_id"
                                      class="form-control">
                                      @foreach ($guru as $g)
                                          <option value="{{ $g->id }}">{{ $g->nama }}</option>
                                      @endforeach
                                  </select>
                                  <p class="text-danger">{{ $errors->first('pengurus_guru_sekolah_minggu_id') }}</p>
                              </div>





                                <div class="form-group">
                                    <button class="btn btn-primary btn-block">
                                        Konfirmasi
                                    </button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
