<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengumumanModel extends Model
{
    use HasFactory;

    protected $table = 'pengumumans';

    protected $fillable = [
      'tgl_pengumuman', 'judul', 'isi_pengumuman', 'created_by', 'is_enable', 'url_image'
    ];

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}
