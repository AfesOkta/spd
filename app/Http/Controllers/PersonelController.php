<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pangkat;
use App\Models\Golongan;
use App\Models\Satker;
use App\Models\Status;
class PersonelController extends Controller
{
    public function personel(Request $request){
        $data['pangkat'] = Pangkat::get();
        $data['golongan'] = Golongan::get();
        $data['satker'] = Satker::get();
        $data['status'] = Status::get();
        return view('personel', $data);
    }
}
