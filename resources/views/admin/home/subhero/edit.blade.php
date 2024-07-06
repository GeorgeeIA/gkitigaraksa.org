@extends('layouts.admin')
@section('title', 'Edit')

@section('content')


<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.subhero.update', $data->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Gambar</label>

                                <input type="file" name="gambar" value="{{old('gambar')}}" required
                                class="form-control">
                                <p class="text-danger">{{ $errors->first('gambar') }}</p>
                            </div>
                            <img src="{{asset('storage/subhero/'. $data->gambar)}}" width="250">

                            <br>
                            <br>
                            <div class="form-group">
                                <button class="btn btn-primary btn-sm btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
