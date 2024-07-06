<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;


class BeritaController extends Controller
{
  public function index()
  {
    $berita = Berita::orderBy('tanggal_publish', 'DESC')->get();
    return view('admin.berita.index', compact('berita'));
  }

  public function create()
  {
    return view('admin.berita.create');
  }

  public function store(Request $req)
  {
    $req->validate([
      'judul'           => 'required',
      'thumbnail'       => 'required',
      'tanggal_publish' => 'required',
      'is_publish'      => 'required',
      'deskripsi'       => 'required',
      'isi'             => 'required'
    ]);


    try {


      $file = $req->file('thumbnail');
      $filename = time() . Str::slug($req->judul) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/berita', $filename);


      $hero = Berita::create([
        'judul'               => $req->judul,
        'thumbnail'           => $filename,
        'tanggal_publish'     => $req->tanggal_publish,
        'is_publish'          => $req->is_publish,
        'deskripsi'           => $req->deskripsi,
        'isi'                 => $req->isi,
      ]);

      return redirect(route('admin.berita.index'))->with(['success' => 'Berhasil menambah data baru']);
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
  }

  public function edit($id)
  {
    $data = Berita::find($id);

    return view('admin.berita.edit', compact('data'));
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'judul'           => 'required',
      'tanggal_publish' => 'required',
      'is_publish'      => 'required',
      'deskripsi'       => 'required',
      'isi'             => 'required'
    ]);

    $data = Berita::find($id);
    $filename = $data->thumbnail;

    if ($req->hasFile('thumbnail')) {
      $file = $req->file('thumbnail');
      $filename = time() . Str::slug($req->nama_lengkap) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/berita', $filename);
      File::delete(storage_path('app/public/berita/' . $data->thumbnail));
    }

    $data->update([
      'judul'               => $req->judul,
      'thumbnail'           => $filename,
      'tanggal_publish'     => $req->tanggal_publish,
      'is_publish'          => $req->is_publish,
      'deskripsi'           => $req->deskripsi,
      'isi'                 => $req->isi,
    ]);
    return redirect(route("admin.berita.index"))->with('success', 'Data berhasil di edit');
  }

  public function delete($id)
  {

    $berita = Berita::find($id);
    File::delete(storage_path('app/public/berita/' . $berita->foto));

    $berita->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
