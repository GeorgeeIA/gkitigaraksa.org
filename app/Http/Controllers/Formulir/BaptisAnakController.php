<?php

namespace App\Http\Controllers\Formulir;

use App\Http\Controllers\Controller;
use App\Models\BaptisAnak;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use setasign\Fpdi\Fpdi;

class BaptisAnakController extends Controller
{
    public function index()
    {
        return view('front.formulir.baptis_anak');
    }

    public function store(Request $req)
    {
        $req->validate(
            [
                'nama_ayah'         => 'required',
                'nama_ibu'         => 'required',
                'nama_anak'         => 'required',
                'alamat'            => 'required',
                'tempat_lahir'      => 'required',
                'tanggal_lahir'     => 'required',
                'nomor_hp'          => 'required',
                'akte_kelahiran'      => 'required|mimes:jpeg,png,jpg,pdf',
                'pas_foto'     => 'required|mimes:jpeg,png|dimensions:ratio=3/4',
            ],
            [
                'pas_foto.dimensions' => 'Foto harus berukuran 3 X 4'
            ]
        );



        $file = $req->file('akte_kelahiran');
        $akte_kelahiran = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/baptis', $akte_kelahiran);

        $file = $req->file('pas_foto');
        $pas_foto = time() . Str::random(12) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('public/baptis', $pas_foto);


        BaptisAnak::create([
            'user_id'             => Auth::user()->id,
            'nama_ayah'           => $req->nama_ayah,
            'nama_ibu'            => $req->nama_ibu,
            'nama_anak'           => $req->nama_anak,
            'alamat'              => $req->alamat,
            'tempat_lahir'        => $req->tempat_lahir,
            'tanggal_lahir'       => Carbon::parse($req->tanggal_lahir),
            'nomor_hp'            => $req->nomor_hp,
            'akte_kelahiran'      => $akte_kelahiran,
            'pas_foto'            => $pas_foto,
        ]);

        return back()->with('success', 'Berhasil mengajukan permohonan formulir');
    }


    public function user()
    {
        $data = BaptisAnak::where('user_id', Auth::user()->id)->get();
        return view('user.baptis_anak', compact('data'));
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
        $fpdi = new Fpdi();

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
            $alamat = $data->alamat;
            $fpdi->Text($left, $top, $alamat);


            $left = 82.5;
            $top = 139.4;
            $ttl = $data->tempat_lahir . ' / ' . $data->tanggal_lahir->isoFormat('D MMMM Y');
            $fpdi->Text($left, $top, $ttl);


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
        // return $fpdi->Output($outputFilePath, 'F');
    }
}
