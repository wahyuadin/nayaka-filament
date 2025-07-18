<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    use HasFactory;

    public function departement()
    {
        return $this->belongsTo(DepartementCarrier::class);
    }

    public function location()
    {
        return $this->belongsTo(LocationCarrier::class);
    }
    public function pengalaman()
    {
        return $this->belongsTo(PengalamanCarrier::class);
    }

    public static function showData($id = null)
    {
        return $id ? self::find($id)->get() : self::where('is_active', true)->latest()->get();
    }
}
