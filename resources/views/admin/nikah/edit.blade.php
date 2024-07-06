@extends('layouts.admin')
@section('title', 'Konfirmasi Data')

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
                        <div class="card-header">
                            <h3 class="card-title">Data Mempelai Pria</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nama"> Nama Pria</label>
                                <input type="nama_pria" class="form-control" name="nama_pria" id="nama_pria"
                                    @readonly(true) placeholder="Enter Nama Pria " value="{{ $data->nama_pria }}" />
                                @error('nama_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="kewarganegaraan"> Kewarganegaraan Pria</label>
                                <input type="text" class="form-control" name="kewarganegaraan_pria" id="kewarganegaraan"
                                    @readonly(true) placeholder="Enter Kewarganegaraan Pria "
                                    value="{{ $data->kewarganegaraan_pria }}" />
                                @error('kewarganegaraan_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat_pria"> Alamat Pria</label>
                                <input class="form-control" id="alamat_pria" name="alamat_pria"
                                    placeholder="Masukan alamat_pria" value="{{ $data->alamat_pria }}" @readonly(true)>

                                @error('alamat_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nomor_hp_pria"> Nomor HP</label>
                                <input type="number" class="form-control" name="nomor_hp_pria"
                                    value="{{ $data->nomor_hp_pria }}" id="nomor_hp_pria"@readonly(true)
                                    placeholder="Enter Nomor HP " />
                                @error('nomor_hp_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="tempat_lahir_pria"> Tempat Lahir Pria</label>
                                <input type="text" class="form-control" value="{{ $data->tempat_lahir_pria }}"
                                    name="tempat_lahir_pria" id="tempat_lahir_pria"@readonly(true)
                                    placeholder="Enter  Tempat Lahir Pria " />
                                @error('tempat_lahir_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir_pria"> Tanggal Lahir Pria</label>
                                <input type="date" class="form-control" value="{{ $data->tanggal_lahir_pria }}"
                                    name="tanggal_lahir_pria" id="tanggal_lahir_pria"@readonly(true)
                                    placeholder="Enter  Tanggal Lahir Pria " />
                                @error('tanggal_lahir_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="sidi_pria">Sidi Pria</label>
                                <br>
                                <a href="{{ asset('storage/nikah/' . $data->sidi_pria) }}" class="">Lihat</a>
                            </div>

                            <div class="form-group">
                                <label for="anggota_gereja_pria">Anggota Gereja Pria</label>
                                <input type="text" class="form-control" value="{{ $data->anggota_gereja_pria }}"
                                    name="anggota_gereja_pria" id="anggota_gereja_pria"@readonly(true)
                                    placeholder="Enter  Anggota Gereja " />
                                @error('anggota_gereja_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="nama_ayah_pria">Nama Ayah Pria</label>
                                <input type="text" class="form-control" value="{{ $data->nama_ayah_pria }}"
                                    name="nama_ayah_pria" id="nama_ayah_pria"@readonly(true)
                                    placeholder="Enter  Nama Ayah " />
                                @error('nama_ayah')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu_pria">Nama Ibu Pria</label>
                                <input type="text" class="form-control" value="{{ $data->nama_ibu_pria }}"
                                    name="nama_ibu_pria" id="nama_ibu_pria"@readonly(true)
                                    placeholder="Enter  Nama Ibu Pria " />
                                @error('nama_ibu_pria')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="foto_pria">Pas Foto Mempelai Pria </label>
                                <br>
                                <img src="{{ asset('storage/nikah/' . $data->foto_pria) }}" width="80">
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Mempelai wanita</h3>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="nama"> Nama Wanita</label>
                                <input type="nama_wanita" class="form-control" name="nama_wanita" id="nama_wanita"
                                    @readonly(true) placeholder="Enter Nama wanita "
                                    value="{{ $data->nama_wanita }}" />
                                @error('nama_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="kewarganegaraan"> Kewarganegaraan Wanita</label>
                                <input type="text" class="form-control" name="kewarganegaraan_wanita"
                                    id="kewarganegaraan" @readonly(true) placeholder="Enter Kewarganegaraan wanita "
                                    value="{{ $data->kewarganegaraan_wanita }}" />
                                @error('kewarganegaraan_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat_wanita"> Alamat Wanita</label>
                                <input class="form-control" id="alamat_wanita" name="alamat_wanita"
                                    placeholder="Masukan alamat_wanita" value="{{ $data->alamat_wanita }}"
                                    @readonly(true)>

                                @error('alamat_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nomor_hp_wanita"> Nomor HP</label>
                                <input type="number" class="form-control" name="nomor_hp_wanita"
                                    value="{{ $data->nomor_hp_wanita }}" id="nomor_hp_wanita"@readonly(true)
                                    placeholder="Enter Nomor HP " />
                                @error('nomor_hp_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="tempat_lahir_wanita"> Tempat Lahir Wanita</label>
                                <input type="text" class="form-control" value="{{ $data->tempat_lahir_wanita }}"
                                    name="tempat_lahir_wanita" id="tempat_lahir_wanita"@readonly(true)
                                    placeholder="Enter  Tempat Lahir wanita " />
                                @error('tempat_lahir_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_lahir_wanita"> Tanggal Lahir Wanita</label>
                                <input type="date" class="form-control" value="{{ $data->tanggal_lahir_wanita }}"
                                    name="tanggal_lahir_wanita" id="tanggal_lahir_wanita"@readonly(true)
                                    placeholder="Enter  Tanggal Lahir wanita " />
                                @error('tanggal_lahir_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="sidi_wanita">Sidi Wanita</label>
                                <br>
                                <a href="{{ asset('storage/nikah/' . $data->sidi_wanita) }}" class="">Lihat</a>
                            </div>

                            <div class="form-group">
                                <label for="anggota_gereja_wanita">Anggota Gereja Wanita</label>
                                <input type="text" class="form-control" value="{{ $data->anggota_gereja_wanita }}"
                                    name="anggota_gereja_wanita" id="anggota_gereja_wanita"@readonly(true)
                                    placeholder="Enter  Anggota Gereja " />
                                @error('anggota_gereja_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="nama_ayah_wanita">Nama Ayah Wanita</label>
                                <input type="text" class="form-control" value="{{ $data->nama_ayah_wanita }}"
                                    name="nama_ayah_wanita" id="nama_ayah_wanita"@readonly(true)
                                    placeholder="Enter  Nama Ayah " />
                                @error('nama_ayah')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu_wanita">Nama Ibu Wanita</label>
                                <input type="text" class="form-control" value="{{ $data->nama_ibu_wanita }}"
                                    name="nama_ibu_wanita" id="nama_ibu_wanita"@readonly(true)
                                    placeholder="Enter  Nama Ibu wanita " />
                                @error('nama_ibu_wanita')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="foto_wanita">Pas Foto Mempelai Wanita </label>
                                <br>
                                <img src="{{ asset('storage/nikah/' . $data->foto_wanita) }}" width="80">
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.peneguhan_nikah.update', $data->id) }}" method="POST">
                              @csrf

                              <div class="form-group">
                                <label for="nama_pendeta">Nama Pendeta</label>
                                <input type="text" class="form-control" id="nama_pendeta" name="nama_pendeta" value="{{old('nama_pendeta')}}">
                                <p class="text-danger">{{ $errors->first('nama_pendeta') }}</p>
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
