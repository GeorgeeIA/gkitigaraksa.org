<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Hero;
use App\Models\Subhead;
use File;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function hero()
    {
        $hero = Hero::orderBy('created_at', 'DESC')->get();
        return view('admin.home.hero.index', compact('hero'));
    }

    public function heroStore(Request $req)
    {

        $req->validate([
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'gambar'        => 'required|image|mimes:png,jpeg,jpg',
        ]);

        if ($req->hasFile('gambar')) {

            $file = $req->file('gambar');
            $filename = time() . Str::slug($req->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/hero', $filename);


            $hero = Hero::create([
                'judul'               => $req->judul,
                'deskripsi'           => $req->deskripsi,
                'gambar'              => $filename,
            ]);

            return redirect(route('admin.hero.index'))->with(['success' => 'Berhasil menambah data baru']);
        }
    }


    public function subhero()
    {
        $subhero = Subhead::orderBy('created_at', 'DESC')->get();
        return view('admin.home.subhero.index', compact('subhero'));
    }

    public function subheroStore(Request $req)
    {

        $req->validate([
            'gambar'        => 'required|image|mimes:png,jpeg,jpg',
        ]);

        if ($req->hasFile('gambar')) {

            $file = $req->file('gambar');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/subhero', $filename);

            $subhero = Subhead::create([
                'gambar'              => $filename,
            ]);

            return redirect(route('admin.subhero.index'))->with(['success' => 'Berhasil menambah data baru']);
        }
    }

    public function subheroEdit($id)
    {
        $data = Subhead::find($id);

        return view('admin.home.subhero.edit', compact('data'));
    }

    public function subheroUpdate(Request $req, $id)
    {
        $req->validate([
            'gambar'      => 'required|image|mimes:png,jpeg,jpg'
        ]);


        $data = Subhead::find($id);
        $filename = $data->gambar;

        if ($req->hasFile('gambar')) {
            $file = $req->file('gambar');
            $filename = time()  . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/subhero', $filename);
            File::delete(storage_path('app/public/subhero/' . $data->gambar));
        }


        $data->update([
            'gambar'              => $filename,
        ]);

        return redirect(route("admin.subhero.index"))->with('success', 'Data berhasil di edit');
    }

    public function subheroDelete($id)
    {
        $subhead = Subhead::find($id);
        File::delete(storage_path('app/public/subhero/' . $subhead->gambar));

        $subhead->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }


    public function kegiatanIbadah()
    {
        return view('admin.home.kegiatan.index');
    }



    public function edit($id)
    {
        $data = Hero::find($id);

        return view('admin.home.hero.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $req->validate([
            'judul'         => 'required',
            'deskripsi'     => 'required',
            'tanda_tangan'      => 'nullable|image|mimes:png,jpeg,jpg'
        ]);


        $data = Hero::find($id);
        $filename = $data->gambar;

        if ($req->hasFile('gambar')) {
            $file = $req->file('gambar');
            $filename = time() . Str::slug($req->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/hero', $filename);
            File::delete(storage_path('app/public/hero/' . $data->gambar));
        }


        $data->update([
            'judul'               => $req->judul,
            'deskripsi'           => $req->deskripsi,
            'gambar'              => $filename,
        ]);

        return redirect(route("admin.hero.index"))->with('success', 'Data berhasil di edit');
    }

    public function delete($id)
    {
        $hero = Hero::find($id);
        File::delete(storage_path('app/public/hero/' . $hero->gambar));

        $hero->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
