@extends('layouts.admin')
@section('title', 'Hero')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hero</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Hero</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.hero.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Judul</label>
                                    <input type="text" name="judul" value="{{ old('judul') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="{{ old('deskripsi') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">gambar</label>
                                    <input type="file" name="gambar" value="{{ old('gambar') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('gambar') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm btn-block">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Judul</td>
                                            <td>Deskripsi</td>
                                            <td>Gambar</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hero as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->judul }}</td>
                                                <td>{{ $item->deskripsi }}</td>
                                                <td>
                                                    <img src="{{ asset('storage/hero/' . $item->gambar) }}" alt=""
                                                        width="200">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.hero.edit', $item->id) }}"
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
            var url = '{{ URL::to('admin/hero/delete') }}/' + id;
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
