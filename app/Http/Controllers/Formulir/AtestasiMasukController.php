<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use App\Models\AtestasiMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use setasign\Fpdi\Fpdi;
use App\Models\Jemaat;


class AtestasiMasukController extends Controller
{
    public function index()
    {
        return view('front.formulir.atestasi_masuk');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama'              => 'required',
            'alamat'            => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'pekerjaan'         => 'required',
            'nomor_hp'          => 'required',
            'surat_baptis'      => 'required|mimes:jpeg,png,jpg,pdf',
            'surat_atestasi'    => 'required|mimes:jpeg,png,jpg,pdf',
        ]);



        $file = $req->file('surat_baptis');
        $surat_baptis = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/atestasi_masuk', $surat_baptis);

        $file = $req->file('surat_atestasi');
        $surat_atestasi = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/atestasi_masuk', $surat_atestasi);


        AtestasiMasuk::create([
            'user_id'             => Auth::user()->id,
            'nama'                => $req->nama,
            'alamat'              => $req->alamat,
            'tempat_lahir'        => $req->tempat_lahir,
            'tanggal_lahir'       => $req->tanggal_lahir,
            'pekerjaan'           => $req->pekerjaan,
            'nomor_hp'            => $req->nomor_hp,
            'surat_baptis'        => $surat_baptis,
            'surat_atestasi'      => $surat_atestasi,
        ]);
        
        
    Jemaat::create([
      'nama'                => $req->nama,
      'alamat'              => $req->alamat,
      'tempat_lahir'        => $req->tempat_lahir,
      'tanggal_lahir'       => $req->tanggal_lahir,
      'pekerjaan'           => $req->pekerjaan,
      'nomor_hp'            => $req->nomor_hp,
      'surat_baptis'        => $surat_baptis,
      'surat_atestasi'      => $surat_atestasi,
    ]);

        return back()->with('success', 'Berhasil mengajukan permohonan formulir');
    }

    public function user()
    {
        $data = AtestasiMasuk::where('user_id', Auth::user()->id)->get();
        return view('user.atestasi_masuk', compact('data'));
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
        $fpdi = new Fpdi();

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
