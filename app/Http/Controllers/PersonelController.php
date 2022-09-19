<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pangkat;
use App\Models\Golongan;
use App\Models\Satker;
use App\Models\Status;
use App\Models\Personel;
use App\Models\Spd;
use App\Models\Kwitansi;
use App\Models\Kwril;
use Illuminate\Support\Facades\Storage;
class PersonelController extends Controller
{
    public function personel(Request $request){
        $data['pangkat'] = Pangkat::get();
        $data['satker'] = Satker::get();
        $data['status'] = Status::get();
        $data['personel'] = Personel::where('is_deleted',0)->limit(10)->get();
        return view('personel', $data);
    }
    public function get_personel_data(Request $request){
        $nrp = $request->input('nrp');

        $data = Personel::find($nrp);
        $res = $data;
        $res->pangkat = $data->pangkat;
        $res->satker = $data->satker;
        $res->status = $data->status;
        return response()->json($res->toJson());
    }
    public function add_personel(Request $request){
        $valid_input = $request->validate([
            'nama_personel'=> 'required',  
            'jabatan'=> 'nullable',  
            'id_pangkat'=> 'required',
            'id_satker'=> 'required',  
            'id_status'=>'required'
        ]);
        $valid_input['is_deleted'] = 0;

        // upsert
        $res = Personel::updateOrCreate(['nrp'=>$request->input('nrp')], $valid_input);
        return redirect()->back()->with('msg-success', 'Data berhasil dirubah');
    }

    
    public function delete_personel($nrp){
        

        $data = Personel::where('nrp', $nrp)->update(['is_deleted'=>1]);
        if($data){
            return redirect()->route('personel')->with('msg-warning', 'Data berhasil dihapus');
        } else{
            return redirect()->route('personel')->with('msg-error', 'Data gagal dihapus');
        }
    }    

    public function import(){
        return view('import_personel');
    }
    public function do_import(Request $request){
        ini_set('max_execution_time', 1800);

        $path = Storage::putFileAs('public/', $request->file('personel'), 'personel.csv');

        $csvFile = fopen('storage/personel.csv', 'r');
        $data = fgetcsv($csvFile, 2000, ";");
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            
        //     // nrp0; nama1; pangkat2; golongan3; jabatan4; satker5; status6
            $nrp = $data[0];
            $pangkat = Pangkat::where('nama_pangkat', $data[2])->get()[0]->id_pangkat;
            $golongan = $pangkat;
            $personel = [
                'nama_personel'=> $data[1],  
                'jabatan'=> $data[4],  
                'id_pangkat'=> $pangkat,
                'id_satker'=> $golongan,  
                'id_status'=> Status::where('nama_status', $data[6])->get()[0]->id_status,
                'is_deleted'=>0
            ];
            
            // upsert
            Personel::updateOrCreate(['nrp'=>$nrp], $personel);
        }
        // return redirect()->back()->with('msg-success', 'Data berhasil diimport');
    }
}
