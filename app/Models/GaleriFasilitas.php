<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriFasilitas extends Model
{
    use HasFactory;

    protected $table = 'galeri_fasilitas';

    protected $fillable = [
        'fasilitas_id',
        'gambar',
        'status',
        'urutan'
    ];

    // Scope untuk galeri yang aktif
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
            return asset('storage/images/galeri-fasilitas/' . $this->gambar);
        }
        return null;
    }

    // Relationship dengan fasilitas
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class);
    }
}
