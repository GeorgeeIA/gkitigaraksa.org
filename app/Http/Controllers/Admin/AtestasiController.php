<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Atestasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;
use App\Models\Pengurus;

class AtestasiController extends Controller
{
  public function index()
  {
    $data = Atestasi::orderBy('created_at', 'DESC')->get();

    return view('admin.atestasi.index', compact('data'));
  }

  public function edit($id)
  {
    $data = Atestasi::find($id);
    $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
    $sekretaris = Pengurus::where([['jabatan', 'Sekretaris'], ['status_jabatan', 'aktif']])->get();
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();

    return view('admin.atestasi.edit', compact('data', 'ketuas', 'sekretaris', 'gembala'));
  }

  public function update(Request $req, $id)
  {

    $req->validate([
      'pengurus_ketua_id'          => 'required|exists:penguruses,id',
      'pengurus_sekretaris_id'     => 'required|exists:penguruses,id',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
    ]);


    try {
      $data = Atestasi::find($id);

      $data->update([
        'pengurus_ketua_id'              => $req->pengurus_ketua_id,
        'pengurus_sekretaris_id'         => $req->pengurus_sekretaris_id,
        'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
        'Status'                         => 'Selesai',
        'updated_at'                     => Carbon::now(),
      ]);

      return redirect(route('admin.atestasi.index'))->with('success', 'Berhasil konfirmasi formulir');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
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


      $left = 25;
      $top = 77;
      $nama = $data->nama;
      $fpdi->Text($left, $top, '1.' . $nama);

      $anggota_keluarga_list = explode("\n", $data->anggota_keluarga);
      $left = 25;
      $top = 82;

      foreach ($anggota_keluarga_list as $anggota) {
        $fpdi->Text($left, $top, $anggota);
        $top += 6;
        $fpdi->SetY($top);
      }


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
    // return $fpdi->Output($outputFilePath, 'F');
  }
}
