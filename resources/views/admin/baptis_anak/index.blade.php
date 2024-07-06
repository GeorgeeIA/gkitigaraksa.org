@extends('layouts.admin')
@section('title', 'Baptis Anak')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Baptis Anak</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Baptis Anak</li>
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
                            <h3 class="card-title">List Baptis Anak</h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Ayah</th>
                                            <th>Nama Ibu</th>
                                            <th>Nama Anak</th>
                                            <th>Alamat</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Nomor HP</th>
                                            <th>Akte Kelahiran</th>
                                            <th>Pas Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_ayah }}</td>
                                                <td>{{ $item->nama_ibu }}</td>
                                                <td>{{ $item->nama_anak }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->tempat_lahir }}
                                                    {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                                                <td>{{ $item->nomor_hp }}</td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/baptis/' . $item->akte_kelahiran) }}"
                                                        target="_blank" download="Akte Lahir  {{ $item->nama_anak }}"
                                                        class="text-center">
                                                        <i class="fas fa-file-download" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/baptis/' . $item->pas_foto) }}"
                                                        target="_blank" download="Pas Foto {{ $item->nama_anak }}"
                                                        class="text-center">
                                                        <i class="fas fa-file-download" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <a href="{{ route('admin.baptisAnak.show', $item->id) }}"
                                                            class="btn btn-danger btn-sm">PDF</a>
                                                    @elseif($item->status == 'Ditolak')
                                                        <span class="badge badge-danger">Ditolak</span>
                                                    @else
                                                        <a data-toggle="modal" href="#set{{ $item->id }}"
                                                            class="btn btn-success btn-sm">
                                                            Konfirmasi</a>
                                                    @endif
                                                </td>


                                            </tr>



                                            <div class="modal fade" id="set{{ $item->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Data Baptis Anak</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">&times;</button>
                                                        </div>


                                                        <div class="modal-body">
                                                            @php
                                                                $row = \App\Models\BaptisAnak::data_baptis($item->id);
                                                            @endphp

                                                            <div class="card">
                                                                <div class="card-header">
                                                                    <h3 class="card-title">Data Baptis Anak</h3>
                                                                </div>
                                                                <div class="card-body">


                                                                    <div class="form-group">
                                                                      <label for="Nama">Nama Anak</label>
                                                                      <input type="text" name="nama" value="{{ $row->nama_anak }}" @readonly(true)
                                                                          class="form-control">
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <label for="alamat">Alamat</label>
                                                                      <input type="text" name="alamat" value="{{ $row->alamat }}" @readonly(true)
                                                                          class="form-control">
                                                                  </div>
                                                                  <div class="form-group">
                                                                      <label for="gereja">Tempat Tanggal Lahir</label>
                                                                      <input type="text" name="Tempat Tanggal Lahir"
                                                                          value="{{ $row->tempat_lahir }} {{ date('d-m-Y', strtotime($row->tanggal_lahir)) }}"
                                                                          @readonly(true) class="form-control">
                                                                  </div>

                                                                  <div class="form-group">
                                                                      <label for="Nomor Hp">Nomor Hp</label>
                                                                      <input type="text" name="Nomor Hp" value="{{ $row->nomor_hp }}" @readonly(true)
                                                                          class="form-control">
                                                                  </div>

                                                                  <div class="form-group">
                                                                    <label for="foto_wanita">Foto Anak </label>
                                                                    <br>
                                                                    <img src="{{ asset('storage/baptis/' . $item->pas_foto) }}"
                                                                        width="80">
                                                                </div>

                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <a href="{{ route('admin.baptisAnak.tolak', $item->id) }}"
                                                                class="btn btn-danger btn-sm">
                                                                Tolak
                                                            </a>
                                                            <a href="{{ route('admin.baptisAnak.edit', $item->id) }}"
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
