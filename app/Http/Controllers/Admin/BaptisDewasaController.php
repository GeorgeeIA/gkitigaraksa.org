<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaptisDewasa;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class BaptisDewasaController extends Controller
{
  public function index()
  {
    $data = BaptisDewasa::orderBy('created_at', 'DESC')->get();

    return view('admin.baptis_dewasa.index', compact('data'));
  }

  public function edit($id)
  {
    $data = BaptisDewasa::find($id);
    $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
    $sekretaris = Pengurus::where([['jabatan', 'Sekretaris'], ['status_jabatan', 'aktif']])->get();
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();

    return view('admin.baptis_dewasa.edit', compact('data', 'ketuas', 'sekretaris', 'gembala'));
  }

  public function update(Request $req, $id)
  {

    $req->validate([
      'pengurus_ketua_id'          => 'required|exists:penguruses,id',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
    ]);


    try {
      $data = BaptisDewasa::find($id);

      $data->update([
        'pengurus_ketua_id'              => $req->pengurus_ketua_id,
        'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
        'Status'                         => 'Selesai',
        'updated_at'                     => Carbon::now(),
      ]);

      return redirect(route('admin.baptisDewasa.index'))->with('success', 'Berhasil konfirmasi formulir');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
  }

  public function tolak($id)
  {
    $data = BaptisDewasa::find($id);

    $data->update(['status' => 'Ditolak']);

    return back()->with('success', 'Data berhasil ditolak');
  }

  public function show($id)
  {
    $data = BaptisDewasa::with(['ketua', 'sekretaris', 'gembala'])->find($id);

    $filePath = public_path('formulir/baptis/baptis_dewasa.pdf');
    $outputFilePath = public_path('formulir/baptis/output/baptis_dewasa.pdf');
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


      $left = 84.4;
      $top = 90;
      $formatted_id = $data->formatted_id;
      $fpdi->Text($left, $top, $formatted_id);



      $left = 117.4;
      $top = 89.7;
      $month = date('m', strtotime($data->updated_at));
      $fpdi->Text($left, $top, $month);

      $left = 124.4;
      $top = 89.7;
      $year = date('Y', strtotime($data->updated_at));
      $fpdi->Text($left, $top, $year);


      $left = 74.4;
      $top = 101.9;
      $hari = $data->updated_at->isoFormat('dddd');
      $fpdi->Text($left, $top, $hari);

      $left = 124.4;
      $top = 101.9;
      $tanggal = $data->updated_at->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $tanggal);


      $left = 82.5;
      $top = 132;
      $nama = $data->nama;
      $fpdi->Text($left, $top, $nama);

      $left = 82.5;
      $top = 139.4;
      $ttl = $data->tempat_lahir . ' / ' . $data->tanggal_lahir->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $ttl);



      $left = 82.5;
      $top = 146.5;
      $alamat = $data->alamat;
      $fpdi->Text($left, $top, $alamat);


      $left = 82.5;
      $top = 153.5;
      $tgl_baptis = 'Tigaraksa, ' . $data->updated_at->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $tgl_baptis);



      $left = 145.5;
      $top = 175.8;
      $tangga_cetak = $data->updated_at->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $tangga_cetak);



      $pas_foto = public_path() . '/storage/baptis/' . $data->pas_foto;
      $fpdi->Image($pas_foto, 79.4, 167, 25.7);


      $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
      $fpdi->Image($ttd_gembala_sidang, 50, 208, 40);


      $left = 50;
      $top = 231;
      $gembala_sidang = $data->gembala->nama;
      $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");


      $ttd_ketua = public_path() . '/storage/pengurus/' . $data->ketua->tanda_tangan;
      $fpdi->Image($ttd_ketua, 118, 208, 40);

      $left = 115;
      $top = 231;
      $ketua = $data->ketua->nama;
      $fpdi->Text($left, $top, "( " . $ketua . " )");
    }

    return $fpdi->Output('D', 'Surat Baptis Dewasa - ' . $data->nama . '.pdf', true);
    // return $fpdi->Output($outputFilePath, 'F');
  }
}
