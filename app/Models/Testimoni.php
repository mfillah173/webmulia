<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    use HasFactory;

    protected $table = 'testimoni';

    protected $fillable = [
        'gambar',
        'deskripsi',
        'nama_narasumber',
        'jabatan'
    ];

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('storage/images/testimoni/' . $this->gambar);
        }
        return asset('images/default-avatar.png');
    }

    // Accessor untuk excerpt deskripsi
    public function getExcerptAttribute()
    {
        return \Str::limit(strip_tags($this->deskripsi), 150);
    }
}
