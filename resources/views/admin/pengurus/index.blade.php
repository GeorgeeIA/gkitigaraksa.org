@extends('layouts.admin')
@section('title', 'Pengurus')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengurus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengurus</li>
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
                            <h3 class="card-title">List Pengurus</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <a href="{{ route('admin.pengurus.create') }}" class="btn btn-primary btn-sm">
                                        Tambah
                                    </a>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th>Tahun Menjabat</th>
                                            <th>Status Jabatan</th>
                                            <th>Tanda Tangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>{{$item->nama}}</td>
                                                <td>{{$item->jabatan}}</td>
                                                <td>{{date('d-m-Y', strtotime($item->tahun_menjabat))}}</td>
                                                <td>{{$item->status_jabatan}}</td>
                                                <td><img src="{{asset('storage/pengurus/'. $item->tanda_tangan)}}" width="100" alt=""></td>
                                                <td>
                                                    <a href="{{ route('admin.pengurus.edit', $item->id) }}"
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
            var url = '{{ URL::to('admin/pengurus/delete') }}/' + id;
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
