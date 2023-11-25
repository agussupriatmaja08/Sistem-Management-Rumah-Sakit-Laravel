<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\pasien;
use App\Models\ruangan;
use App\Models\inap;
use Illuminate\Support\Facades\DB;
class inapControllers extends Controller
{
    //

    public function inap(){
    $inap = inap::all();

    // @dd($inap);

    if(Request('search') ){
        // $inap = DB::table('inaps')->where('nama', 'like', '%'. Request('search').'%')->get();
        // @dd($inap);
        $oldReq = Request('search');
        
        $inap = inap::where('nama', 'LIKE', '%'. Request('search').'%')
        ->orWhere('id', 'LIKE', '%'. Request('search').'%')
        ->orWhere('idPasien', 'LIKE', '%'. Request('search').'%')
        ->orWhere('kodeRuangan', 'LIKE', '%'. Request('search').'%')->get();
        // @dd($inap);


        return view('inap', [
            'title' => 'Data Pasien Inap', 
            'inaps' => $inap,
            'oldReq' => $oldReq,
        ]);    
    }

    

    $ruangan = ruangan::all();
    foreach ($ruangan as $r) {
            $isi = DB::table('inaps')->where('kodeRuangan', $r['id'])->count();
            $sisa = $r['max'] - $isi;
            DB::table('ruangans')->where('id', $r['id'])->update([
                'terisi' => $isi,
                'sisa' => $sisa,

            ]);

    }

    $oldReq = Null;
    return view('inap', [
        'title' => 'Data Pasien Inap', 
        'inaps' => $inap,
        'oldReq' => $oldReq,
    ]);

    }
    public function hapusInap($slug){
        $find = inap::find($slug);
        $find->delete();
        return redirect('inap');
    }
    public function tambahInap(){
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
        return view('tambahInap', [
            'title' => 'Pengelolaan Pasien Inap',
            "validasi" => $tidakAda,
            "pasien" => $pasien,
            'value' => Request('cari'),
            "ada" => $ada

        ]);
        
    }

    public function formInap($slug){
        $rooms = ruangan::all();
        $pasien = pasien::find($slug);
        $tanggal_lahir = Carbon::createFromDate($pasien['tl']);


        
        // Menghitung umur
        $umur = $tanggal_lahir->diff(Carbon::now());
        return view('formInap', [
            'pasien' => $pasien,
            'title' => 'Form Inap',
            'ruangan' => $rooms,
            'umur' => $umur
        ]);      
    }

    public function saveInap($slug, Request $req){
        
        
        $find = pasien::find($slug);
        $ruangans = ruangan::find($req->ruangan);
        // $ruangans = DB::table('ruangans')->where('kodeRuangan', $req->ruangan)->get();
        // var_dump($ruangans);

        if($ruangans['terisi'] === $ruangans['max'] ){
            return redirect('formInap/'. $slug)->withErrors(['error'=>   'Ruangan dengan id ' . $ruangans['id'] .' sudah penuh!']);
        }

        // @dd(
        //     $ruangans
        // );
        // $ruangan = ruangan::where('kodeRuangan', $req->ruangan);
        $alamat = $ruangans['lantai'] . '-'.  $ruangans['blok'] ; 
        
        DB::table('inaps')->insert([
            'idPasien' => $find['id'], 
            'nama' => $find["nama"], 
            'kodeRuangan' => $req->ruangan,
            'ruangan' => $ruangans["nama"], 
            'alamat' => $alamat,
            'tglInap' => $req->tglInap, 
            'noTelp' => $req->noTelp, 

        ]);

        return redirect('inap');
    }

}
