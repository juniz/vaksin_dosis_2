<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'telp',
        'tgl_lahir',
        'tgl_dosis_1',
        'tgl_dosis_2',
        'sertifikat',
        'status'
    ];

    protected $table = 'peser';
    public $timestamps = false;
}
