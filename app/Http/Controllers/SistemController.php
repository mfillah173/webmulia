<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SistemController extends Controller
{
    public function index()
    {
        return view('sistem');
    }
    
    public function show($slug)
    {
        $systems = [
            'one-on-one' => [
                'title' => 'One-on-One',
                'slug' => 'one-on-one',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=One-on-One+Learning',
                'icon' => 'fas fa-user',
                'description' => 'Pembelajaran individual yang disesuaikan dengan kebutuhan dan kemampuan setiap anak untuk memastikan perhatian penuh dan perkembangan optimal.',
                'features' => [
                    'Rasio guru-siswa 1:1',
                    'Program pembelajaran personal',
                    'Monitoring perkembangan individual',
                    'Penyesuaian metode pembelajaran'
                ],
                'details' => 'Sistem pembelajaran one-on-one di Mulia Special Academy memastikan setiap anak mendapat perhatian penuh dari pengajar. Dengan rasio 1:1, pengajar dapat fokus sepenuhnya pada kebutuhan, kemampuan, dan gaya belajar setiap anak. Program ini dirancang khusus untuk mengoptimalkan perkembangan anak berkebutuhan khusus.',
                'benefits' => [
                    'Perhatian penuh dari pengajar',
                    'Program pembelajaran yang disesuaikan',
                    'Monitoring perkembangan yang detail',
                    'Fleksibilitas dalam metode pembelajaran',
                    'Peningkatan kepercayaan diri anak'
                ],
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=One-on-One+6'
                ]
            ],
            'stimulasi-bertahap' => [
                'title' => 'Stimulasi Bertahap',
                'slug' => 'stimulasi-bertahap',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Stimulasi+Bertahap',
                'icon' => 'fas fa-chart-line',
                'description' => 'Sistem stimulasi yang terstruktur dan bertahap sesuai dengan tahap perkembangan anak untuk memastikan pembelajaran yang efektif.',
                'features' => [
                    'Assessment awal kemampuan',
                    'Perencanaan tahap pembelajaran',
                    'Progres bertahap sesuai kemampuan',
                    'Evaluasi dan penyesuaian berkala'
                ],
                'details' => 'Sistem stimulasi bertahap kami dirancang untuk memastikan setiap anak berkembang sesuai dengan kemampuan dan tahap perkembangannya. Melalui assessment yang komprehensif, kami membuat rencana pembelajaran yang terstruktur dan menyesuaikan progres sesuai dengan kemampuan anak.',
                'benefits' => [
                    'Perkembangan yang sesuai tahap usia',
                    'Pembelajaran yang tidak terlalu mudah atau sulit',
                    'Peningkatan kemampuan secara bertahap',
                    'Evaluasi dan penyesuaian yang berkelanjutan',
                    'Pencapaian tujuan pembelajaran yang optimal'
                ],
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Bertahap+6'
                ]
            ],
            'prompting-system' => [
                'title' => 'Prompting System',
                'slug' => 'prompting-system',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Prompting+System',
                'icon' => 'fas fa-lightbulb',
                'description' => 'Sistem prompting yang sistematis untuk membantu anak belajar dengan memberikan bantuan yang tepat pada waktu yang tepat.',
                'features' => [
                    'Visual prompting',
                    'Verbal prompting',
                    'Physical prompting',
                    'Fading prompts secara bertahap'
                ],
                'details' => 'Sistem prompting kami menggunakan berbagai jenis bantuan yang disesuaikan dengan kebutuhan anak. Mulai dari visual aids, instruksi verbal, hingga bantuan fisik, semua dirancang untuk membantu anak belajar secara efektif dan mandiri.',
                'benefits' => [
                    'Bantuan yang tepat sesuai kebutuhan',
                    'Pembelajaran yang lebih efektif',
                    'Pengembangan kemandirian secara bertahap',
                    'Peningkatan kemampuan mengikuti instruksi',
                    'Pengurangan ketergantungan pada bantuan'
                ],
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Prompting+System+6'
                ]
            ],
            'evaluasi-komprehensif' => [
                'title' => 'Evaluasi Harian, Bulanan, Semester',
                'slug' => 'evaluasi-komprehensif',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Evaluasi+Komprehensif',
                'icon' => 'fas fa-clipboard-check',
                'description' => 'Sistem evaluasi yang komprehensif untuk memantau kemajuan pembelajaran dan menyesuaikan program sesuai kebutuhan anak.',
                'features' => [
                    'Evaluasi harian perkembangan',
                    'Laporan bulanan kemajuan',
                    'Assessment semester komprehensif',
                    'Penyesuaian program pembelajaran'
                ],
                'details' => 'Sistem evaluasi kami mencakup monitoring harian, laporan bulanan, dan assessment semester yang komprehensif. Hal ini memungkinkan kami untuk terus menyesuaikan program pembelajaran sesuai dengan perkembangan dan kebutuhan setiap anak.',
                'benefits' => [
                    'Monitoring perkembangan yang berkelanjutan',
                    'Identifikasi kebutuhan yang berubah',
                    'Penyesuaian program yang tepat waktu',
                    'Dokumentasi kemajuan yang detail',
                    'Komunikasi yang efektif dengan orang tua'
                ],
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Evaluasi+Komprehensif+6'
                ]
            ],
            'kolaborasi-orang-tua' => [
                'title' => 'Kolaborasi Orang Tua',
                'slug' => 'kolaborasi-orang-tua',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Kolaborasi+Orang+Tua',
                'icon' => 'fas fa-handshake',
                'description' => 'Kerjasama erat dengan orang tua untuk memastikan konsistensi pembelajaran di rumah dan sekolah, serta memberikan dukungan optimal bagi perkembangan anak.',
                'features' => [
                    'Konsultasi rutin dengan orang tua',
                    'Pelatihan teknik pembelajaran di rumah',
                    'Sharing progress dan perkembangan',
                    'Workshop parenting khusus',
                    'Dukungan psikologis keluarga',
                    'Komunikasi terbuka dan transparan'
                ],
                'details' => 'Kolaborasi dengan orang tua adalah kunci keberhasilan pembelajaran anak. Kami menyediakan berbagai program untuk melibatkan orang tua dalam proses pembelajaran, termasuk konsultasi rutin, pelatihan teknik pembelajaran, dan workshop parenting khusus.',
                'benefits' => [
                    'Konsistensi pembelajaran di rumah dan sekolah',
                    'Dukungan optimal dari keluarga',
                    'Pemahaman yang lebih baik tentang perkembangan anak',
                    'Teknik parenting yang efektif',
                    'Komunikasi yang terbuka dan transparan',
                    'Dukungan psikologis untuk seluruh keluarga'
                ],
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Kolaborasi+Orang+Tua+6'
                ]
            ]
        ];
        
        if (!isset($systems[$slug])) {
            abort(404);
        }
        
        $system = $systems[$slug];
        
        return view('sistem-detail', compact('system'));
    }
}
