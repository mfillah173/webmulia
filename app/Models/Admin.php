<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    // Scope untuk admin yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk role tertentu
    public function scopeRole($query, $role)
    {
        return $query->where('role', $role);
    }

    // Method untuk mengecek apakah super admin
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }

    // Method untuk mengecek apakah admin biasa
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
