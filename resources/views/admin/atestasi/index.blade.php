@extends('layouts.admin')
@section('title', 'Formulir Atestasi')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulir Atestasi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Formulir Atestasi</li>
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
                            <h3 class="card-title">List Formulir Atestasi</h3>

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Gereja</th>
                                            <th>Alamat Gereja</th>
                                            <th>Alasan</th>
                                            {{-- <th>Anggota Keluarga</th> --}}
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->gereja }}</td>
                                                <td>{{ $item->alamat_gereja }}</td>
                                                <td>{{ $item->alasan }}</td>
                                                {{-- <td>{{ $item->anggota_keluarga }}</td> --}}
                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <a href="{{ route('admin.atestasi.show', $item->id) }}"
                                                            class="btn btn-danger btn-sm">PDF</a>
                                                    @else
                                                        <a href="{{ route('admin.atestasi.edit', $item->id) }}"
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
