<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pejabat;
use App\Models\Pangkat;
use App\Models\Personel;
class PejabatController extends Controller
{
    public function index(Request $request){
        $data = [
            'pangkat'=>Pangkat::get(),
            'pejabat'=>Pejabat::get(),
        ];
        return view('pejabat', $data);
    }
    public function get_pejabat_data(Request $request){
        $nrp = $request->input('nrp');
        $data = Pejabat::where('nrp',$nrp)->get();
        if($data->count() < 1 ){
            $data = Personel::find($nrp);
        }else{
            $data = $data[0];
        }

        $res = [
            'nrp' => $data->nrp,
            'nama_personel' => $data->personel?$data->personel->nama_personel:$data->nama_personel,
            'id_pangkat' => $data->personel?$data->personel->id_pangkat:$data->id_pangkat,
            'jabatan' => $data->jabatan?$data->jabatan:$data->struktural,
            'keuangan' => $data->keuangan?$data->keuangan:'',
        ];
        if($data->count()>0) return response()->json($res);
    }

    public function add_pejabat(Request $request){
        $valid_input = $request->validate([
            'struktural'=> 'required',  
            'keuangan'=> 'required',  
        ]);

        // upsert
        $res = Pejabat::updateOrCreate(['nrp'=>$request->input('nrp')],$valid_input);
        return redirect()->back()->with('msg-success', 'Data berhasil dirubah');
    }

    public function delete_pejabat($id){
        $data = Pejabat::where('id_pejabat', $id)->delete();
        if($data){
            return redirect()->route('pejabat')->with('msg-warning', 'Data berhasil dihapus');
        } else{
            return redirect()->route('pejabat')->with('msg-error', 'Data gagal dihapus');
        }
    }
}
