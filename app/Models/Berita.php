<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'tanggal',
        'status',
        'kategori',
        'meta_description',
        'meta_keywords'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'meta_keywords' => 'array'
    ];

    // Scope untuk berita yang aktif
    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    // Scope untuk berita berdasarkan kategori
    public function scopeByCategory($query, $kategori)
    {
        return $query->where('kategori', $kategori);
    }

    // Accessor untuk excerpt
    public function getExcerptAttribute()
    {
        return \Str::limit(strip_tags($this->konten), 150);
    }

    // Accessor untuk URL gambar
    public function getImageUrlAttribute()
    {
        if ($this->gambar) {
            return asset('images/berita/' . $this->gambar);
        }
        return null;
    }

    // Method untuk mendapatkan berita terkait
    public function getRelatedPosts($limit = 3)
    {
        return self::active()
            ->where('id', '!=', $this->id)
            ->where('kategori', $this->kategori)
            ->limit($limit)
            ->get();
    }
}
