<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AtestasiMasuk;
use App\Models\Jemaat;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class AtestasiMasukController extends Controller
{
  public function index()
  {
    $data = AtestasiMasuk::orderBy('created_at', 'DESC')->get();

    return view('admin.atestasi_masuk.index', compact('data'));
  }

  public function edit($id)
  {
    $data = AtestasiMasuk::find($id);
    $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
    $sekretaris = Pengurus::where([['jabatan', 'Sekretaris'], ['status_jabatan', 'aktif']])->get();
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();

    return view('admin.atestasi_masuk.edit', compact('data', 'ketuas', 'sekretaris', 'gembala'));
  }

  public function update(Request $req, $id)
  {

    $req->validate([
      'pengurus_ketua_id'          => 'required|exists:penguruses,id',
      'pengurus_sekretaris_id'     => 'required|exists:penguruses,id',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
    ]);


    try {
      $data = AtestasiMasuk::find($id);

      $data->update([
        'pengurus_ketua_id'              => $req->pengurus_ketua_id,
        'pengurus_sekretaris_id'         => $req->pengurus_sekretaris_id,
        'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
        'Status'                         => 'Selesai',
        'updated_at'                     => Carbon::now(),
      ]);


      Jemaat::create([
        'nama'                => $data->nama,
        'alamat'              => $data->alamat,
        'tempat_lahir'        => $data->tempat_lahir,
        'tanggal_lahir'       => $data->tanggal_lahir,
        'pekerjaan'           => $data->pekerjaan,
        'nomor_hp'            => $data->nomor_hp,
        'surat_baptis'        => $data->surat_baptis,
        'surat_atestasi'      => $data->surat_atestasi,
      ]);

      return redirect(route('admin.atestasi_masuk.index'))->with('success', 'Berhasil konfirmasi formulir');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
  }

  public function show($id)
  {
    $data = AtestasiMasuk::with(['ketua', 'sekretaris', 'gembala'])->find($id);

    $filePath = public_path('formulir/atestasi/atestasi_masuk.pdf');
    $outputFilePath = public_path('formulir/atestasi/output/atestasi_masuk.pdf');
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


      $left = 25.5;
      $top = 55;
      $nama = $data->nama;
      $fpdi->Text($left, $top, $nama);


      $left = 25.5;
      $top = 61;
      $alamat = $data->alamat;
      $fpdi->Text($left, $top, $alamat);



      $ttd_ketua = public_path() . '/storage/pengurus/' . $data->ketua->tanda_tangan;
      $fpdi->Image($ttd_ketua, 47, 180, 40);

      $left = 40;
      $top = 202;
      $ketua = $data->ketua->nama;
      $fpdi->Text($left, $top, "( " . $ketua . " )");

      $ttd_sekretaris = public_path() . '/storage/pengurus/' . $data->sekretaris->tanda_tangan;
      $fpdi->Image($ttd_sekretaris, 130, 180, 40);

      $left = 120;
      $top = 202;
      $sekretaris = $data->sekretaris->nama;
      $fpdi->Text($left, $top, "( " . $sekretaris . " )");

      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 87, 225, 40);


      $left = 87;
      $top = 248;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
    }

    return $fpdi->Output('D', 'Surat Atestasi Masuk - ' . $data->nama . '.pdf', true);
  }
}
