<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = 'Jurusans';
    protected $fillable = [
        'Kode_Jurusan',
        'Nama_Jurusan',
        'Keterangan',
        'Status'
    ];
}
