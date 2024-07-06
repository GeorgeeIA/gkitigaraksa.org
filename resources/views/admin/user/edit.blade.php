@extends('layouts.admin')
@section('title', 'Edit User')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" value="{{ $user->name }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" id="role" class="form-control">
                                      <option selected disabled>Pilih Role</option>
                                      <option value="user" {{$user->role == 'user' ? 'selected' : ''}}>User</option>
                                      <option value="admin" {{$user->role == 'admin' ? 'selected' : ''}}>Admin</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('role') }}</p>
                                </div>

                                <div class="form-group">
                                  <label for="password">Password <sup class="text-danger">Kosongkan jika tidak ingin diubah</sup></label>
                                  <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                  <p class="text-danger">{{ $errors->first('password') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm btn-block">Tambah</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
