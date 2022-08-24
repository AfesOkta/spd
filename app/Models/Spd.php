<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spd extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_spd',
        'no_spd',
        'tanggal_spd',
        'jenis_spd',
        'nrp',
        'keperluan',
        'asal_spd',
        'tujuan_spd',
        'tanggal_berangkat',
        'tanggal_kembali',
        'no_sprin',
        'tanggal_sprin',
        'mata_anggaran',
        'jenis_pengeluaran',
    ];
    public $table = 'spd';
    protected $primaryKey = 'id_spd';
    public $timestamps = false;

    public function personel(){
        return $this->hasOne(Personel::class, 'nrp', 'nrp');
    }
    public function pengikut(){
        return $this->hasMany(Pengikut::class, 'id_spd', 'id_spd');
    }
    public function kwitansi(){
        return $this->hasMany(Kwitansi::class, 'no_spd', 'no_spd');
    }
    public function tujuan(){
        return $this->hasOne(Tujuan::class, 'id_tujuan', 'tujuan_spd');
    }
}
