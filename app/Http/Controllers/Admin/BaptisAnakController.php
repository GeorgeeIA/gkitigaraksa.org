<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BaptisAnak;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class BaptisAnakController extends Controller
{
  public function index()
  {
    $data = BaptisAnak::orderBy('created_at', 'DESC')->get();

    return view('admin.baptis_anak.index', compact('data'));
  }

  public function edit($id)
  {
    $data = BaptisAnak::find($id);
    $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
    $sekretaris = Pengurus::where([['jabatan', 'Sekretaris'], ['status_jabatan', 'aktif']])->get();
    $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();

    return view('admin.baptis_anak.edit', compact('data', 'ketuas', 'sekretaris', 'gembala'));
  }

  public function update(Request $req, $id)
  {

    $req->validate([
      'pengurus_ketua_id'          => 'required|exists:penguruses,id',
      'nama_pendeta'               => 'required',
      'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
    ]);


    try {
      $data = BaptisAnak::find($id);

      $data->update([
        'pengurus_ketua_id'              => $req->pengurus_ketua_id,
        'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
        'nama_pendeta'                   => $req->nama_pendeta,
        'Status'                         => 'Selesai',
        'updated_at'                     => Carbon::now(),
      ]);

      return redirect(route('admin.baptisAnak.index'))->with('success', 'Berhasil konfirmasi formulir');
    } catch (\Throwable $th) {
      return back()->with('error', $th->getMessage());
    }
  }

  public function tolak($id)
  {
    $data = BaptisAnak::find($id);

    $data->update(['status' => 'Ditolak']);

    return back()->with('success', 'Data berhasil ditolak');
  }

  public function show($id)
  {
    $data = BaptisAnak::with(['ketua', 'sekretaris', 'gembala'])->find($id);

    $filePath = public_path('formulir/baptis/baptis_anak.pdf');
    $outputFilePath = public_path('formulir/baptis/output/baptis_anak.pdf');
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
      $top = 125;
      $nama_anak = $data->nama_anak;
      $fpdi->Text($left, $top, $nama_anak);


      $left = 82.5;
      $top = 132;
      $ttl = $data->tempat_lahir . ' / ' . $data->tanggal_lahir->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $ttl);

      $left = 82.5;
      $top = 139.4;
      $alamat = $data->alamat;
      $fpdi->Text($left, $top, $alamat);


      $left = 82.5;
      $top = 154;
      $nama_ayah = $data->nama_ayah;
      $fpdi->Text($left, $top, $nama_ayah);

      $left = 82.5;
      $top = 161;
      $nama_ibu = $data->nama_ibu;
      $fpdi->Text($left, $top, $nama_ibu);

      $left = 89.5;
      $top = 168.3;
      $nama_pendeta = $data->nama_pendeta;
      $fpdi->Text($left, $top, $nama_pendeta);


      $pas_foto = public_path() . '/storage/baptis/' . $data->pas_foto;
      $fpdi->Image($pas_foto, 79.4, 175, 25.7);

      $left = 146;
      $top = 183;
      $date = $data->updated_at->isoFormat('D MMMM Y');
      $fpdi->Text($left, $top, $date);


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

    return $fpdi->Output('D', 'Surat Baptis Anak - ' . $data->nama_anak . '.pdf', true);
  }
}
