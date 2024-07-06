<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\DetailWarta;
use App\Models\Gembala;
use App\Models\Hero;
use App\Models\Subhead;
use App\Models\Warta;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FrontController extends Controller
{
  public function index()
  {
    $hero = Hero::orderBy('created_at', 'DESC')->get();
    $subhero = Subhead::orderBy('created_at', 'DESC')->get();
    return view('front.index', compact('hero', 'subhero'));
  }

  public function about()
  {
    $gembala = Gembala::orderBy('created_at', 'DESC')->get();
    return view('front.about', compact('gembala'));
  }


  public function warta()
  {

    $startDate = Carbon::today();
    $endDate = Carbon::today()->addDays(7);
    $berita = Berita::query();
    $warta = Warta::query();


    if (request()->b) {
      $search = request()->b;
      $berita->where(function ($q) use ($search) {
        $q->where('judul', 'LIKE', "%{$search}%");
      });
    }

    if (request()->t) {
      $search = request()->t;
      $berita->where(function ($q) use ($search) {
        $q->where('tanggal_publish', 'LIKE', "%{$search}%");
      });
    }


    if (request()->q) {
      $search = request()->q;
      $warta->where(function ($q) use ($search) {
        $q->where('nama_kegiatan', 'LIKE', "%{$search}%")
          ->orWhere('jam_kegiatan', 'LIKE', "%{$search}%")
          ->orWhere('tanggal_kegiatan', 'LIKE', "%{$search}%")
          ->orWhere('lokasi_kegiatan', 'LIKE', "%{$search}%");
      });
    }

    if (request()->d) {
      $search = request()->d;
      $warta->where(function ($q) use ($search) {
        $q->where('tanggal_kegiatan', 'LIKE', "%{$search}%");
      });
    }

    $warta = $warta->orderBy('tanggal_kegiatan', 'DESC')->paginate(9);
    $berita = $berita->where('is_publish', 1)->orderBy('tanggal_publish', 'DESC')->get();
    return view('front.warta', compact('warta', 'berita'));
  }



  public function detailBerita($id)
  {
    $data = Berita::where('id', $id)->first();

    return view('front.detail_berita', compact('data'));
  }
  public function detailWarta($id)
  {
    $data = DetailWarta::where('warta_id', $id)->first();

    return view('front.detail_warta', compact('data'));
  }
}
