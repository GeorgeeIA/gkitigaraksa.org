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

                            <form action="{{ route('admin.atestasi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
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
                                    <label for="gereja">Gereja</label>
                                    <input type="text" name="gereja" value="{{$data->gereja}}"
                                        @readonly(true) class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="alasan">Alasan</label>
                                    <input type="text" name="alasan" value="{{$data->alasan}}"
                                        @readonly(true) class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="pengurus_ketua_id">Ketua</label>
                                    <select name="pengurus_ketua_id" id="pengurus_ketua_id" class="form-control">
                                        @foreach($ketuas as $ketua)
                                            <option value="{{ $ketua->id }}">{{ $ketua->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('pengurus_ketua_id') }}</p>
                                </div>


                                <div class="form-group">
                                    <label for="pengurus_sekretaris_id">Sekretaris</label>
                                    <select name="pengurus_sekretaris_id" id="pengurus_sekretaris_id" class="form-control">
                                        @foreach($sekretaris as $s)
                                            <option value="{{ $s->id }}">{{ $s->nama }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('pengurus_sekretaris_id') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="pengurus_gembala_sidang_id">Gembala Sidang</label>
                                    <select name="pengurus_gembala_sidang_id" id="pengurus_gembala_sidang_id" class="form-control">
                                        @foreach($gembala as $g)
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
