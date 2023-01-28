<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory; //eloquent ORM
    protected $table = 'pelanggan';
    // protected $fillable = ['nama', 'alamat', 'nomor_telepon'];
    protected $guarded = [''];

    public function pesanan()
    {
       return $this->hasMany(Pesanan::class, 'pesanan_id', 'id');
    }    
}
