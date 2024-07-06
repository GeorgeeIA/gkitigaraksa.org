@extends('layouts.admin')
@section('title', 'Formulir Keanggotaan')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Formulir Keanggotaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Formulir Keanggotaan</li>
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
                            <h3 class="card-title">List Formulir Keanggotaan</h3>

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
                                            <th>Gereja</th>
                                            <th>Alamat Gereja</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->alamat }}</td>
                                                <td>{{ $item->tempat_lahir }} {{date('d-m-Y', strtotime($item->tanggal_lahir))}}</td>
                                                <td>{{ $item->nama_gereja }}</td>
                                                <td>{{ $item->alamat_gereja }}</td>

                                                <td>
                                                    @if ($item->status == 'Selesai')
                                                        <a href="{{ route('admin.keanggotaan.show', $item->id) }}"
                                                            class="btn btn-danger btn-sm">PDF</a>
                                                    @else
                                                        <a href="{{ route('admin.keanggotaan.edit', $item->id) }}"
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
