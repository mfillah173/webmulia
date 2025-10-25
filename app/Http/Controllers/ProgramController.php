<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index()
    {
        return view('program');
    }
    
    public function show($slug)
    {
        $programs = [
            'toilet-training-program' => [
                'title' => 'Toilet Training Program',
                'slug' => 'toilet-training-program',
                'subtitle' => 'Program Pelatihan Toilet',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Toilet+Training+Program',
                'icon' => 'fas fa-toilet',
                'description' => 'Program pelatihan toilet yang dirancang khusus untuk mengembangkan kemandirian anak berkebutuhan khusus dalam menggunakan toilet.',
                'objectives' => [
                    'Mengembangkan kemandirian dalam menggunakan toilet',
                    'Meningkatkan kesadaran tubuh anak',
                    'Membangun rutinitas yang konsisten',
                    'Meningkatkan kepercayaan diri anak'
                ],
                'methods' => [
                    'Pendekatan bertahap dan konsisten',
                    'Penggunaan visual aids dan reward system',
                    'Kolaborasi dengan orang tua',
                    'Monitoring dan evaluasi berkala',
                    'Dukungan psikologis untuk anak dan keluarga'
                ],
                'duration' => '3-6 bulan',
                'age_range' => '2-6 tahun',
                'frequency' => '5 kali seminggu',
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Toilet+Training+6'
                ]
            ],
            'pengembangan-akidah-akhlaq' => [
                'title' => 'Pengembangan Akidah Akhlaq',
                'slug' => 'pengembangan-akidah-akhlaq',
                'subtitle' => 'Program Pembentukan Karakter Islami',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Pengembangan+Akidah+Akhlaq',
                'icon' => 'fas fa-mosque',
                'description' => 'Program pembentukan karakter Islami yang menanamkan nilai-nilai agama dan akhlak mulia dalam kehidupan sehari-hari anak.',
                'objectives' => [
                    'Menanamkan nilai-nilai Islam dalam kehidupan sehari-hari',
                    'Mengembangkan akhlak mulia',
                    'Membangun karakter yang baik',
                    'Mengenalkan konsep dasar agama Islam'
                ],
                'methods' => [
                    'Pembelajaran doa-doa harian',
                    'Kisah-kisah teladan Nabi dan Rasul',
                    'Praktik adab dan sopan santun',
                    'Kegiatan amal dan sedekah',
                    'Pembelajaran nilai-nilai kebaikan'
                ],
                'duration' => 'Kontinyu',
                'age_range' => '2-6 tahun',
                'frequency' => 'Setiap hari',
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Akidah+Akhlaq+6'
                ]
            ],
            'terapi-perilaku' => [
                'title' => 'Terapi Perilaku',
                'slug' => 'terapi-perilaku',
                'subtitle' => 'Program Modifikasi Perilaku',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Terapi+Perilaku',
                'icon' => 'fas fa-brain',
                'description' => 'Program terapi perilaku yang menggunakan pendekatan ilmiah untuk mengubah perilaku negatif menjadi positif.',
                'objectives' => [
                    'Mengurangi perilaku yang tidak diinginkan',
                    'Meningkatkan perilaku positif',
                    'Mengembangkan keterampilan sosial',
                    'Meningkatkan kemampuan adaptasi'
                ],
                'methods' => [
                    'Applied Behavior Analysis (ABA)',
                    'Positive reinforcement',
                    'Token economy system',
                    'Social skills training',
                    'Behavior modification techniques'
                ],
                'duration' => '6-12 bulan',
                'age_range' => '2-12 tahun',
                'frequency' => '3-5 kali seminggu',
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Perilaku+6'
                ]
            ],
            'terapi-sensori' => [
                'title' => 'Terapi Sensori',
                'slug' => 'terapi-sensori',
                'subtitle' => 'Program Integrasi Sensorik',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Terapi+Sensori',
                'icon' => 'fas fa-hand-holding-heart',
                'description' => 'Program terapi sensori yang membantu anak mengintegrasikan informasi sensorik dan meningkatkan kemampuan regulasi diri.',
                'objectives' => [
                    'Meningkatkan kemampuan memproses informasi sensorik',
                    'Mengurangi sensitivitas berlebihan',
                    'Meningkatkan toleransi terhadap stimulus',
                    'Mengembangkan kemampuan regulasi diri'
                ],
                'methods' => [
                    'Stimulasi vestibular dan proprioceptive',
                    'Aktivitas tactile dan visual',
                    'Deep pressure dan compression',
                    'Sensory diet dan routine',
                    'Environmental modifications'
                ],
                'duration' => '6-18 bulan',
                'age_range' => '2-8 tahun',
                'frequency' => '2-3 kali seminggu',
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Terapi+Sensori+6'
                ]
            ],
            'stimulasi-tahap-perkembangan' => [
                'title' => 'Stimulasi Tahap Perkembangan',
                'slug' => 'stimulasi-tahap-perkembangan',
                'subtitle' => 'Program Stimulasi Komprehensif',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Stimulasi+Tahap+Perkembangan',
                'icon' => 'fas fa-chart-line',
                'description' => 'Program stimulasi komprehensif yang mengoptimalkan perkembangan anak sesuai dengan tahap usia dan kemampuan mereka.',
                'objectives' => [
                    'Mengoptimalkan perkembangan sesuai tahap usia',
                    'Mengidentifikasi dan mengatasi keterlambatan',
                    'Meningkatkan kemampuan kognitif dan motorik',
                    'Mempersiapkan transisi ke tahap berikutnya'
                ],
                'methods' => [
                    'Perkembangan kognitif dan bahasa',
                    'Perkembangan motorik kasar dan halus',
                    'Perkembangan sosial dan emosional',
                    'Perkembangan kemandirian',
                    'Perkembangan komunikasi'
                ],
                'duration' => 'Kontinyu',
                'age_range' => '2-6 tahun',
                'frequency' => 'Setiap hari',
                'gallery' => [
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+1',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+2',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+3',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+4',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+5',
                    'https://via.placeholder.com/800x600/ff8c00/ffffff?text=Stimulasi+Perkembangan+6'
                ]
            ]
        ];
        
        if (!isset($programs[$slug])) {
            abort(404);
        }
        
        $program = $programs[$slug];
        
        return view('program-detail', compact('program'));
    }
}
