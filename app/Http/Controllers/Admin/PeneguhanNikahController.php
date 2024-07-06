<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PeneguhanNikah;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use setasign\Fpdi\Fpdi;


class PeneguhanNikahController extends Controller
{
  public function index()
  {
    $data = PeneguhanNikah::orderBy('created_at', 'DESC')->get();
    return view('admin.nikah.index', compact('data'));
  }

  public function edit($id)
  {
    $data = PeneguhanNikah::find($id);
    $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();
    return view('admin.nikah.edit', compact('data', 'ketuas', 'gembala'));
  }

  public function tolak($id)
  {
    $data = PeneguhanNikah::find($id);

    $data->update(['status' => 'Ditolak']);

    return back()->with('success', 'Data berhasil ditolak');
  }

  public function update(Request $req, $id)
  {
    $req->validate([
      'pengurus_ketua_id'          => 'required|exists:penguruses,id',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
      'nama_pendeta' => 'required',
    ]);

    try {
      $data = PeneguhanNikah::find($id);

      $data->update([
        'pengurus_ketua_id'              => $req->pengurus_ketua_id,
        'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
        'nama_pendeta'     => $req->nama_pendeta,
        'Status'                         => 'Selesai',
        'updated_at'                     => Carbon::now(),
      ]);

      return redirect(route('admin.peneguhan_nikah.index'))->with('success', 'Berhasil konfirmasi formulir');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
  }


  public function show($id)
  {
    $data = PeneguhanNikah::with(['ketua', 'gembala'])->find($id);

    $filePath = public_path('formulir/nikah/nikah.pdf');
    $outputFilePath = public_path('formulir/nikah/output/nikah.pdf');
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



      $left = 88;
      $top = 86;
      $formatted_id = $data->formatted_id;
      $fpdi->Text($left, $top, $formatted_id);

      $left = 120;
      $top = 86;
      $month = date_format($data->updated_at, 'm');
      $fpdi->Text($left, $top, $month);

      $fpdi->SetFont('times', '', 14);
      $left = 130.5;
      $top = 86;
      $year = date_format($data->updated_at, 'y');
      $fpdi->Text($left, $top, $year);

      $fpdi->SetFont('times', '', 12);

      $left = 73;
      $top = 96;
      $date = $data->tanggal_peneguhan->isoFormat('dddd');
      $fpdi->Text($left, $top, $date);

      $left = 110;
      $top = 96;
      $date = $data->tanggal_peneguhan->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $date);


      $left = 131;
      $top = 212.7;
      $date = $data->tanggal_peneguhan->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $date);



      $fpdi->SetFont('times', 'B', 20);

      $left = 76;
      $top = 135;
      $nama_pria = $data->nama_pria;
      $fpdi->Text($left, $top, $nama_pria);

      $left = 76;
      $top = 155;
      $nama_wanita = $data->nama_wanita;
      $fpdi->Text($left, $top, $nama_wanita);

      $fpdi->SetFont('times', '', 12);


      $left = 99;
      $top = 191;
      $nama_pendeta = $data->nama_pendeta;
      $fpdi->Text($left, $top, $nama_pendeta);

      $foto_pria = public_path() . '/storage/nikah/' . $data->foto_pria;
      $fpdi->Image($foto_pria, 40, 195, 25.7);


      $foto_wanita = public_path() . '/storage/nikah/' . $data->foto_wanita;
      $fpdi->Image($foto_wanita, 67, 195, 25.7);




      $ttd_ketua = public_path() . '/storage/pengurus/' . $data->ketua->tanda_tangan;
      $fpdi->Image($ttd_ketua, 117, 230, 40);

      $left = 112;
      $top = 252;
      $ketua = $data->ketua->nama;
      $fpdi->Text($left, $top, "( " . $ketua . " )");


      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 52, 230, 40);


      $left = 52;
      $top = 252;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
    }

    return $fpdi->Output('D', 'Surat Peneguhan Nikah  - ' . $data->nama_pria . '-' . $data->nama_wanita . '.pdf', true);
    // return $fpdi->Output($outputFilePath, 'F');
  }
}
