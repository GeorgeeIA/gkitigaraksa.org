@extends('layouts.admin')
@section('title', 'Nilai Agama')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Nilai Agama</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Nilai Agama</li>
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
                            <h3 class="card-title">List Nilai Agama</h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tingkat</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Nama Sekolah</th>
                                            <th>Periode Ajaran</th>
                                            <th>Nilai</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->category }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->kelas != null ? $item->kelas : '-' }}</td>
                                                <td>{{ $item->nama_sekolah != null ? $item->nama_sekolah : '-' }}</td>
                                                <td>{{ $item->periode_ajaran != null ? $item->periode_ajaran : '-' }}</td>
                                                <td>{{ $item->nilai != null ? $item->nilai : '-' }}</td>
                                                <td>{{ $item->status != null ? $item->status : '-' }}</td>
                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <a href="{{ route('admin.nilai_agama.show', $item->id) }}"
                                                            class="btn btn-danger btn-sm">PDF</a>
                                                    @else
                                                        <a href="{{ route('admin.nilai_agama.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm">
                                                            Konfirmasi
                                                        </a>
                                                    @endif
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
