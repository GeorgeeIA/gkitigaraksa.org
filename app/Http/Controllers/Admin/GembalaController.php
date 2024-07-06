<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Gembala;
use File;

class GembalaController extends Controller
{
  public function index()
  {
    $gembala = Gembala::orderBy('created_at', 'DESC')->get();
    return view('admin.gembala.index', compact('gembala'));
  }

  public function store(Request $req)
  {
    $req->validate([
      'nama_lengkap' => 'required',
      'tanggal_mulai_jabatan' => 'required',
      'tanggal_akhir_jabatan' => 'required',
      'foto' => 'required|image|mimes:png,jpeg,jpg',
    ]);

    if ($req->hasFile('foto')) {
      $file = $req->file('foto');
      $filename = time() . Str::slug($req->name) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/gembala', $filename);

      $hero = Gembala::create([
        'nama_lengkap' => $req->nama_lengkap,
        'foto' => $filename,
        'tanggal_mulai_jabatan' => $req->tanggal_mulai_jabatan,
        'tanggal_akhir_jabatan' => $req->tanggal_akhir_jabatan,
      ]);

      return redirect(route('admin.gembala.index'))->with(['success' => 'Berhasil menambah data baru']);
    }
  }

  public function edit($id)
  {
    $data = Gembala::find($id);

    return view('admin.gembala.edit', compact('data'));
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'nama_lengkap' => 'required',
      'tanggal_mulai_jabatan' => 'required',
      'tanggal_akhir_jabatan' => 'required',
      'foto' => 'nullable|image|mimes:png,jpeg,jpg',
    ]);

    $data = Gembala::find($id);
    $filename = $data->foto;

    if ($req->hasFile('foto')) {
      $file = $req->file('foto');
      $filename = time() . Str::slug($req->nama_lengkap) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/gembala', $filename);
      File::delete(storage_path('app/public/gembala/' . $data->foto));
    }

    $data->update([
      'nama_lengkap' => $req->nama_lengkap,
      'foto' => $filename,
      'tanggal_mulai_jabatan' => $req->tanggal_mulai_jabatan,
      'tanggal_akhir_jabatan' => $req->tanggal_akhir_jabatan,
    ]);

    return redirect(route('admin.gembala.index'))->with('success', 'Data berhasil di edit');
  }

  public function delete($id)
  {
    $gembala = Gembala::find($id);
    File::delete(storage_path('app/public/gembala/' . $gembala->foto));

    $gembala->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
