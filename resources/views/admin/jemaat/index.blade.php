@extends('layouts.admin')
@section('title', 'Jemaat')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Jemaat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Jemaat</li>
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
                            <h3 class="card-title">List Jemaat</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <a href="{{ route('admin.jemaat.create') }}" class="btn btn-primary btn-sm">
                                        Tambah
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover ">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Tempat Tanggal Lahir</th>
                                            <th>Pekerjaan</th>
                                            <th>Nomor HP</th>
                                            <th>Surat Baptis</th>
                                            <th>Surat Atestasi / Keanggotaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->tempat_lahir }}
                                                    {{ date('d-m-Y', strtotime($item->tanggal_lahir)) }}</td>
                                                <td>{{ $item->pekerjaan }}</td>
                                                <td>{{ $item->nomor_hp }}</td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/atestasi_masuk/' . $item->surat_baptis) }}"
                                                        target="_blank" download="surat baptis {{ $item->nama }}"
                                                        class="text-center">
                                                        <i class="fas fa-file-download" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/atestasi_masuk/' . $item->surat_atestasi) }}"
                                                        target="_blank" download="surat atestasi {{ $item->nama }}"
                                                        class="text-center">
                                                        <i class="fas fa-file-download" style="font-size: 20px;"></i>
                                                    </a>
                                                </td>

                                                <td>
                                                    <a href="{{ route('admin.jemaat.edit', $item->id) }}"
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
            var url = '{{ URL::to('admin/jemaat/delete') }}/' + id;
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
