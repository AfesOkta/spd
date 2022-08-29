<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KwRil;
use App\Models\Spd;
use App\Models\Pembayaran;
class KwrilController extends Controller
{

    public function add_kwitansi(Request $request){
        $n=0;
        KwRil::where('no_spd', $request->input('no_spd'))->delete();
        foreach($request->input('keterangan') as $key=>$value){
            $data = [
                'no_spd' => $request->input('no_spd'),
                'rincian' => $request->input('rincian')[$n],
                'giat' => $request->input('giat')[$n],
                'biaya' => $request->input('biaya')[$n],
                'keterangan' => $value,
                'id_pembayaran' => $request->input('id_pembayaran'),
            ];

            KwRil::insert($data);
            $n++;
        }

        return redirect()->route('kwitansi')->with('msg-success', 'Data Kwitansi Berhasil Ditambahkan');
    }
    public function get_kwitansi_data(Request $request){
        $no_spd = $request->input('no_spd');
        // dd($no_spd);
        $data['kwitansi'] = KwRil::where('no_spd',$no_spd)->get();
        $data['spd'] = Spd::where('no_spd',$no_spd)->get()[0];
        $data['personel'] = $data['spd']->personel;
        $data['tujuan'] = $data['spd']->tujuan;
        $data['pangkat'] = $data['spd']->personel->pangkat;
        return response()->json($data);
    }

    public function delete_kwitansi($no_spd){
        $no_spd = str_replace('-','/',$no_spd);
        $no_spd = str_replace('id=','',$no_spd);
        $del = KwRil::where('no_spd', $no_spd)->delete();
        if($del){
            return redirect()->route('kwitansi')->with('msg-error', 'Data kwitansi dihapus!');
        }else{
            dd($no_spd);
        }
    }
}
