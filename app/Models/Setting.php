<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat',
        'kota',
        'telepon',
        'email',
        'jam_operasional_senin_jumat',
        'jam_operasional_sabtu',
        'google_maps_embed',
        'facebook',
        'instagram',
        'twitter',
        'youtube'
    ];

    // Get singleton setting
    public static function getSetting()
    {
        $setting = self::first();

        if (!$setting) {
            $setting = self::create([
                'alamat' => 'Jl. Medokan Semampir Indah 99-101',
                'kota' => 'Surabaya, Jawa Timur',
                'telepon' => '082 338 414 452',
                'email' => 'msa@saim.sch.id',
                'jam_operasional_senin_jumat' => 'Senin - Jumat: 08:00 - 16:00',
                'jam_operasional_sabtu' => 'Sabtu: 09:00 - 12:00'
            ]);
        }

        return $setting;
    }
}
