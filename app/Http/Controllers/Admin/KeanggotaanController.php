<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Keanggotaan;
use App\Models\Pengurus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;


class KeanggotaanController extends Controller
{
    public function index()
    {
        $data = Keanggotaan::orderBy('created_at', 'DESC')->get();

        return view('admin.keanggotaan.index', compact('data'));
    }

    public function edit($id)
    {
        $data = Keanggotaan::find($id);
        $ketuas = Pengurus::where([['jabatan', 'Ketua'], ['status_jabatan', 'aktif']])->get();
        $sekretaris = Pengurus::where([['jabatan', 'Sekretaris'], ['status_jabatan', 'aktif']])->get();
        $gembala = Pengurus::where([['jabatan', 'Gembala Sidang'], ['status_jabatan', 'aktif']])->get();

        return view('admin.keanggotaan.edit', compact('data', 'ketuas', 'sekretaris', 'gembala'));
    }

    public function update(Request $req, $id)
    {

        $req->validate([
            'pengurus_ketua_id'          => 'required|exists:penguruses,id',
            'pengurus_sekretaris_id'     => 'required|exists:penguruses,id',
            'pengurus_gembala_sidang_id' => 'required|exists:penguruses,id',
        ]);


        try {
            $data = Keanggotaan::find($id);

            $data->update([
                'pengurus_ketua_id'              => $req->pengurus_ketua_id,
                'pengurus_sekretaris_id'         => $req->pengurus_sekretaris_id,
                'pengurus_gembala_sidang_id'     => $req->pengurus_gembala_sidang_id,
                'Status'                         => 'Selesai',
                'updated_at'                     => Carbon::now(),
            ]);

            return redirect(route('admin.keanggotaan.index'))->with('success', 'Berhasil konfirmasi formulir');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }
    }

    public function show($id)
    {
        $data = Keanggotaan::with(['ketua', 'sekretaris', 'gembala'])->find($id);

        $filePath = public_path('formulir/keanggotaan/keanggotaan.pdf');
        $outputFilePath = public_path('formulir/keanggotaan/output/keanggotaan.pdf');
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
            $alamat_gereja = $data->alamat_gereja;
            $fpdi->Text($left, $top, $alamat_gereja);


            $left = 53;
            $top = 83.6;
            $formatted_id = $data->formatted_id;
            $fpdi->Text($left, $top, $formatted_id);


            $left = 86.4;
            $top = 83.6;
            $year = date('y', strtotime($data->updated_at));
            $fpdi->Text($left, $top, $year);

            $left = 78;
            $top = 131.4;
            $nama = $data->nama;
            $fpdi->Text($left, $top, $nama);

            $left = 78;
            $top = 137.4;
            $ttl = $data->tempat_lahir . '  / ' .  $data->tanggal_lahir->isoFormat('D MMMM Y');
            $fpdi->Text($left, $top, $ttl);


            $left = 78;
            $top = 143.4;
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

        return $fpdi->Output('D', 'Surat Keanggotaan Jemaat - ' . $data->nama . '.pdf', true);
        // return $fpdi->Output($outputFilePath, 'F');
    }
}
