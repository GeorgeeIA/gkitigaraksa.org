@extends('layouts.admin')
@section('title', 'Formulir Peneguhan Nikah')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulir Peneguhan Nikah</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Formulir Peneguhan Nikah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">List Formulir Peneguhan Nikah</h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Mempelai Pria</th>
                                            <th>Nama Mempelai Wanita</th>
                                            <th>Tanggal Peneguhan</th>
                                            <th>Tempat Peneguhan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_pria }}</td>
                                                <td>{{ $item->nama_wanita }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->tanggal_peneguhan)) }}
                                                    {{ $item->jam_peneguhan }}</td>
                                                <td>{{ $item->tempat_peneguhan }}</td>
                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <a href="{{ route('admin.peneguhan_nikah.show', $item->id) }}"
                                                            class="btn btn-danger btn-sm">PDF</a>
                                                    @elseif($item->status == 'Ditolak')
                                                          <span class="badge badge-danger">Ditolak</span>
                                                    @else

                                                        <a data-toggle="modal" href="#set{{ $item->id }}"
                                                            class="btn btn-success btn-sm"><i class="fa fa-plus"></i>
                                                            Konfirmasi</a>
                                                    @endif
                                                </td>
                                            </tr>




                                            <div class="modal fade" id="set{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Data Mempelai</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        </div>


                                                        <div class="modal-body">
                                                            @php
                                                                $row = \App\Models\PeneguhanNikah::data_peneguhan(
                                                                    $item->id,
                                                                );
                                                            @endphp

                                                            <div class="row justify-content-center">
                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Data Mempelai Pria</h3>
                                                                        </div>
                                                                        <div class="card-body">

                                                                            <div class="form-group">
                                                                                <label for="nama"> Nama Pria</label>
                                                                                <input type="nama_pria" class="form-control"
                                                                                    name="nama_pria" id="nama_pria"
                                                                                    @readonly(true)
                                                                                    placeholder="Enter Nama Pria "
                                                                                    value="{{ $row->nama_pria }}" />
                                                                                @error('nama_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="kewarganegaraan">
                                                                                    Kewarganegaraan Pria</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="kewarganegaraan_pria"
                                                                                    id="kewarganegaraan" @readonly(true)
                                                                                    placeholder="Enter Kewarganegaraan Pria "
                                                                                    value="{{ $row->kewarganegaraan_pria }}" />
                                                                                @error('kewarganegaraan_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="alamat_pria"> Alamat
                                                                                    Pria</label>
                                                                                <input class="form-control" id="alamat_pria"
                                                                                    name="alamat_pria"
                                                                                    placeholder="Masukan alamat_pria"
                                                                                    value="{{ $row->alamat_pria }}"
                                                                                    @readonly(true)>

                                                                                @error('alamat_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nomor_hp_pria"> Nomor HP</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="nomor_hp_pria"
                                                                                    value="{{ $row->nomor_hp_pria }}"
                                                                                    id="nomor_hp_pria"@readonly(true)
                                                                                    placeholder="Enter Nomor HP " />
                                                                                @error('nomor_hp_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="tempat_lahir_pria"> Tempat Lahir
                                                                                    Pria</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->tempat_lahir_pria }}"
                                                                                    name="tempat_lahir_pria"
                                                                                    id="tempat_lahir_pria"@readonly(true)
                                                                                    placeholder="Enter  Tempat Lahir Pria " />
                                                                                @error('tempat_lahir_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="tanggal_lahir_pria"> Tanggal
                                                                                    Lahir Pria</label>
                                                                                <input type="date" class="form-control"
                                                                                    value="{{ $row->tanggal_lahir_pria }}"
                                                                                    name="tanggal_lahir_pria"
                                                                                    id="tanggal_lahir_pria"@readonly(true)
                                                                                    placeholder="Enter  Tanggal Lahir Pria " />
                                                                                @error('tanggal_lahir_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="sidi_pria">Sidi Pria</label>
                                                                                <br>
                                                                                <a href="{{ asset('storage/nikah/' . $row->sidi_pria) }}"
                                                                                    class="">Lihat</a>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="anggota_gereja_pria">Anggota
                                                                                    Gereja Pria</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->anggota_gereja_pria }}"
                                                                                    name="anggota_gereja_pria"
                                                                                    id="anggota_gereja_pria"@readonly(true)
                                                                                    placeholder="Enter  Anggota Gereja " />
                                                                                @error('anggota_gereja_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="nama_ayah_pria">Nama Ayah
                                                                                    Pria</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->nama_ayah_pria }}"
                                                                                    name="nama_ayah_pria"
                                                                                    id="nama_ayah_pria"@readonly(true)
                                                                                    placeholder="Enter  Nama Ayah " />
                                                                                @error('nama_ayah')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nama_ibu_pria">Nama Ibu
                                                                                    Pria</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->nama_ibu_pria }}"
                                                                                    name="nama_ibu_pria"
                                                                                    id="nama_ibu_pria"@readonly(true)
                                                                                    placeholder="Enter  Nama Ibu Pria " />
                                                                                @error('nama_ibu_pria')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="foto_pria">Pas Foto Mempelai
                                                                                    Pria </label>
                                                                                <br>
                                                                                <img src="{{ asset('storage/nikah/' . $row->foto_pria) }}"
                                                                                    width="80">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="card">
                                                                        <div class="card-header">
                                                                            <h3 class="card-title">Data Mempelai wanita
                                                                            </h3>
                                                                        </div>
                                                                        <div class="card-body">

                                                                            <div class="form-group">
                                                                                <label for="nama"> Nama Wanita</label>
                                                                                <input type="nama_wanita"
                                                                                    class="form-control"
                                                                                    name="nama_wanita" id="nama_wanita"
                                                                                    @readonly(true)
                                                                                    placeholder="Enter Nama wanita "
                                                                                    value="{{ $row->nama_wanita }}" />
                                                                                @error('nama_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="kewarganegaraan">
                                                                                    Kewarganegaraan Wanita</label>
                                                                                <input type="text" class="form-control"
                                                                                    name="kewarganegaraan_wanita"
                                                                                    id="kewarganegaraan" @readonly(true)
                                                                                    placeholder="Enter Kewarganegaraan wanita "
                                                                                    value="{{ $row->kewarganegaraan_wanita }}" />
                                                                                @error('kewarganegaraan_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="alamat_wanita"> Alamat
                                                                                    Wanita</label>
                                                                                <input class="form-control"
                                                                                    id="alamat_wanita"
                                                                                    name="alamat_wanita"
                                                                                    placeholder="Masukan alamat_wanita"
                                                                                    value="{{ $row->alamat_wanita }}"
                                                                                    @readonly(true)>

                                                                                @error('alamat_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nomor_hp_wanita"> Nomor
                                                                                    HP</label>
                                                                                <input type="number" class="form-control"
                                                                                    name="nomor_hp_wanita"
                                                                                    value="{{ $row->nomor_hp_wanita }}"
                                                                                    id="nomor_hp_wanita"@readonly(true)
                                                                                    placeholder="Enter Nomor HP " />
                                                                                @error('nomor_hp_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="tempat_lahir_wanita"> Tempat
                                                                                    Lahir Wanita</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->tempat_lahir_wanita }}"
                                                                                    name="tempat_lahir_wanita"
                                                                                    id="tempat_lahir_wanita"@readonly(true)
                                                                                    placeholder="Enter  Tempat Lahir wanita " />
                                                                                @error('tempat_lahir_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="tanggal_lahir_wanita"> Tanggal
                                                                                    Lahir Wanita</label>
                                                                                <input type="date" class="form-control"
                                                                                    value="{{ $row->tanggal_lahir_wanita }}"
                                                                                    name="tanggal_lahir_wanita"
                                                                                    id="tanggal_lahir_wanita"@readonly(true)
                                                                                    placeholder="Enter  Tanggal Lahir wanita " />
                                                                                @error('tanggal_lahir_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="sidi_wanita">Sidi
                                                                                    Wanita</label>
                                                                                <br>
                                                                                <a href="{{ asset('storage/nikah/' . $row->sidi_wanita) }}"
                                                                                    class="">Lihat</a>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="anggota_gereja_wanita">Anggota
                                                                                    Gereja Wanita</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->anggota_gereja_wanita }}"
                                                                                    name="anggota_gereja_wanita"
                                                                                    id="anggota_gereja_wanita"@readonly(true)
                                                                                    placeholder="Enter  Anggota Gereja " />
                                                                                @error('anggota_gereja_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="nama_ayah_wanita">Nama Ayah
                                                                                    Wanita</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->nama_ayah_wanita }}"
                                                                                    name="nama_ayah_wanita"
                                                                                    id="nama_ayah_wanita"@readonly(true)
                                                                                    placeholder="Enter  Nama Ayah " />
                                                                                @error('nama_ayah')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="nama_ibu_wanita">Nama Ibu
                                                                                    Wanita</label>
                                                                                <input type="text" class="form-control"
                                                                                    value="{{ $row->nama_ibu_wanita }}"
                                                                                    name="nama_ibu_wanita"
                                                                                    id="nama_ibu_wanita"@readonly(true)
                                                                                    placeholder="Enter  Nama Ibu wanita " />
                                                                                @error('nama_ibu_wanita')
                                                                                    <p class="text-danger">{{ $message }}
                                                                                    </p>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group">
                                                                                <label for="foto_wanita">Pas Foto Mempelai
                                                                                    Wanita </label>
                                                                                <br>
                                                                                <img src="{{ asset('storage/nikah/' . $row->foto_wanita) }}"
                                                                                    width="80">
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                          <a href="{{ route('admin.peneguhan_nikah.tolak', $item->id) }}"
                                                            class="btn btn-danger btn-sm">
                                                            Tolak
                                                        </a>
                                                                <a href="{{ route('admin.peneguhan_nikah.edit', $item->id) }}"
                                                                  class="btn btn-primary btn-sm">
                                                                  Konfirmasi
                                                              </a>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection
