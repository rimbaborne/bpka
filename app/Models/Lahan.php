<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_notaris',
        'tanggal_notaris',
        'luas_tanah',
        'jumlah',
        'keterangan',
        'terima',
        'pemilik_id',
        'user_id'
    ];

    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'pemilik_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
