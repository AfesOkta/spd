<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;

    public $table = 'kwitansi';
    protected $fillable = ['id_kwitansi', 'no_spd', 'rincian', 'giat', 'biaya', 'keterangan', 'id_pembayaran', 'rill'];
    protected $primaryKey = 'id_kwitansi';
    public $timestamps = false;

    public function metode(){
        return $this->hasOne(Pembayaran::class, 'id_pembayaran', 'id_pembayaran');
    }
}
