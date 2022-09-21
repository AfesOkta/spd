<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kwitansi;
use App\Models\Spd;
use App\Models\Pembayaran;
class KwitansiController extends Controller
{
    public function index(Request $request){
        $data = [
            'spd'=>Spd::orderBy('id_spd', 'desc')->get(),
            'pembayaran'=>Pembayaran::get(),
        ];
        return view('kwitansi', $data);
    }

    public function add_kwitansi(Request $request){
        $n=0;
        Kwitansi::where('no_spd', $request->input('no_spd'))->delete();
        foreach($request->input('keterangan') as $key=>$value){
            $data = [
                'no_spd' => $request->input('no_spd'),
                'rincian' => $request->input('rincian')[$n],
                'giat' => $request->input('giat')[$n],
                'biaya' => $request->input('biaya')[$n],
                'keterangan' => $value,
                'id_pembayaran' => $request->input('pembayaran'),
                'rill'=>$request->input('rill')?$request->input('rill')[$n]:'0',
            ];
            Kwitansi::insert($data);
            $n++;
        }

        return redirect()->route('kwitansi')->with('msg-success', 'Data Kwitansi Berhasil Ditambahkan');
    }
    public function get_kwitansi_data(Request $request){
        $no_spd = $request->input('no_spd');
        // dd($no_spd);
        $data['kwitansi'] = Kwitansi::where('no_spd',$no_spd)->get();
        $data['spd'] = Spd::where('no_spd',$no_spd)->get()[0];
        $data['personel'] = $data['spd']->personel;
        $data['tujuan'] = $data['spd']->tujuan;
        $data['pangkat'] = $data['spd']->personel->pangkat;
        return response()->json($data);
    }

    public function delete_kwitansi($no_spd){
        $no_spd = str_replace('-','/',$no_spd);
        $no_spd = str_replace('id=','',$no_spd);
        $del = Kwitansi::where('no_spd', $no_spd)->delete();
        if($del){
            return redirect()->route('kwitansi')->with('msg-error', 'Data kwitansi dihapus!');
        }else{
            dd($no_spd);
        }
    }
}
