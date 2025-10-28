<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'tujuan',
        'metode',
        'gambar',
        'status',
        'urutan'
    ];

    // Scope untuk program yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk urutan
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/images/program/' . $this->gambar);
        }
        return null;
    }

    // Relationship dengan galeri
    public function galeri()
    {
        return $this->hasMany(GaleriProgram::class);
    }

    // Method untuk mendapatkan galeri aktif
    public function getActiveGaleri()
    {
        return $this->galeri()->where('status', 'active')->orderBy('urutan', 'asc')->get();
    }
}
