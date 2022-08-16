<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pejabat extends Model
{
    use HasFactory;
    public $table = 'pejabat';
    protected $fillable = ['id_pejabat', 'nrp', 'struktural', 'keuangan'];
    protected $primaryKey = 'id_pejabat';
    public $timestamps = false;

    public function personel(){
        return $this->hasOne(Personel::class, 'nrp', 'nrp');
    }
}
