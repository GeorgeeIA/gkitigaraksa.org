<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class PengurusController extends Controller
{
    public function index()
    {
        $data = Pengurus::orderBy('created_at', 'DESC')->get();
        return view('admin.pengurus.index', compact('data'));
    }

    public function create()
    {
        return view('admin.pengurus.create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama'              => 'required',
            'jabatan'           => 'required',
            'tahun_menjabat'    => 'required',
            'status_jabatan'    => 'required',
            'tanda_tangan'      => 'required|image|mimes:png,jpeg,jpg'
        ]);

        $file = $req->file('tanda_tangan');
        $filename = time() . Str::random(9) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/pengurus', $filename);


        Pengurus::create([
            'nama'              => $req->nama,
            'jabatan'           => $req->jabatan,
            'tahun_menjabat'    => $req->tahun_menjabat,
            'status_jabatan'    => $req->status_jabatan,
            'tanda_tangan'      => $filename,
        ]);

        return redirect(route('admin.pengurus.index'))->with('success', 'Berhasil menambah Data');
    }

    public function edit($id)
    {
        $data = Pengurus::find($id);

        return view('admin.pengurus.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'nama'              => 'required',
            'jabatan'           => 'required',
            'tahun_menjabat'    => 'required',
            'status_jabatan'    => 'required',
            'tanda_tangan'      => 'nullable|image|mimes:png,jpeg,jpg'
        ]);


        $data = Pengurus::find($id);
        $filename = $data->tanda_tangan;

        if ($req->hasFile('tanda_tangan')) {
            $file = $req->file('tanda_tangan');
            $filename = time() . Str::slug($req->nama) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/pengurus', $filename);
            File::delete(storage_path('app/public/pengurus/' . $data->tanda_tangan));
        }


        $data->update([
            'nama'              => $req->nama,
            'jabatan'           => $req->jabatan,
            'tahun_menjabat'    => $req->tahun_menjabat,
            'status_jabatan'    => $req->status_jabatan,
            'tanda_tangan'      => $filename,
        ]);

        return redirect(route("admin.pengurus.index"))->with('success', 'Data berhasil di edit');
    }

    public function delete($id)
    {
        $pengurus = Pengurus::find($id);
        File::delete(storage_path('app/public/pengurus/' . $pengurus->foto));

        $pengurus->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
