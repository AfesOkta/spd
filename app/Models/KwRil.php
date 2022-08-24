<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KwRil extends Model
{
    use HasFactory;
    public $table = 'daftar_pengeluaran_ril';
    protected $fillable = ['id_pengeluaran', 'no_spd', 'rincian', 'giat', 'biaya', 'keterangan', 'id_pembayaran'];
    protected $primaryKey = 'id_pengeluaran';
    public $timestamps = false;
}
