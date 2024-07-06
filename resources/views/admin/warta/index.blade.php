@extends('layouts.admin')
@section('title', 'Warta')

@section('content')


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Warta</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Warta</li>
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
                            <h3 class="card-title">List Warta</h3>
                            <div class="card-tools">
                                <ul class="pagination pagination-sm float-right">
                                    <a href="{{ route('admin.warta.create') }}" class="btn btn-primary btn-sm">
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
                                            <th>Gambar</th>
                                            <th>Nama Kegiatan</th>
                                            <th>Tanggal Kegiatan</th>
                                            <th>Jam Kegitan</th>
                                            <th>Lokasi Kegiatan</th>
                                            <th>Detail</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($warta as $item)
                                            <tr>
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                  <img src="{{asset('storage/warta/' . $item->gambar)}}" width="70">
                                                </td>
                                                <td>{{ $item->nama_kegiatan }}</td>
                                                <td>{{ date('d-m-Y', strtotime($item->tanggal_kegiatan)) }}</td>
                                                <TD>{{$item->jam_kegiatan}}</TD>
                                                <td>{{ $item->lokasi_kegiatan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                                        data-target="#detailModal" data-id="{{ $item->id }}">
                                                        Detail
                                                    </button>
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.warta.edit', $item->id) }}"
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


    {{-- Modal --}}
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Warta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless ">
                        <tr>
                          <td width="30%">Worship Leader</td>
                          <td width="20px">:</td>
                          <td id="worship_leader"></td>
                        </tr>

                        <tr>
                            <td>Pelayan Firman</td>
                            <td>:</td>
                            <td id="pelayan_firman"></td>
                        </tr>

                        <tr>
                            <td>Singer</td>
                            <td>:</td>
                            <td id="singer"></td>
                        </tr>

                        <tr>
                            <td>Multimedia</td>
                            <td>:</td>
                            <td id="multimedia"></td>
                        </tr>


                        <tr>
                            <td>Kolektan</td>
                            <td>:</td>
                            <td id="kolektan"></td>
                        </tr>

                        <tr>
                            <td>Pemerhatin</td>
                            <td>:</td>
                            <td id="pemerhatian"></td>
                        </tr>

                        <tr>
                            <td>Pembaca Warta</td>
                            <td>:</td>
                            <td id="pembaca_warta"></td>
                        </tr>
                        <tr>
                          <td>Catatan</td>
                          <td>:</td>
                          <td id="notes"></td>
                      </tr>

                      </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    <script>
        $('#detailModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var detailId = button.data('id')

            $.ajax({
                url: `/admin/warta/show/${detailId}`,
                method: 'GET',
                success: function(data) {
                 let warta = data[0];

                 $('#worship_leader').text(warta.worship_leader);
                 $('#pelayan_firman').text(warta.pelayan_firman);
                 $('#singer').text(warta.singer);
                 $('#multimedia').text(warta.multimedia);
                 $('#kolektan').text(warta.kolektan);
                 $('#pemerhatian').text(warta.pemerhatian);
                 $('#pembaca_warta').text(warta.pembaca_warta);
                 $('#notes').text(warta.notes);

                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                }
            });
        });


        $('.btn-danger').on('click', function() {
            var id = $(this).attr('data-id');
            var url = '{{ URL::to('admin/warta/delete') }}/' + id;
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
