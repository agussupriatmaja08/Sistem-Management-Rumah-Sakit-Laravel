<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\akunadmin;
use Illuminate\Support\Facades\DB;

class loginAdmin extends Controller
{
    public function loginAdmin(){
        $sess = session()->has('key');
        if(!$sess){
        $ada = 'ada';
        return view('login', [
        'ada' => $ada,    
        ]);
        }else{
            return redirect('home');
        }
       
    }

    public function validasi(Request $req){
        $find =  akunadmin::find($req->username);
        if($find){
            $pass = md5($req->password);
            if ($find->password === $pass){
                session()->put('key', 'admin');
                return redirect('home');

            } else{
                $ada = '1';
                return view('login', [
                    'ada' => $ada,
                ]);
            }
        }else{
            $ada= '1';
            return view('login', [
                'ada' => $ada
            ]);       
         }


    }

    public function logout(){
        session()->flush();
        session()->regenerate();

        $ada = 'ada';
        return view('login', [
        'ada' => $ada,    
        ]);
    }
}
