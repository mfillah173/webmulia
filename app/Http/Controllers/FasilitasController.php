<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    public function index()
    {
        return view('fasilitas');
    }
    
    public function show($slug)
    {
        $facilities = [
            'ruang-belajar-one-on-one' => [
                'title' => 'Ruang Belajar One-on-One',
                'slug' => 'ruang-belajar-one-on-one',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Ruang+Belajar+One-on-One',
                'description' => 'Ruang pembelajaran individual yang dirancang khusus untuk pembelajaran one-on-one dengan fasilitas yang mendukung konsentrasi dan fokus anak.',
                'features' => [
                    'Pencahayaan yang optimal',
                    'Akustik yang terkontrol',
                    'Furnitur yang dapat disesuaikan',
                    'Area khusus untuk sensory break',
                    'Teknologi pembelajaran interaktif'
                ],
                'details' => 'Ruang belajar one-on-one di Mulia Special Academy dirancang dengan memperhatikan kebutuhan khusus setiap anak. Ruang ini dilengkapi dengan pencahayaan yang dapat disesuaikan untuk mengurangi sensitivitas cahaya, sistem akustik yang mengontrol kebisingan, dan furnitur yang dapat disesuaikan dengan ukuran dan kebutuhan anak.',
                'icon' => 'fas fa-user'
            ],
            'ruang-terapi' => [
                'title' => 'Ruang Terapi',
                'slug' => 'ruang-terapi',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Ruang+Terapi',
                'description' => 'Fasilitas terapi lengkap dengan peralatan modern untuk berbagai jenis terapi yang dibutuhkan anak berkebutuhan khusus.',
                'features' => [
                    'Ruang terapi okupasi',
                    'Ruang fisioterapi',
                    'Ruang terapi wicara',
                    'Ruang terapi sensori',
                    'Peralatan terapi modern'
                ],
                'details' => 'Ruang terapi kami dilengkapi dengan peralatan modern dan teknologi terbaru untuk mendukung berbagai jenis terapi. Setiap ruang terapi dirancang khusus untuk kebutuhan terapi yang berbeda, mulai dari terapi okupasi untuk melatih keterampilan motorik halus, fisioterapi untuk kekuatan otot, hingga terapi wicara untuk kemampuan komunikasi.',
                'icon' => 'fas fa-hands-helping'
            ],
            'playground' => [
                'title' => 'Playground',
                'slug' => 'playground',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Playground',
                'description' => 'Area bermain outdoor yang aman dan dirancang khusus untuk anak berkebutuhan khusus dengan berbagai alat bermain yang mendukung perkembangan motorik dan sosial.',
                'features' => [
                    'Permukaan lunak anti-slip',
                    'Pagar pengaman',
                    'Alat bermain adaptif',
                    'Area teduh',
                    'Pengawasan penuh'
                ],
                'details' => 'Playground kami dirancang dengan standar keamanan tinggi untuk anak berkebutuhan khusus. Permukaan menggunakan material lunak anti-slip untuk mencegah cedera, dilengkapi pagar pengaman, dan alat bermain yang dapat disesuaikan dengan kemampuan anak. Area teduh tersedia untuk melindungi anak dari paparan sinar matahari berlebihan.',
                'icon' => 'fas fa-child'
            ],
            'ruang-konsultasi' => [
                'title' => 'Ruang Konsultasi',
                'slug' => 'ruang-konsultasi',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Ruang+Konsultasi',
                'description' => 'Ruang konsultasi yang nyaman untuk sesi konsultasi dengan orang tua dan tim profesional.',
                'features' => [
                    'Atmosfer yang menenangkan',
                    'Privasi yang terjaga',
                    'Alat permainan terapeutik',
                    'Rekaman sesi (dengan izin)',
                    'Konseling keluarga'
                ],
                'details' => 'Ruang konsultasi kami menyediakan lingkungan yang nyaman dan kondusif untuk komunikasi antara orang tua dan tim profesional. Ruang ini dirancang dengan atmosfer yang menenangkan, privasi yang terjaga, dan dilengkapi dengan alat permainan terapeutik untuk membantu anak merasa nyaman selama sesi konsultasi.',
                'icon' => 'fas fa-user-friends'
            ],
            'toilet' => [
                'title' => 'Toilet',
                'slug' => 'toilet',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Toilet',
                'description' => 'Fasilitas toilet yang dirancang khusus untuk anak berkebutuhan khusus dengan ukuran dan fitur yang sesuai kebutuhan.',
                'features' => [
                    'Ukuran yang sesuai untuk anak',
                    'Pegangan pengaman',
                    'Pencahayaan yang baik',
                    'Kebersihan terjaga',
                    'Aksesibilitas penuh'
                ],
                'details' => 'Fasilitas toilet kami dirancang khusus untuk anak berkebutuhan khusus dengan ukuran yang sesuai, pegangan pengaman untuk stabilitas, pencahayaan yang optimal, dan aksesibilitas penuh. Kebersihan terjaga dengan standar tinggi untuk memastikan kesehatan dan kenyamanan anak.',
                'icon' => 'fas fa-toilet'
            ],
            'kolam-renang' => [
                'title' => 'Kolam Renang',
                'slug' => 'kolam-renang',
                'image' => 'https://via.placeholder.com/800x400/ff8c00/ffffff?text=Kolam+Renang',
                'description' => 'Kolam renang khusus untuk terapi air dan aktivitas fisik yang mendukung perkembangan motorik anak berkebutuhan khusus.',
                'features' => [
                    'Kedalaman yang aman',
                    'Suhu air yang nyaman',
                    'Peralatan keselamatan lengkap',
                    'Pengawasan instruktur',
                    'Terapi air terintegrasi'
                ],
                'details' => 'Kolam renang kami dirancang khusus untuk terapi air dengan kedalaman yang aman, suhu air yang nyaman, dan peralatan keselamatan lengkap. Setiap sesi didampingi oleh instruktur berpengalaman dan terintegrasi dengan program terapi untuk mendukung perkembangan motorik anak.',
                'icon' => 'fas fa-swimming-pool'
            ]
        ];
        
        if (!isset($facilities[$slug])) {
            abort(404);
        }
        
        $facility = $facilities[$slug];
        
        return view('fasilitas-detail', compact('facility'));
    }
}
