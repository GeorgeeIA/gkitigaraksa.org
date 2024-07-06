@extends('layouts.admin')
@section('title', 'Konfirmasi Data')

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
                    <h1 class="m-0">Konfirmasi Data</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Konfirmasi Data</li>
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

                            <form action="{{ route('admin.sidi.update', $data->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="Nama">Nama</label>
                                    <input type="text" name="nama" value="{{ $data->nama }}" @readonly(true)
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" name="alamat" value="{{ $data->alamat }}" @readonly(true)
                                        class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="gereja">Tempat Tanggal Lahir</label>
                                    <input type="text" name="Tempat Tanggal Lahir"
                                        value="{{ $data->tempat_lahir }} {{ date('d-m-Y', strtotime($data->tanggal_lahir)) }}"
                                        @readonly(true) class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="Nomor Hp">Nomor Hp</label>
                                    <input type="text" name="Nomor Hp" value="{{ $data->nomor_hp }}" @readonly(true)
                                        class="form-control">
                                </div>


                                <div class="form-group">
                                    <label for="pengurus_ketua_id">Ketua</label>
                                    <select name="pengurus_ketua_id" id="pengurus_ketua_id" class="form-control">
                                        @foreach ($ketuas as $ketua)
                                            <option value="{{ $ketua->id }}">{{ $ketua->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('pengurus_ketua_id') }}</p>
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
