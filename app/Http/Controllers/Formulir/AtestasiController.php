<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use App\Models\Atestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;

class AtestasiController extends Controller
{
  public function index()
  {
    return view('front.formulir.atestasi');
  }


  public function store(Request $req)
  {
    $req->validate([
      'nama'              => 'required',
      'alamat'            => 'required',
      'gereja'            => 'required',
      'alamat_gereja'     => 'required',
      'alasan'            => 'required',
      'anggota_keluarga' => 'required|array',
      'anggota_keluarga.*' => 'required|string|max:255',
    ]);

    $anggota_keluarga = $req->input('anggota_keluarga');
    $formatted_anggota_keluarga = [];
    foreach ($anggota_keluarga as $index => $nama) {
      $formatted_anggota_keluarga[] = ($index + 2) . '.' . $nama;
    }
    $formatted_anggota_keluarga = implode("\n", $formatted_anggota_keluarga);



    Atestasi::create([
      'user_id'             => Auth::user()->id,
      'nama'                => $req->nama,
      'alamat'              => $req->alamat,
      'gereja'              => $req->gereja,
      'alamat_gereja'       => $req->alamat_gereja,
      'alasan'              => $req->alasan,
      'anggota_keluarga'    => $formatted_anggota_keluarga,
    ]);

    return back()->with('success', 'Berhasil mengajukan permohonan formulir');
  }


  public function user()
  {
    $data = Atestasi::where('user_id', Auth::user()->id)->get();
    return view('user.atestasi', compact('data'));
  }

  public function show($id)
  {
    $data = Atestasi::with(['ketua', 'sekretaris', 'gembala'])->find($id);

    $filePath = public_path('formulir/atestasi/atestasi.pdf');
    $outputFilePath = public_path('formulir/atestasi/output/atestasi.pdf');
    $this->pdf($filePath, $outputFilePath, $data);

    return response()->file($outputFilePath);
  }

  public function pdf($file, $outputFilePath, $data)
  {
    $fpdi = new FPDI();

    $count = $fpdi->setSourceFile($file);

    for ($i = 1; $i <= $count; $i++) {
      $template = $fpdi->importPage($i);
      $size = $fpdi->getTemplateSize($template);
      $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
      $fpdi->useTemplate($template);

      $fpdi->SetFont('times', '', 12);


      $left = 48;
      $top = 77;
      $nama = $data->nama;
      $fpdi->Text($left, $top, $nama);

      $left = 56.5;
      $top = 138.5;
      $gereja = $data->gereja;
      $fpdi->Text($left, $top, $gereja);



      $ttd_ketua = public_path() . '/storage/pengurus/' . $data->ketua->tanda_tangan;
      $fpdi->Image($ttd_ketua, 47, 196, 40);

      $left = 43;
      $top = 220;
      $ketua = $data->ketua->nama;
      $fpdi->Text($left, $top, "( " . $ketua . " )");

      $ttd_sekretaris = public_path() . '/storage/pengurus/' . $data->sekretaris->tanda_tangan;
      $fpdi->Image($ttd_sekretaris, 130, 196, 40);

      $left = 117;
      $top = 220;
      $sekretaris = $data->sekretaris->nama;
      $fpdi->Text($left, $top, "( " . $sekretaris . " )");

      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 87, 245, 40);


      $left = 87;
      $top = 268;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
    }

    return $fpdi->Output('D', 'Surat Atestasi Keluar -' . $data->nama . '.pdf', true);
  }
}
