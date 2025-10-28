<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistem extends Model
{
    use HasFactory;

    protected $table = 'sistems';

    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'fitur',
        'keunggulan',
        'gambar',
        'status',
        'urutan'
    ];

    // Scope untuk sistem yang aktif
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
            return asset('storage/images/sistem/' . $this->gambar);
        }
        return null;
    }

    // Relationship dengan galeri
    public function galeri()
    {
        return $this->hasMany(GaleriSistem::class);
    }

    // Method untuk mendapatkan galeri aktif
    public function getActiveGaleri()
    {
        return $this->galeri()->where('status', 'active')->orderBy('urutan', 'asc')->get();
    }
}
