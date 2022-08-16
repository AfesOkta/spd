<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pangkat;
use App\Models\Golongan;
use App\Models\Satker;
use App\Models\Status;
class MasterController extends Controller
{
    public function index(Request $request){
        $data['pangkat'] = Pangkat::get();
        $data['golongan'] = Golongan::get();
        $data['satker'] = Satker::get();
        $data['status'] = Status::get();
        return view('master', $data);
    }

// Pangkat
public function edit_pangkat(Request $request){
    $pangkat = Pangkat::find($request->input('id_pangkat'));
    $pangkat->nama_pangkat = $request->input('nama_pangkat');
    $pangkat->save();
    return redirect()->route('master')->with('tab', 'pangkat');
}
public function add_pangkat(Request $request){
    $pangkat = Pangkat::insert([
        'id_pangkat'=>$request->input('id_pangkat'),
        'nama_pangkat'=>$request->input('nama_pangkat')
    ]);
    return redirect()->route('master')->with('tab', 'pangkat');
}

public function delete_pangkat(Request $request){
    $pangkat = Pangkat::where('id_pangkat',$request->input('id_pangkat'))->delete();
    return redirect()->route('master')->with('tab', 'pangkat');
}
// Golongan
public function edit_golongan(Request $request){
    $golongan = Golongan::find($request->input('id_golongan'));
    $golongan->nama_golongan = $request->input('nama_golongan');
    $golongan->save();
    return redirect()->route('master')->with('tab', 'golongan');
}
public function add_golongan(Request $request){
    $golongan = Golongan::insert([
        'id_golongan'=>$request->input('id_golongan'),
        'nama_golongan'=>$request->input('nama_golongan')
    ]);
    return redirect()->route('master')->with('tab', 'golongan');
}

public function delete_golongan(Request $request){
    $golongan = Golongan::where('id_golongan',$request->input('id_golongan'))->delete();
    return redirect()->route('master')->with('tab', 'golongan');
}
}
