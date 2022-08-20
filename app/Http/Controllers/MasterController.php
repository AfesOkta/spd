<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pangkat;
use App\Models\Satker;
use App\Models\Status;
use App\Models\Tujuan;
class MasterController extends Controller
{
    public function index(Request $request){
        $data['pangkat'] = Pangkat::get();
        $data['satker'] = Satker::get();
        $data['status'] = Status::get();
        $data['tujuan'] = Tujuan::get();
        return view('master', $data);
    }

// Pangkat
public function edit_pangkat(Request $request){
    $pangkat = Pangkat::find($request->input('id_pangkat'));
    $pangkat->nama_pangkat  = $request->input('nama_pangkat');
    $pangkat->golongan      = $request->input('golongan');
    $pangkat->save();
    return redirect()->route('master')->with('tab', 'pangkat');
}
public function add_pangkat(Request $request){
    $pangkat = Pangkat::insert([
        'id_pangkat'=>$request->input('id_pangkat'),
        'nama_pangkat'=>$request->input('nama_pangkat'),
        'golongan'=>$request->input('golongan')
    ]);
    return redirect()->route('master')->with('tab', 'pangkat');
}

public function delete_pangkat(Request $request){
    $pangkat = Pangkat::where('id_pangkat',$request->input('id_pangkat'))->delete();
    return redirect()->route('master')->with('tab', 'pangkat');
}

// Satker
public function edit_satker(Request $request){
    $satker = Satker::find($request->input('id_satker'));
    $satker->nama_satker = $request->input('nama_satker');
    $satker->save();
    return redirect()->route('master')->with('tab', 'satker');
}
public function add_satker(Request $request){
    $satker = Satker::insert([
        'id_satker'=>$request->input('id_satker'),
        'nama_satker'=>$request->input('nama_satker')
    ]);
    return redirect()->route('master')->with('tab', 'satker');
}

public function delete_satker(Request $request){
    $satker = Satker::where('id_satker',$request->input('id_satker'))->delete();
    return redirect()->route('master')->with('tab', 'satker');
}
// Status
public function edit_status(Request $request){
    $status = Status::find($request->input('id_status'));
    $status->nama_status = $request->input('nama_status');
    $status->save();
    return redirect()->route('master')->with('tab', 'status');
}
public function add_status(Request $request){
    $status = Status::insert([
        'id_status'=>$request->input('id_status'),
        'nama_status'=>$request->input('nama_status')
    ]);
    return redirect()->route('master')->with('tab', 'status');
}

public function delete_status(Request $request){
    $status = Status::where('id_status',$request->input('id_status'))->delete();
    return redirect()->route('master')->with('tab', 'status');
}
// Tujuan
public function edit_tujuan(Request $request){
    $tujuan = Tujuan::find($request->input('id_tujuan'));
    $tujuan->nama_tujuan  = $request->input('nama_tujuan');
    $tujuan->uang_harian      = $request->input('uang_harian');
    $tujuan->save();
    return redirect()->route('master')->with('tab', 'tujuan');
}
public function add_tujuan(Request $request){
    $tujuan = Tujuan::insert([
        'id_tujuan'=>$request->input('id_tujuan'),
        'nama_tujuan'=>$request->input('nama_tujuan'),
        'uang_harian'=>$request->input('uang_harian')
    ]);
    return redirect()->route('master')->with('tab', 'tujuan');
}

public function delete_tujuan(Request $request){
    $tujuan = Tujuan::where('id_tujuan',$request->input('id_tujuan'))->delete();
    return redirect()->route('master')->with('tab', 'tujuan');
}

}
