<?php

namespace App\Observers;

use App\Models\Biaya;
use Illuminate\Support\Facades\Auth;

class BiayaObserver
{
    public function creating(Biaya $biaya)
    {
        $biaya->created_by = Auth::user()->id;
        $biaya->updated_by = Auth::user()->id;
    }

    public function updating(Biaya $biaya)
    {
        $biaya->updated_by = Auth::user()->id;
    }
}
