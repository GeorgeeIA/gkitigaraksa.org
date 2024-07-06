<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NilaiAgama;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;
use Illuminate\Support\Facades\Storage;

class NilaiAgamaControler extends Controller
{
  public function index()
  {
    $data = NilaiAgama::orderBy('created_at', 'DESC')->get();

    return view('admin.nilai_agama.index', compact('data'));
  }

  public function edit($id)
  {
    $data = NilaiAgama::find($id);
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();
    $guru = Pengurus::where([['jabatan', 'Guru Sekolah Minggu'], ['status_jabatan', 'aktif']])->get();


    return view('admin.nilai_agama.update', compact('data', 'gembala', 'guru'));
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'nilai' => 'required',
      'pengurus_guru_sekolah_minggu_id'     => 'required|exists:penguruses,id',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
    ]);

    $nilai = NilaiAgama::find($id);

    $nilai->update([
      'pengurus_gembala_sidang_id' => $req->pengurus_gembala_sidang_id,
      'pengurus_guru_sekolah_minggu_id' => $req->pengurus_guru_sekolah_minggu_id,
      'nilai' => $req->nilai,
      'status' => 'Selesai',
      'updated_at' => Carbon::now(),
    ]);

    return redirect(route('admin.nilai_agama.index'))->with('success', 'Berhasil konfirmasi nilai');
  }

  public function show($id)
  {
    $data = NilaiAgama::with(['guru', 'gembala'])->find($id);

    if ($data->category == 'SD') {
      $filePath = public_path('formulir/nilai_agama/nilai_agama_sd.pdf');
      $outputFilePath = public_path('formulir/nilai_agama/output/nilai_agama_sd.pdf');
      $this->pdfSD($filePath, $outputFilePath, $data);

      return response()->file($outputFilePath);
    }

    if ($data->category == 'SMA/K' || $data->category == 'SMP') {
      $filePath = public_path('formulir/nilai_agama/nilai_agama_smp_sma.pdf');
      $outputFilePath = public_path('formulir/nilai_agama/output/nilai_agama_smp_sma.pdf');
      $this->pdfSMA($filePath, $outputFilePath, $data);

      return response()->file($outputFilePath);
    }
  }

  public function pdfSD($file, $outputFilePath, $data)
  {
    $fpdi = new FPDI();

    $count = $fpdi->setSourceFile($file);

    for ($i = 1; $i <= $count; $i++) {
      $template = $fpdi->importPage($i);
      $size = $fpdi->getTemplateSize($template);
      $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
      $fpdi->useTemplate($template);

      $fpdi->SetFont('times', 'B', 11);

      $left = 79.4;
      $top = 56.5;
      $nama = $data->formatted_id;
      $fpdi->Text($left, $top, $nama);

      $left = 135;
      $top = 56.5;
      $tahun = date('y', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);

      $left = 125;
      $top = 56.5;
      $tahun = date('m', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);

      $left = 78;
      $top = 87;
      $nama = $data->nama;
      $fpdi->Text($left, $top, $nama);

      $left = 78;
      $top = 93;
      $kelas = $data->kelas;
      $fpdi->Text($left, $top, $kelas);

      $left = 78;
      $top = 100;
      $nama_sekolah = $data->nama_sekolah;
      $fpdi->Text($left, $top, $nama_sekolah);

      $left = 78;
      $top = 107;
      $nilai = $data->nilai;
      $fpdi->Text($left, $top, $nilai);

      $left = 78;
      $top = 113.5;
      $periode_ajaran = $data->periode_ajaran;
      $fpdi->Text($left, $top, $periode_ajaran);

      $left = 50;
      $top = 166.8;
      $tahun = $data->created_at->isoFormat('D MMMM');
      $fpdi->Text($left, $top, $tahun);

      $left = 76.7;
      $top = 167.3;
      $tahun = date('y', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);

      $ttd_guru = public_path() . '/storage/pengurus/' . $data->guru->tanda_tangan;
      $fpdi->Image($ttd_guru, 42, 186, 40);


      $left = 43;
      $top = 210;
      $guru = $data->guru->nama;
      $fpdi->Text($left, $top, "( " . $guru . " )");

      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 133, 186, 40);


      $left = 132;
      $top = 210;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
    }

    return $fpdi->Output('D', 'Nilia Agama - ' . $data->nama . '.pdf', true);
    // return $fpdi->Output($outputFilePath, 'F');
  }

  public function pdfSMA($file, $outputFilePath, $data)
  {
    $fpdi = new FPDI();

    $count = $fpdi->setSourceFile($file);

    for ($i = 1; $i <= $count; $i++) {
      $template = $fpdi->importPage($i);
      $size = $fpdi->getTemplateSize($template);
      $fpdi->AddPage($size['orientation'], [$size['width'], $size['height']]);
      $fpdi->useTemplate($template);

      $fpdi->SetFont('times', 'B', 11);

      $left = 80.4;
      $top = 56.5;
      $nama = $data->formatted_id;
      $fpdi->Text($left, $top, $nama);

      $left = 124;
      $top = 56.5;
      $tahun = date('m', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);

      $left = 134;
      $top = 56.5;
      $tahun = date('y', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);



      $left = 78;
      $top = 87;
      $nama = $data->nama;
      $fpdi->Text($left, $top, $nama);

      $left = 78;
      $top = 93;
      $kelas = $data->kelas;
      $fpdi->Text($left, $top, $kelas);

      $left = 78;
      $top = 100;
      $nama_sekolah = $data->nama_sekolah;
      $fpdi->Text($left, $top, $nama_sekolah);

      $left = 78;
      $top = 107;
      $nilai = $data->nilai;
      $fpdi->Text($left, $top, $nilai);

      $left = 78;
      $top = 113.5;
      $periode_ajaran = $data->periode_ajaran;
      $fpdi->Text($left, $top, $periode_ajaran);

      $left = 50;
      $top = 160.1;
      $tahun = $data->created_at->isoFormat('D MMMM');
      $fpdi->Text($left, $top, $tahun);

      $left = 76.4;
      $top = 160.6;
      $tahun = date('y', strtotime($data->created_at));
      $fpdi->Text($left, $top, $tahun);


      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 133, 165, 40);


      $left = 132;
      $top = 190;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
    }

    return $fpdi->Output('D', 'Nilia Agama - ' .  $data->nama . '.pdf', true);
    // return $fpdi->Output($outputFilePath, 'F');
  }
}
