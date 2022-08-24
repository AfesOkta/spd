<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    public $table = 'metode_pembayaran';
    protected $fillable = ['id_pembayaran', 'pembayaran'];
    protected $primaryKey = 'id_pembayaran';
    public $timestamps = false;
}
