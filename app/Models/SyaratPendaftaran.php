<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyaratPendaftaran extends Model
{
    use HasFactory;

    protected $table = 'syarat_pendaftaran';

    protected $fillable = [
        'jenjang',
        'nama_syarat',
        'deskripsi',
        'status',
        'urutan'
    ];

    // Scope untuk syarat yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk jenjang tertentu
    public function scopeByJenjang($query, $jenjang)
    {
        return $query->where('jenjang', $jenjang);
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    // Method untuk mendapatkan syarat berdasarkan jenjang
    public static function getByJenjang($jenjang)
    {
        return self::active()->byJenjang($jenjang)->ordered()->get();
    }

    // Method untuk mendapatkan semua jenjang
    public static function getJenjang()
    {
        return self::select('jenjang')->distinct()->pluck('jenjang');
    }
}
