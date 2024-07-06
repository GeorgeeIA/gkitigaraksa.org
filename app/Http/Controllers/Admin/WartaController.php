<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\DetailWarta;
use App\Models\Warta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class WartaController extends Controller
{
  public function index()
  {
    $warta = Warta::orderBy('tanggal_kegiatan', 'DESC')->get();

    return view('admin.warta.index', compact('warta'));
  }

  public function show($id)
  {
    $warta = DetailWarta::where('warta_id', $id)->get();
    return response()->json($warta);
  }

  public function create()
  {
    return view('admin.warta.create');
  }

  public function store(Request $req)
  {
    $req->validate([
      'gambar'  => 'required|mimes:jpeg,png',
      'nama_kegiatan' => 'required|string',
      'tanggal_kegiatan' => 'required',
      'jam_kegiatan' => 'required',
      'lokasi_kegiatan' => 'required|string',
      'worship_leader' => 'required|string',
      'pelayan_firman' => 'required|string',
      'singer' => 'required|string',
      'multimedia' => 'required|string',
      'kolektan' => 'required|string',
      'pemerhatian' => 'required|string',
      'pembaca_warta' => 'required|string',
      'notes'   => 'required|string'
    ]);


    $file = $req->file('gambar');
    $filename = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
    $file->storeAs('public/warta', $filename);


    $warta = Warta::create([
      'gambar'        => $filename,
      'nama_kegiatan' => $req->nama_kegiatan,
      'tanggal_kegiatan' => $req->tanggal_kegiatan,
      'jam_kegiatan' => $req->jam_kegiatan,
      'lokasi_kegiatan' => $req->lokasi_kegiatan,
    ]);

    DetailWarta::create([
      'warta_id' => $warta->id,
      'worship_leader' => $req->worship_leader,
      'pelayan_firman' => $req->pelayan_firman,
      'singer' => $req->singer,
      'multimedia' => $req->multimedia,
      'kolektan' => $req->kolektan,
      'pemerhatian' => $req->pemerhatian,
      'pembaca_warta' => $req->pembaca_warta,
      'notes'       => $req->notes,
    ]);

    return redirect(route('admin.warta.index'))->with('success', 'Data berhasi ditambah');
  }

  public function edit($id)
  {
    $data = Warta::with('detailWarta')->find($id);
    return view('admin.warta.edit', compact('data'));
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'gambar'  => 'mimes:jpeg,png|nullable',
      'nama_kegiatan' => 'required|string',
      'tanggal_kegiatan' => 'required',
      'jam_kegiatan' => 'required',
      'lokasi_kegiatan' => 'required|string',
      'worship_leader' => 'required|string',
      'pelayan_firman' => 'required|string',
      'singer' => 'required|string',
      'multimedia' => 'required|string',
      'kolektan' => 'required|string',
      'pemerhatian' => 'required|string',
      'pembaca_warta' => 'required|string',
      'notes' => 'required|string',
    ]);

    $warta = Warta::find($id);
    $filename = $warta->gambar;

    if ($req->hasFile('gambar')) {
      $file = $req->file('gambar');
      $filename = time() . Str::slug($req->nama_kegiatan) . '.' . $file->getClientOriginalExtension();
      $file->storeAs('public/warta', $filename);
      File::delete(storage_path('app/public/warta/' . $warta->gambar));
    }

    $warta->update([
      'gambar' => $filename,
      'nama_kegiatan' => $req->nama_kegiatan,
      'tanggal_kegiatan' => $req->tanggal_kegiatan,
      'jam_kegiatan' => $req->jam_kegiatan,
      'lokasi_kegiatan' => $req->lokasi_kegiatan,
    ]);

    $detail = DetailWarta::where('warta_id', $warta->id)->first();

    $detail->update([
      'worship_leader' => $req->worship_leader,
      'pelayan_firman' => $req->pelayan_firman,
      'singer' => $req->singer,
      'multimedia' => $req->multimedia,
      'kolektan' => $req->kolektan,
      'pemerhatian' => $req->pemerhatian,
      'pembaca_warta' => $req->pembaca_warta,
      'notes' => $req->notes,
    ]);

    return redirect(route('admin.warta.index'))->with('success', 'Data berhasi diedit');
  }

  public function delete($id)
  {
    $warta = Warta::find($id);
    File::delete(storage_path('app/public/warta/' . $warta->gambar));
    DetailWarta::where('warta_id', $warta->id)->delete();
    $warta->delete();

    return back()->with('success', 'Data berhasil dihapus');
  }
}
