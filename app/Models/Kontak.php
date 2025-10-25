<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model
{
    use HasFactory;

    protected $table = 'kontak';

    protected $fillable = [
        'nama',
        'email',
        'telepon',
        'subjek',
        'pesan',
        'status',
        'tanggal_kirim',
        'tanggal_dibalas',
        'balasan',
        'ip_address',
        'user_agent'
    ];

    protected $casts = [
        'tanggal_kirim' => 'datetime',
        'tanggal_dibalas' => 'datetime'
    ];

    // Scope untuk pesan yang belum dibalas
    public function scopeUnread($query)
    {
        return $query->where('status', 'unread');
    }

    // Scope untuk pesan yang sudah dibalas
    public function scopeReplied($query)
    {
        return $query->where('status', 'replied');
    }

    // Scope untuk pesan berdasarkan subjek
    public function scopeBySubject($query, $subjek)
    {
        return $query->where('subjek', $subjek);
    }

    // Accessor untuk format tanggal
    public function getFormattedDateAttribute()
    {
        return $this->tanggal_kirim->format('d F Y, H:i');
    }

    // Method untuk menandai sebagai sudah dibaca
    public function markAsRead()
    {
        $this->update(['status' => 'read']);
    }

    // Method untuk membalas pesan
    public function reply($balasan)
    {
        $this->update([
            'status' => 'replied',
            'balasan' => $balasan,
            'tanggal_dibalas' => now()
        ]);
    }

    // Method untuk mendapatkan statistik kontak
    public static function getStats()
    {
        return [
            'total' => self::count(),
            'unread' => self::unread()->count(),
            'replied' => self::replied()->count(),
            'this_month' => self::whereMonth('tanggal_kirim', now()->month)->count(),
            'this_week' => self::whereBetween('tanggal_kirim', [now()->startOfWeek(), now()->endOfWeek()])->count()
        ];
    }
}
