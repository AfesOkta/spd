<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pangkat;
use App\Models\Golongan;
use App\Models\Satker;
use App\Models\Status;
use App\Models\Personel;

class PersonelController extends Controller
{
    public function personel(Request $request){
        $data['pangkat'] = Pangkat::get();
        $data['golongan'] = Golongan::get();
        $data['satker'] = Satker::get();
        $data['status'] = Status::get();
        $data['personel'] = Personel::get();
        return view('personel', $data);
    }
    public function get_personel_data(Request $request){
        $nrp = $request->input('nrp');
        $data = Personel::find($nrp);
        if($data->count()>0) return response()->json($data);
    }
    public function add_personel(Request $request){
        $valid_input = $request->validate([
            'nama_personel'=> 'required',  
            'jabatan'=> 'nullable',  
            'id_pangkat'=> 'required',  
            'id_golongan'=> 'required',  
            'id_satker'=> 'required',  
            'id_status'=>'required'
        ]);

        // upsert
        $res = Personel::updateOrCreate(['nrp'=>$request->input('nrp')], $valid_input);
        return redirect()->back()->with('msg-success', 'Data berhasil dirubah');
    }

    
    public function delete_personel($nrp){
        $data = Personel::where('nrp', $nrp)->delete();
        if($data){
            return redirect()->route('personel')->with('msg-warning', 'Data berhasil dihapus');
        } else{
            return redirect()->route('personel')->with('msg-error', 'Data gagal dihapus');
        }
    }
}
