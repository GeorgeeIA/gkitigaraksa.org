@extends('layouts.admin')
@section('title', 'Gembala')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gembala</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Gembala</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.gembala.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama Lengkap</label>
                                    <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('nama_lengkap') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Mulai Jabatan</label>
                                    <input type="date" name="tanggal_mulai_jabatan" value="{{ old('tanggal_mulai_jabatan') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('tanggal_mulai_jabatan') }}</p>
                                </div>
                                <div class="form-group">
                                  <label for="">Tanggal Mulai Jabatan</label>
                                  <input type="date" name="tanggal_akhir_jabatan" value="{{ old('tanggal_akhir_jabatan') }}" required
                                      class="form-control">
                                  <p class="text-danger">{{ $errors->first('tanggal_akhir_jabatan') }}</p>
                              </div>
                                <div class="form-group">
                                    <label for="">Foto</label>
                                    <input type="file" name="foto" value="{{ old('foto') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('foto') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm btn-block">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama Lengkap</td>
                                            <td>Tahun Menjabat</td>
                                            <td>Foto</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gembala as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama_lengkap }}</td>
                                                <td>{{ date('d/m/Y', strtotime($item->tanggal_mulai_jabatan)) }} - {{ date('d/m/Y', strtotime($item->tanggal_akhir_jabatan)) }}</td>
                                                <td><img src="{{ asset('storage/gembala/' . $item->foto) }}" alt=""
                                                        width="100">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.gembala.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning">Edit</a>
                                                    <a href="#" data-id="{{ $item->id }}"
                                                        class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
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


@section('js')

    <script>


        $('.btn-danger').on('click', function() {
            var id = $(this).attr('data-id');
            var url = '{{ URL::to('admin/gembala/delete') }}/' + id;
            Swal.fire({
                title: 'Yakin?',
                text: "Yakin ingin menghapus data?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.value) {
                    window.location = url;
                }
            })
        });
    </script>

@endsection
