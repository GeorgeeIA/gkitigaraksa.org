@extends('layouts.admin')
@section('title', 'Edit Warta')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Warta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Warta</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <form action="{{ route('admin.warta.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Warta</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama_kegiatan">Nama Kegiatan</label>
                                    <input type="text" name="nama_kegiatan" value="{{ $data->nama_kegiatan }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nama_kegiatan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_kegiatan">Tanggal Kegiatan</label>
                                    <input type="date" name="tanggal_kegiatan" value="{{ date('Y-m-d', strtotime($data->tanggal_kegiatan))}}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('tanggal_kegiatan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="jam_kegiatan">Jam Kegiatan</label>
                                    <input type="text" name="jam_kegiatan" value="{{ $data->jam_kegiatan }}" required
                                        class="form-control clockpicker">
                                    <p class="text-danger">{{ $errors->first('jam_kegiatan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="lokasi_kegiatan">Lokasi Kegiatan</label>
                                    <input type="text" name="lokasi_kegiatan" value="{{ $data->lokasi_kegiatan }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('lokasi_kegiatan') }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Detail Warta
                                </h3>
                            </div>
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="worship_leader">Worship Leader</label>
                                    <input type="text" name="worship_leader" value="{{ $data->detailWarta->worship_leader }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('worship_leader') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="pelayan_firman">Pelayan Firman</label>
                                    <input type="text" name="pelayan_firman" value="{{ $data->detailWarta->pelayan_firman}}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('pelayan_firman') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="singer">Singer</label>
                                    <input type="text" name="singer" value="{{ $data->detailWarta->singer }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('singer') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="multimedia">Multimedia</label>
                                    <input type="text" name="multimedia" value="{{ $data->detailWarta->multimedia }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('multimedia') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="kolektan">Kolektan</label>
                                    <input type="text" name="kolektan" value="{{ $data->detailWarta->kolektan }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('kolektan') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="pemerhatian">Pemerhatin</label>
                                    <input type="text" name="pemerhatian" value="{{ $data->detailWarta->pemerhatian }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('pemerhatian') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="pembaca_warta">Pembaca Warta</label>
                                    <input type="text" name="pembaca_warta" value="{{ $data->detailWarta->pembaca_warta }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('pembaca_warta') }}</p>
                                </div>

                                <div class="form-group">
                                  <label for="gambar">Gambar <sup class="text-danger">Kosongkan jika tidak ingin dibuah</sup></label>
                                  <input type="file" name="gambar" value=""
                                      class="form-control">
                                  <p class="text-danger">{{ $errors->first('gambar') }}</p>
                              </div>


                              <div class="form-group">
                                  <label for="notes">Catatan</label>
                                  <textarea name="notes" id="notes" cols="3" rows="3" class="form-control">{{ $data->detailWarta->notes }}</textarea>
                                  <p class="text-danger">{{ $errors->first('notes') }}</p>
                              </div>


                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">Edit</button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@section('js')
<script type="text/javascript">
    $('.clockpicker').clockpicker({
        donetext: 'Set Time'
    });
    </script>
@endsection
