@extends('layouts.admin')
@section('title', 'Berita')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Berita</li>
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
                            <h3 class="card-title">List Berita</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Tanggal Publish</th>
                                            <th>Is Publish</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach ($berita as $item)
                                      <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$item->judul}}</td>
                                        <td>{{Str::limit($item->deskripsi, 10, ' ...')}}</td>
                                        <td>{{date('d-m-Y', strtotime($item->tanggal_publish))}}</td>
                                        <td>
                                          @if ($item->is_publish == 0 )
                                          Draft
                                          @else
                                          Publish
                                          @endif
                                        </td>
                                        <td>
                                          <a href="{{ route('admin.berita.edit', $item->id) }}"
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
            var url = '{{ URL::to('admin/berita/delete') }}/' + id;
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
