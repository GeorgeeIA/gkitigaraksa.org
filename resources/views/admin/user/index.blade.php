@extends('layouts.admin')
@section('title', 'User')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User</li>
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
                            <form action="{{ route('admin.user.store') }}" method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="name" value="{{ old('name') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="">Role</label>
                                    <select name="role" id="role" class="form-control">
                                      <option selected disabled>Pilih Role</option>
                                      <option value="user">user</option>
                                      <option value="admin">Admin</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('role') }}</p>
                                </div>

                                <div class="form-group">
                                  <label for="password">Password</label>
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
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Role</td>
                                            <td>Email</td>
                                            <td>Aksi</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($user as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->role }}</td>
                                                <td>{{$item->email}}</td>
                                                <td>
                                                    <a href="{{ route('admin.user.edit', $item->id) }}"
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
            var url = '{{ URL::to('admin/user/delete') }}/' + id;
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
