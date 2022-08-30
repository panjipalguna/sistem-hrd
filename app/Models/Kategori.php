<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'kategori_items';

    protected $fillable =[
      'nama_kategori','sub_kategori'
    ];

    public function sub_kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
