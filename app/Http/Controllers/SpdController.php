<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spd;
use App\Models\Tujuan;
use App\Models\Pagu;
use App\Models\Personel;
class SpdController extends Controller
{
    public function index(Request $request){
        if(Spd::get()->count() >0){
            $no_spd = explode('/', Spd::latest('id_spd')->first()->no_spd);
            $no_spd = $no_spd[1]+1;
            if(strlen($no_spd) == 2){
                $no_spd = '0'.$no_spd;
            }elseif(strlen($no_spd) == 1){
                $no_spd = '00'.$no_spd;
            }
        }else{
            $no_spd = '001';
        }
        // dd($no_spd);
        $data = [
            'spd'=>Spd::get(),
            'personel'=>Personel::get(),
            'tujuan'=>Tujuan::get(),
            'pagu'=>Pagu::get(),
            'next_no_spd'=>$no_spd,
        ];
        return view('spd', $data);
    }
    public function get_spd_data(Request $request){
        $akun = $request->input('akun');
        $data = Pagu::where('akun',$akun)->get()[0];
        if($data->count()>0) return response()->json($data);
    }

    public function add_spd(Request $request){
        $valid_input = $request->validate([
            'id_spd' => 'nullable',
            'no_spd' => 'required',
            'tanggal_spd' => 'required',
            'jenis_spd' => 'required',
            'nrp' => 'required',
            'keperluan' => 'required',
            'asal_spd' => 'required',
            'tujuan_spd' => 'required',
            'tanggal_berangkat' => 'required',
            'tanggal_kembali' => 'required',
            'no_sprin' => 'required',
            'tanggal_sprin' => 'required',
            'mata_anggaran' => 'required',
            'jenis_pengeluaran' => 'required',

        ]);

        // create no spd 
        $m = ['01'=>'I','02'=>'II', '03'=>'III', '04'=>'IV', '05'=>'V', '06'=>'VI', '07'=>'VII', '08'=>'VIII', '09'=>'IX', '10'=>'X', '11'=>'XI', '12'=>'XII',];
        if($valid_input['jenis_spd'] == 'Luar Negeri'){
            $valid_input['no_spd'] = 'SPDLN/'. $valid_input['no_spd'].'/'.$m[date('m')].'/TUK.2.1/'.date('Y');
        }else{
            $valid_input['no_spd'] = 'SPD/'. $valid_input['no_spd'].'/'.$m[date('m')].'/TUK.2.1/'.date('Y');
        }
        // upsert
        $res = Spd::updateOrCreate(['id_spd'=>$valid_input['id_spd']],$valid_input);
        return redirect()->back()->with('msg-success', 'Data berhasil dirubah');
    }

    public function delete_pagu($id){
        $data = Pagu::where('id_pagu', $id)->delete();
        if($data){
            return redirect()->route('pagu')->with('msg-warning', 'Data berhasil dihapus');
        } else{
            return redirect()->route('pagu')->with('msg-error', 'Data gagal dihapus');
        }
    }
}
