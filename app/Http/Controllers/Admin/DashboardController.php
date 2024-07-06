<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Atestasi;
use App\Models\AtestasiMasuk;
use App\Models\BaptisAnak;
use App\Models\BaptisDewasa;
use App\Models\BaptisSidi;
use App\Models\IzinNikah;
use App\Models\Keanggotaan;
use App\Models\NilaiAgama;
use App\Models\PeneguhanNikah;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $keluar = Atestasi::count();
    $masuk  = AtestasiMasuk::count();
    $anggota = Keanggotaan::count();
    $anak = BaptisAnak::count();
    $dewasa = BaptisDewasa::count();
    $sidi = BaptisSidi::count();
    $nikah = PeneguhanNikah::count();
    $izin = IzinNikah::count();
    $nilai = NilaiAgama::count();
    return view('admin.dashboard', compact('keluar', 'masuk', 'anggota', 'anak', 'dewasa', 'sidi', 'nikah', 'izin', 'nilai'));
  }
}
