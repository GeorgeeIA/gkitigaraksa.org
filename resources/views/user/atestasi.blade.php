@extends('layouts.app')
@section('title', 'Formulir Atestasi')
@section('content')

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"> Formulir Atestasi</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('front.index') }}">Home</a></li>
                            <li class="breadcrumb-item active">Formulir Atestasi</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    List Formulir Atestasi
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Tanggal Diajukan</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->nama }}</td>
                                                    <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                                                    <td>


                                                        @if ($item->status == 'Proses')
                                                            <span class="badge badge-info">Proses</span>
                                                        @elseif ($item->status == 'Ditolak')
                                                            <span class="badge badge-danger">Ditolak</span>
                                                        @else
                                                            <a href="{{ route('user.showAtestasi', $item->id) }}"
                                                                class="btn btn-danger btn-sm">
                                                                Download File
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
        </div>

    </div>
@endsection
