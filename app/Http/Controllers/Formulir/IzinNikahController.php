<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use App\Models\IzinNikah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use setasign\Fpdi\Fpdi;

class IzinNikahController extends Controller
{
    public function index()
    {
        return view('front.formulir.izin_nikah');
    }

    public function store(Request $req)
    {
        $req->validate([
            'nama'              => 'required',
            'tempat_lahir'      => 'required',
            'tanggal_lahir'     => 'required',
            'alamat'            => 'required',
            'nama_gereja'       => 'required',
            'daerah_gereja'     => 'required',
        ]);

        IzinNikah::create([
            'user_id'             => Auth::user()->id,
            'nama'                => $req->nama,
            'tempat_lahir'        => $req->tempat_lahir,
            'tanggal_lahir'       => $req->tanggal_lahir,
            'alamat'              => $req->alamat,
            'nama_gereja'         => $req->nama_gereja,
            'daerah_gereja'       => $req->daerah_gereja,
        ]);

        return back()->with('success', 'Berhasil mengajukan permohonan formulir');
    }

    public function user()
    {
        $data = IzinNikah::where('user_id', Auth::user()->id)->get();
        return view('user.izin_nikah', compact('data'));
    }

    public function show($id)
    {
        $data = IzinNikah::with(['ketua', 'sekretaris', 'gembala'])->find($id);

        $filePath = public_path('formulir/izin_nikah/izin_nikah.pdf');
        $outputFilePath = public_path('formulir/izin_nikah/output/izin_nikah.pdf');
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


            $left = 44;
            $top = 49.6;
            $date = $data->updated_at->isoFormat('D MMMM Y');
            $fpdi->Text($left, $top, $date);

            $left = 25.5;
            $top = 69;
            $nama_gereja = $data->nama_gereja;
            $fpdi->Text($left, $top, $nama_gereja);


            $left = 25.5;
            $top = 73.8;
            $daerah_gereja = $data->daerah_gereja;
            $fpdi->Text($left, $top, $daerah_gereja);


            $left = 53;
            $top = 83.6;
            $formatted_id = $data->formatted_id;
            $fpdi->Text($left, $top, $formatted_id);


            $left = 86.4;
            $top = 83.6;
            $year = date('y', strtotime($data->updated_at));
            $fpdi->Text($left, $top, $year);

            $left = 78;
            $top = 142.4;
            $nama = $data->nama;
            $fpdi->Text($left, $top, $nama);

            $left = 78;
            $top = 147.6;
            $ttl = $data->tempat_lahir . '  / ' .  $data->tanggal_lahir->isoFormat('D MMMM Y');
            $fpdi->Text($left, $top, $ttl);


            $left = 78;
            $top = 153.4;
            $alamat = $data->alamat;
            $fpdi->Text($left, $top, $alamat);




            $ttd_ketua = public_path() . '/storage/pengurus/' . $data->ketua->tanda_tangan;
            $fpdi->Image($ttd_ketua, 47, 200, 40);

            $left = 41;
            $top = 223;
            $ketua = $data->ketua->nama;
            $fpdi->Text($left, $top, "( " . $ketua . " )");

            $ttd_sekretaris = public_path() . '/storage/pengurus/' . $data->sekretaris->tanda_tangan;
            $fpdi->Image($ttd_sekretaris, 130, 200, 40);

            $left = 120;
            $top = 223;
            $sekretaris = $data->sekretaris->nama;
            $fpdi->Text($left, $top, "( " . $sekretaris . " )");

            $ttd_gembala_sidang = public_path() . '/storage/pengurus/' . $data->gembala->tanda_tangan;
            $fpdi->Image($ttd_gembala_sidang, 87, 233, 40);


            $left = 87;
            $top = 255;
            $gembala_sidang = $data->gembala->nama;
            $fpdi->Text($left, $top, "( " . $gembala_sidang . " )");
        }

        return $fpdi->Output('D', 'Surat Izin Nikah  - ' . $data->nama . '.pdf', true);
    }
}
