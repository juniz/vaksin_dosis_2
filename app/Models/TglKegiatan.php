<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TglKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tgl_kegiatan',
        'jam_kegiatan',
    ];

    protected $table = 'tgl_kegiatan';
    public $timestamps = false;
}
