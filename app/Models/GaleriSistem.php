<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriSistem extends Model
{
    use HasFactory;

    protected $table = 'galeri_sistem';

    protected $fillable = [
        'sistem_id',
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
            return asset('storage/images/galeri-sistem/' . $this->gambar);
        }
        return null;
    }

    // Relationship dengan sistem
    public function sistem()
    {
        return $this->belongsTo(Sistem::class);
    }
}
