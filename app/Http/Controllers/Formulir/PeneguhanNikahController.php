<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use App\Models\PeneguhanNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;
use setasign\Fpdi\Fpdi;


class PeneguhanNikahController extends Controller
{
  public function index()
  {
    return view('front.formulir.peneguhan_nikah');
  }

  public function user()
  {
    $data = PeneguhanNikah::where('user_id', Auth::user()->id)->get();
    return view('user.nikah', compact('data'));
  }

  public function store(Request $req)
  {


    $req->validate([
      'nama_pria' => 'required',
      'kewarganegaraan_pria' => 'required',
      'alamat_pria' => 'required',
      'tempat_lahir_pria' => 'required',
      'tanggal_lahir_pria' => 'required',
      'nomor_hp_pria' => 'required',
      'sidi_pria' => 'nullable|mimes:jpeg,png,jpg,pdf',
      'anggota_gereja_pria' => 'required',
      'nama_ayah_pria' => 'required',
      'nama_ibu_pria' => 'required',
      'ttd_pria' => 'required',
      'nama_wanita' => 'required',
      'kewarganegaraan_wanita' => 'required',
      'alamat_wanita' => 'required',
      'tempat_lahir_wanita' => 'required',
      'tanggal_lahir_wanita' => 'required',
      'nomor_hp_wanita' => 'required',
      'sidi_wanita' => 'nullable|mimes:jpeg,png,jpg,pdf',
      'anggota_gereja_wanita' => 'required',
      'nama_ayah_wanita' => 'required',
      'nama_ibu_wanita' => 'required',
      'ttd_wanita' => 'required',
      'tanggal_peneguhan' => 'required',
      'jam_peneguhan' => 'required',
      'tempat_peneguhan' => 'required',
      'foto_pria' => 'required|mimes:jpeg,png,jpg',
      'foto_wanita' => 'required|mimes:jpeg,png,jpg',
    ]);

    try {
      $sidi_pria = null;
      if ($req->hasFile('sidi_pria')) {
        $file_sidi_pria = $req->file('sidi_pria');
        $sidi_pria = time() . Str::random(12) . '.' . $file_sidi_pria->getClientOriginalExtension();
        $file_sidi_pria->storeAs('public/nikah', $sidi_pria);
      }

      $sidi_wanita = null;
      if ($req->hasFile('sidi_wanita')) {
        $file_sidi_wanita = $req->file('sidi_wanita');
        $sidi_wanita = time() . Str::random(12) . '.' . $file_sidi_wanita->getClientOriginalExtension();
        $file_sidi_wanita->storeAs('public/nikah', $sidi_wanita);
      }

      $file_foto_pria = $req->file('foto_pria');
      $foto_pria = time() . Str::random(12) . '.' . $file_foto_pria->getClientOriginalExtension();
      $file_foto_pria->storeAs('public/nikah', $foto_pria);

      $file_foto_wanita = $req->file('foto_wanita');
      $foto_wanita = time() . Str::random(12) . '.' . $file_foto_wanita->getClientOriginalExtension();
      $file_foto_wanita->storeAs('public/nikah', $foto_wanita);


      $base64ImagePria = $req->input('ttd_pria');
      $ttd_pria_data = str_replace('data:image/png;base64,', '', $base64ImagePria);
      $ttd_pria_data = str_replace(' ', '+', $ttd_pria_data);
      $ttd_pria = time() . $req->nama_pria .  '.png';
      $pathPria = 'nikah/' . $ttd_pria;

      Storage::disk('public')->put($pathPria, base64_decode($ttd_pria_data));

      $base64Imagewanita = $req->input('ttd_wanita');
      $ttd_wanita_data = str_replace('data:image/png;base64,', '', $base64Imagewanita);
      $ttd_wanita_data = str_replace(' ', '+', $ttd_wanita_data);
      $ttd_wanita = time() . $req->nama_wanita . '.png';
      $pathwanita = 'nikah/' . $ttd_wanita;

      Storage::disk('public')->put($pathwanita, base64_decode($ttd_wanita_data));




      PeneguhanNikah::create([
        'user_id' => Auth::user()->id,
        'nama_pria' => $req->nama_pria,
        'kewarganegaraan_pria' => $req->kewarganegaraan_pria,
        'alamat_pria' => $req->alamat_pria,
        'tempat_lahir_pria' => $req->tempat_lahir_pria,
        'tanggal_lahir_pria' => $req->tanggal_lahir_pria,
        'nomor_hp_pria' => $req->nomor_hp_pria,
        'sidi_pria' => $sidi_pria,
        'anggota_gereja_pria' => $req->anggota_gereja_pria,
        'nama_ayah_pria' => $req->nama_ayah_pria,
        'nama_ibu_pria' => $req->nama_ibu_pria,
        'ttd_pria' => $ttd_pria,
        'nama_wanita' => $req->nama_wanita,
        'kewarganegaraan_wanita' => $req->kewarganegaraan_wanita,
        'alamat_wanita' => $req->alamat_wanita,
        'tempat_lahir_wanita' => $req->tempat_lahir_wanita,
        'tanggal_lahir_wanita' => $req->tanggal_lahir_wanita,
        'nomor_hp_wanita' => $req->nomor_hp_wanita,
        'sidi_wanita' => $sidi_wanita,
        'anggota_gereja_wanita' => $req->anggota_gereja_wanita,
        'nama_ayah_wanita' => $req->nama_ayah_wanita,
        'nama_ibu_wanita' => $req->nama_ibu_wanita,
        'ttd_wanita' => $ttd_wanita,
        'tanggal_peneguhan' =>  $req->tanggal_peneguhan,
        'jam_peneguhan' =>  $req->jam_peneguhan,
        'tempat_peneguhan' =>  $req->tempat_peneguhan,
        'foto_pria' =>  $foto_pria,
        'foto_wanita' =>  $foto_wanita,
      ]);

      return back()->with('success', 'Berhasil mengajukan permohonan formulir');
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
