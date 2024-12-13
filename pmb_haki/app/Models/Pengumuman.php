<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pengumuman extends Model
{
    use HasFactory, SoftDeletes;

    // Nama tabel (opsional jika tabel bernama 'pengumumen')
    protected $table = 'pengumuman';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Kolom yang dapat diisi
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
    ];

    public function getGambarUrlAttribute()
    {
        return $this->gambar ? asset('storage/' . $this->gambar) : null;
    }
}
