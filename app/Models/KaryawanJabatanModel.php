<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanJabatanModel extends Model
{
    use HasFactory;
    protected $table ='karyawan_jabatans';

    protected $fillable =[
      'karyawan_id', 'jabatan_id', 'tgl_mulai', 'tgl_selesai', 'no_sk', 'tgl_sk', 'is_current'
    ];


    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
}
