<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kota()
    {
        return $this->belongsTo(Kota::class);
    }

    public static function showData($id = null)
    {
        $select = [
            'nama_mitra',
            'kota_id',
            'alamat',
            'telepon',
            'fasilitas',
            'pemanfaatan_peserta',
            'cob'
        ];
        return $id ? self::find($id) : self::select($select)->with('kota')->latest()->get();
    }
}
