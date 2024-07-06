@extends('layouts.admin')
@section('title', 'Tambah Berita')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Berita</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">

            <form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Warta</h3>
                            </div>
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="judul">Judul Berita</label>
                                    <input type="text" name="judul" value="{{ old('judul') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('judul') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" value="{{ old('deskripsi') }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('deskripsi') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="isi">Isi Berita</label>
                                    <textarea name="isi" id="summernote"  class="note-codable">{{ old('isi') }}</textarea>
                                    <p class="text-danger">{{ $errors->first('isi') }}</p>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Judul Berita
                                </h3>
                            </div>
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="is_publish">Publish</label>
                                    <select name="is_publish" id="is_publish" class="form-control" required>
                                      <option selected disabled>Pilih Status</option>
                                      <option value="1">Pubish</option>
                                      <option value="0">Draft</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('is_publish') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_publish">Tanggal Publish</label>
                                    <input type="date" name="tanggal_publish" value="{{ old('tanggal_publish') }}"
                                        required class="form-control">
                                    <p class="text-danger">{{ $errors->first('tanggal_publish') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="thumbnail">Thumbnail</label>
                                    <input type="file" name="thumbnail" value="{{ old('thumbnail') }}" required
                                        class="form-control">
                                    <p class="text-danger">{{ $errors->first('thumbnail') }}</p>
                                </div>


                                <div class="form-group">
                                    <button class="btn btn-block btn-primary">Tambah</button>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection
@section('js')
<script type="text/javascript">

  $(function () {
    // Summernote
    $('#summernote').summernote({
      height: 500
    })

  })

    </script>
@endsection
