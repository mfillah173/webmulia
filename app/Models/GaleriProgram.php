<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GaleriProgram extends Model
{
    use HasFactory;

    protected $table = 'galeri_program';

    protected $fillable = [
        'program_id',
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
            return asset('storage/images/galeri-program/' . $this->gambar);
        }
        return null;
    }

    // Relationship dengan program
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
