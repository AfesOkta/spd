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
        foreach($request->input('keterangan') as $key=>$value){
            $data = [
                'no_spd' => $request->input('no_spd'),
                'rincian' => $request->input('rincian')[$key],
                'giat' => $request->input('giat')[$key],
                'biaya' => $request->input('biaya')[$key],
                'keterangan' => $value,
                'id_pembayaran' => $request->input('pembayaran'),
            ];

            Kwitansi::insert($data);
        }

        return redirect()->route('kwitansi')->with('msg-success', 'Data Kwitansi Berhasil Ditambahkan');
    }
}
