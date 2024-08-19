<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pemilik extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'humas',
        'nik',
        'alamat',
        'ibu_kandung',
        'nomor_telepon',
        'keterangan',
        'ktp',
        'user_id'
    ];

    public function lahan()
    {
        return $this->hasMany(Lahan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
