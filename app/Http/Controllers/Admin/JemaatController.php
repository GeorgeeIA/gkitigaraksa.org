<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jemaat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;


class JemaatController extends Controller
{
  public function index()
  {
    $data = Jemaat::orderBy('created_at', 'DESC')->get();
    return view('admin.jemaat.index', compact('data'));
  }

  public function create()
  {
    return view('admin.jemaat.create');
  }

  public function edit($id)
  {
    $data = Jemaat::find($id);

    return view('admin.jemaat.edit', compact('data'));
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'nama'              => 'required',
      'alamat'            => 'required',
      'tempat_lahir'      => 'required',
      'tanggal_lahir'     => 'required',
      'pekerjaan'         => 'required',
      'nomor_hp'          => 'required',
      'surat_baptis'      => 'nullable|mimes:jpeg,png,jpg,pdf',
      'surat_atestasi'    => 'nullable|mimes:jpeg,png,jpg,pdf',
    ]);


    $data = Jemaat::find($id);
    $surat_baptis = $data->surat_baptis;
    $surat_atestasi = $data->surat_atestasi;

    if ($req->hasFile('surat_baptis')) {
      $file = $req->file('surat_baptis');
      $surat_baptis = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/atestasi_masuk', $surat_baptis);
      File::delete(storage_path('app/public/atestasi_masuk/' . $data->surat_baptis));
    }
    if ($req->hasFile('surat_atestasi')) {
      $file = $req->file('surat_atestasi');
      $surat_atestasi = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/atestasi_masuk', $surat_atestasi);
      File::delete(storage_path('app/public/atestasi_masuk/' . $data->surat_atestasi));
    }




    $data->update([
      'nama'                => $req->nama,
      'alamat'              => $req->alamat,
      'tempat_lahir'        => $req->tempat_lahir,
      'tanggal_lahir'       => $req->tanggal_lahir,
      'pekerjaan'           => $req->pekerjaan,
      'nomor_hp'            => $req->nomor_hp,
      'surat_baptis'        => $surat_baptis,
      'surat_atestasi'      => $surat_atestasi,
    ]);

    return redirect(route("admin.jemaat.index"))->with('success', 'Data berhasil diedit');
  }

  public function store(Request $req)
  {
    $req->validate([
      'nama'              => 'required',
      'alamat'            => 'required',
      'tempat_lahir'      => 'required',
      'tanggal_lahir'     => 'required',
      'pekerjaan'         => 'required',
      'nomor_hp'          => 'required',
      'surat_baptis'      => 'required|mimes:jpeg,png,jpg,pdf',
      'surat_atestasi'    => 'required|mimes:jpeg,png,jpg,pdf',
    ]);



    $file = $req->file('surat_baptis');
    $surat_baptis = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/atestasi_masuk', $surat_baptis);

    $file = $req->file('surat_atestasi');
    $surat_atestasi = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/atestasi_masuk', $surat_atestasi);


    Jemaat::create([
      'nama'                => $req->nama,
      'alamat'              => $req->alamat,
      'tempat_lahir'        => $req->tempat_lahir,
      'tanggal_lahir'       => $req->tanggal_lahir,
      'pekerjaan'           => $req->pekerjaan,
      'nomor_hp'            => $req->nomor_hp,
      'surat_baptis'        => $surat_baptis,
      'surat_atestasi'      => $surat_atestasi,
    ]);

    return redirect(route("admin.jemaat.index"))->with('success', 'Data berhasil ditambah');
  }

  public function delete($id)
  {
    $data = Jemaat::find($id);
    File::delete(storage_path('app/public/atestasi_masuk/' . $data->surat_baptis));
    File::delete(storage_path('app/public/atestasi_masuk/' . $data->surat_atestasi));

    $data->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
