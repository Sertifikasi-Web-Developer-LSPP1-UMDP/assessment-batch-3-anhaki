<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id',
        'nama',
        'telepon',
        'alamat',
        'tanggal_lahir',
        'program_studi',
        'asal_sma',
        'nilai_ijazah',
    ];
}
