<?php


namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\inap;
use App\Models\post;
use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\ruangan;
use App\Models\medis;
use App\Models\rujukan;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use PDF;
use Illuminate\Support\Facades\Storage;


class controllers extends Controller
{

    public function pasien()
    {

        if (Request('search')) {
            // $inap = DB::table('inaps')->where('nama', 'like', '%'. Request('search').'%')->get();
            // @dd($inap);
            $oldReq = Request('search');

            $pasien = pasien::where('nama', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('id', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('nik', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('tl', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('jenisKelamin', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('alamat', 'LIKE', '%' . Request('search') . '%')->get();
            // @dd($inap);


            return view('pasien', [
                'title' => 'Pasien',
                'data' => $pasien,
                'oldReq' => $oldReq,
            ]);
        }

        return view('pasien', [
            "data" => pasien::all(),
            "title" => "Pasien",
            'oldReq' => Null,
        ]);
    }
    public function detailPasien($slug)
    {
        $find = pasien::find($slug);
        return view('detailPasien', [
            'post' => $find,
            'title' => 'Detail Pasien',
        ]);
    }


    public function medis()
    {

        if (Request('search')) {

            $oldReq = Request('search');

            $medis = medis::where('nama', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('id', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('jenisKelamin', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('elemen', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('kodeRuangan', 'LIKE', '%' . Request('search') . '%')->get();
            // @dd($inap);


            return view('medis', [
                'title' => 'Medis',
                'post' => $medis,
                'oldReq' => $oldReq,
            ]);
        }
        ;
        $oldReq = Null;

        return view('medis', [
            "title" => "Medis",
            "post" => medis::all(),
            'oldReq' => $oldReq,
        ]);
    }

    public function hapusMedis($slug)
    {
        $find = medis::find($slug);
        if (!$find) {
            return redirect('medis')->withErrors(['error' => 'Id ' . $slug . ' tidak ditemukan!']);
        }


        $find->delete();


        return redirect('medis');
    }

    public function editMedis($slug)
    {
        $find = medis::find($slug);
        if (!$find) {
            return redirect('medis')->withErrors(['error' => 'Id ' . $slug . ' tidak ditemukan!']);
        }
        return view('editMedis', [
            'title' => 'Edit Medis',
            'medis' => $find,
            'ruangan' => ruangan::all(),

        ]);


    }
    public function saveMedis(Request $req)
    {
        $messages = [
            'max' => ':attribute harus terdiri maksimal :max !',
            'required' => ':attribute harus diisi!',
            'alpha_spaces' => ':attribute harus menggunakan huruf'
        ];


        $req->validate([
            'nama' => 'required|max:25|alpha_spaces',
            'elemen' => 'required|max:20',
            'jenisKelamin' => 'required',
            'ruangan' => 'required'
        ], $messages);

        DB::table('medis')->where('id', $req->id)->update([
            'nama' => $req->nama,
            'jenisKelamin' => $req->jenisKelamin,
            'kodeRuangan' => $req->ruangan,
            'elemen' => $req->elemen,

        ]);
        return redirect('medis');
    }
    public function ruangan()
    {
        $ruangan = ruangan::all();

        if (Request('search')) {

            $oldReq = Request('search');

            $ruangan = ruangan::where('nama', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('id', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('lantai', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('blok', 'LIKE', '%' . Request('search') . '%')
                ->orWhere('max', 'LIKE', '%' . Request('search') . '%')->get();
            // @dd($inap);


            return view('ruangan', [
                'title' => 'Ruangan',
                'post' => $ruangan,
                'oldReq' => $oldReq,
            ]);
        }
        ;
        $oldReq = Null;


        return view('ruangan', [
            "title" => "Ruangan",
            "post" => $ruangan,
            'oldReq' => $oldReq,

        ]);
    }
    public function about()
    {
        return view('about', [
            "title" => "About"
        ]);
    }

    public function addPasien()
    {

        return view('formPasien', [
            "title" => "Form Add Pasien",

        ]);
    }

    public function rujukan()
    {
        $ada = 'tidak ada';
        $pasien = [
            "id" => "",
            "nama" => "",
            "alamat" => "",
            "tl" => "",
            "jenisKelamin" => "",
        ];
        $tidakAda = '';

        if (Request('cari')) {
            $find = pasien::whereId(Request('cari'))->first();
            if ($find) {
                $pasien = $find;
                $ada = 'ada';

            } else {
                $tidakAda = '<h4 class="errorMessange"> id pasien tidak ditemukan </h4>';
            }
        }
        return view('rujukan', [
            "title" => "Rujukan",
            "validasi" => $tidakAda,
            "pasien" => $pasien,
            'value' => Request('cari'),
            "ada" => $ada

        ]);
    }

    public function savePasien(Request $request)
    {

        $messages = [
            'required' => ':attribute  harus diisi!!',
            'alpha_spaces' => ':attribute  hanya boleh terdiri dari huruf!',
            'max' => ':attribute  harus diisi maksimal :max karakter!',
            'unique' => ':attribute duplikat!!',
            'image' => ':attribute harus gambar'

        ];
        $request->validate(
            [
                'nama' => 'required|max:25|alpha_spaces',
                'nik' => 'max:50|required|unique:pasiens,nik',
                'alamat' => 'max:100|required',
                'jenis_kelamin' => 'max:15|required',
                'tl' => 'required',
                'img' => 'required|image|file|max:20000'


            ],
            $messages

        );
        $image = $request->file('img');
        $randomName = Str::random(10) . '.' . $image->getClientOriginalExtension();

        //akan disimpan di file storage dengan nama folder foto. 
        //agar dapat diakses di web, maka ketik php artisan storage:link pada terminal 
        $request->file('img')->storeAs('foto', $randomName);
        // $imageName = $request->file('img')->getClientOriginalName();

        DB::table('pasiens')->insert([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'tl' => $request->tl,
            'alamat' => $request->alamat,
            'jenisKelamin' => $request->jenis_kelamin,
            'img' => $randomName //akan menyimpan gambar di folder foto
        ]);
        return redirect('/pasien');





    }

    public function formMedis()
    {
        return view('formMedis', [
            "title" => "Form Tambahkan Medis",
            "ruangan" => ruangan::all(),
        ]);
    }

    public function addMedis(Request $req)
    {
        $messages = [
            'max' => ':attribute harus terdiri maksimal :max !',
            'required' => ':attribute harus diisi!',
            'alpha_spaces' => ':attribute harus menggunakan huruf'
        ];


        $req->validate([
            'nama' => 'required|max:105',
            'elemen' => 'required|max:125',
            'jenisKelamin' => 'required',
            'ruangan' => 'required',
        ], $messages);

        DB::table('medis')->insert([
            "nama" => $req->nama,
            "jenisKelamin" => $req->jenisKelamin,
            "elemen" => $req->elemen,
            "kodeRuangan" => $req->ruangan,

        ]);
        return redirect('/medis');
    }


    public function formRuangan()
    {
        return view('formRuangan', [
            "title" => "Form Tambah Ruangan",
        ]);
    }

    public function saveRuangan(Request $req)
    {
        DB::table("ruangans")->insert([
            "nama" => $req->nama,
            "lantai" => $req->lantai,
            "blok" => $req->blok,
            'max' => $req->max,
            'terisi' => $req->terisi,
            'sisa' => $req->max,

        ]);
        return redirect("ruangan");
    }
    public function hapusPasien($slug)
{
    $find = pasien::find($slug);

    if (!$find) {
        return redirect('pasien')->withErrors(['error' => 'Id ' . $slug . ' tidak ditemukan!']);
    }

    // Path ke file gambar lokal
    $fileLocalPath = public_path('foto\\').$find->img; // double backslash untuk path di Windows

    // Hapus file gambar dari lokal
    if (file_exists($fileLocalPath)) {
        unlink($fileLocalPath);
    } 
    // else {
    //     // Tambahkan log
    //     \Log::error('File not found: ' . $fileLocalPath);
    //     dd($fileLocalPath);
    // }

    // Hapus model dari database
    $find->delete();

    return redirect("pasien");
}

    public function tampilPasien($slug)
    {
        $find = pasien::whereId($slug)->first();
        return view('ubahPasien', [
            "title" => "Ubah Data Pasien",
            "post" => $find,
        ]);
    }

    public function ubahPasien(Request $req)
    {
        $messages = [
            'required' => ':attribute  harus diisi!!',
            'alpha_spaces' => ':attribute  hanya boleh terdiri dari huruf!',
            'max' => ':attribute  harus diisi maksimal :max karakter!',
            'unique' => ':attribute duplikat!!',
            'image' => ':attribute harus gambar'

        ];
        $req->validate(
            [
                'nama' => 'required|max:25|alpha_spaces',
                'nik' => 'max:50|required|unique:pasiens,nik,' . $req->oldNik . ',nik',
                'alamat' => 'max:100|required',
                'jenis_kelamin' => 'max:15|required',
                'tl' => 'required',
                'img' => 'required|image|file|max:2000'


            ],
            $messages

        );

        DB::table('pasiens')->where('id', $req->id)->update(
            [
                "id" => $req->id,
                "nik" => $req->nik,
                "nama" => $req->nama,
                "tl" => $req->tl,
                "alamat" => $req->alamat,
                "jenisKelamin" => $req->jenis_kelamin,
                'img' => $req->file('img')->store('foto'),
                //akan menyimpan gambar di folder foto

            ]
        );

        return redirect('pasien');

    }

    public function formRujukan($slug)
    {
        $pasien = pasien::find($slug);
        $dokter = medis::all();
        // Menentukan tanggal lahir
        $tanggal_lahir = Carbon::createFromDate($pasien['tl']);

        // Menghitung umur
        $umur = $tanggal_lahir->diff(Carbon::now());




        return view('formRujukan', [
            'pasien' => $pasien,
            'dokter' => $dokter,
            'title' => 'Form Rujukan',
            'umur' => $umur

        ]);
    }
    public function simpanRujukan(Request $req, $slug)
    {
        $pasien = pasien::find($slug);



        DB::table('rujukan')->insert([
            'id' => $pasien->id,
            'nik' => $pasien->nik,
            'nama' => $pasien->nama,
            'jenisKelamin' => $pasien->jenisKelamin,
            'tl' => $pasien->tl,
            'umur' => $req->umur,
            'alamat' => $pasien->alamat,
            'noTelp' => $req->noTelp,
            'keluhan' => $req->keluhan,
            'diagnosa' => $req->diagnosa,
            'dokter' => $req->dokter,
            'pRujukan' => $req->pRujukan,
            'dRujukan' => $req->dRujukan,
            'tglRujukan' => $req->tglRujukan,
            'obat' => $req->obat,
        ]);
        // Menentukan tanggal yang akan diubah formatnya
        $tanggal = $req->tglRujukan;
        $tanggalLahir = $pasien->tl;

        // Mengubah format tanggal menjadi "d/m/Y"
        $tanggalBaru = Carbon::createFromFormat('Y-m-d', $tanggal)->format('d F Y');
        $tanggalBaru2 = Carbon::createFromFormat('Y-m-d', $tanggalLahir)->format('d F Y');

        // Menampilkan tanggal dengan format baru


        $d = medis::whereId($req->dokter)->first();


        $pdf = PDF::loadView('cetakRujukan', [
            'id' => $pasien->id,
            'nik' => $pasien->nik,
            'nama' => $pasien->nama,
            'jenisKelamin' => $pasien->jenisKelamin,
            'tl' => $tanggalBaru2,
            'umur' => $req->umur,
            'alamat' => $pasien->alamat,
            'noTelp' => $req->noTelp,
            'keluhan' => $req->keluhan,
            'diagnosa' => $req->diagnosa,
            'd' => $d,
            'pRujukan' => $req->pRujukan,
            'dRujukan' => $req->dRujukan,
            'tglRujukan' => $tanggalBaru,
            'obat' => $req->obat,
        ]);
        return $pdf->download('Surat Rujukan_' . $pasien['nik'] . '.pdf');

    }






}