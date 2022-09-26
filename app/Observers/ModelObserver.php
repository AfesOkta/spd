<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ModelObserver
{
    public function creating(Model $biaya)
    {
        // $biaya->created_by = Auth::user()->id;
        $biaya->created_at = date('Y-m-d H:i:s');
    }

    public function updating(Model $biaya)
    {
        // $biaya->updated_by = Auth::user()->id;
        $biaya->updated_at = date('Y-m-d H:i:s');
    }
}