<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Berita;
use Illuminate\Support\Str;

class BeritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $beritaData = [
            [
                'judul' => 'Pendaftaran Siswa Baru 2025-2026',
                'slug' => 'pendaftaran-siswa-baru-2025-2026',
                'konten' => 'Mulia Special Academy membuka pendaftaran siswa baru untuk tahun ajaran 2025-2026. Program kami dirancang khusus untuk anak-anak berkebutuhan khusus dengan pendekatan stimulasi yang komprehensif.

<h3>Program yang Ditawarkan:</h3>
<ul>
<li>Program Kindergarten untuk usia 3-6 tahun</li>
<li>Program Primary School untuk usia 6-12 tahun</li>
<li>Terapi okupasi dan fisioterapi</li>
<li>Program stimulasi sensorik</li>
<li>Konseling untuk orang tua</li>
</ul>

<h3>Persyaratan Pendaftaran:</h3>
<ul>
<li>Fotokopi akta kelahiran</li>
<li>Fotokopi kartu keluarga</li>
<li>Surat keterangan dokter</li>
<li>Pas foto 3x4 (2 lembar)</li>
</ul>

<p>Untuk informasi lebih lanjut, silakan hubungi kami di nomor yang tertera atau datang langsung ke sekolah kami di Surabaya.</p>',
                'tanggal' => '2024-12-15',
                'kategori' => 'pendaftaran',
                'meta_description' => 'Pendaftaran siswa baru Mulia Special Academy untuk tahun ajaran 2025-2026. Program khusus untuk anak berkebutuhan khusus.',
                'meta_keywords' => ['pendaftaran', 'siswa baru', '2025-2026', 'anak berkebutuhan khusus']
            ],
            [
                'judul' => 'Manfaat Toilet Training Sejak Dini',
                'slug' => 'manfaat-toilet-training-sejak-dini',
                'konten' => 'Toilet training merupakan keterampilan penting yang perlu diajarkan sejak dini kepada anak-anak berkebutuhan khusus. Pelatihan ini membantu meningkatkan kemandirian dan kepercayaan diri anak.

<h3>Manfaat Toilet Training:</h3>
<ul>
<li>Meningkatkan kemandirian anak</li>
<li>Membangun kepercayaan diri</li>
<li>Mengurangi ketergantungan pada orang lain</li>
<li>Meningkatkan harga diri</li>
<li>Memudahkan integrasi sosial</li>
</ul>

<h3>Tips Toilet Training:</h3>
<ul>
<li>Mulai pada waktu yang tepat</li>
<li>Gunakan pendekatan yang konsisten</li>
<li>Berikan reward untuk keberhasilan</li>
<li>Bersabar dan tidak memaksa</li>
<li>Libatkan terapis jika diperlukan</li>
</ul>

<p>Di Mulia Special Academy, kami memiliki program toilet training yang terstruktur dan disesuaikan dengan kebutuhan setiap anak.</p>',
                'tanggal' => '2024-12-10',
                'kategori' => 'parenting',
                'meta_description' => 'Pelajari manfaat dan tips toilet training untuk anak berkebutuhan khusus sejak dini.',
                'meta_keywords' => ['toilet training', 'kemandirian', 'anak berkebutuhan khusus', 'parenting']
            ],
            [
                'judul' => 'Manfaat Bermain Play Dough',
                'slug' => 'manfaat-bermain-play-dough',
                'konten' => 'Bermain play dough memiliki banyak manfaat untuk perkembangan motorik halus, kreativitas, dan koordinasi mata-tangan pada anak-anak berkebutuhan khusus.

<h3>Manfaat Bermain Play Dough:</h3>
<ul>
<li>Mengembangkan motorik halus</li>
<li>Meningkatkan koordinasi mata-tangan</li>
<li>Merangsang kreativitas dan imajinasi</li>
<li>Mengurangi stres dan kecemasan</li>
<li>Meningkatkan fokus dan konsentrasi</li>
<li>Mengembangkan kemampuan sensorik</li>
</ul>

<h3>Aktivitas Play Dough yang Menyenangkan:</h3>
<ul>
<li>Membuat bentuk-bentuk sederhana</li>
<li>Mencampur warna</li>
<li>Menggunakan alat bantu seperti cetakan</li>
<li>Bermain peran dengan hasil karya</li>
<li>Membuat pola dan tekstur</li>
</ul>

<p>Di Mulia Special Academy, play dough menjadi bagian dari program terapi okupasi kami untuk mengembangkan berbagai kemampuan anak.</p>',
                'tanggal' => '2024-12-05',
                'kategori' => 'terapi',
                'meta_description' => 'Temukan manfaat bermain play dough untuk perkembangan anak berkebutuhan khusus.',
                'meta_keywords' => ['play dough', 'motorik halus', 'kreativitas', 'terapi okupasi']
            ],
            [
                'judul' => 'Mitos vs Fakta: Sensory Play',
                'slug' => 'mitos-vs-fakta-sensory-play',
                'konten' => 'Sensory play sering dianggap membuat kotor dan berantakan. Namun faktanya, aktivitas ini sangat penting untuk perkembangan sensorik anak dan dapat dilakukan dengan cara yang terorganisir.

<h3>Mitos yang Salah:</h3>
<ul>
<li>Sensory play membuat kotor dan berantakan</li>
<li>Hanya untuk anak yang bermasalah sensorik</li>
<li>Membuat anak menjadi tidak disiplin</li>
<li>Tidak ada manfaat akademik</li>
</ul>

<h3>Fakta yang Benar:</h3>
<ul>
<li>Sensory play dapat dilakukan dengan terorganisir</li>
<li>Baik untuk semua anak, terutama yang berkebutuhan khusus</li>
<li>Membantu perkembangan otak dan pembelajaran</li>
<li>Meningkatkan kemampuan akademik</li>
<li>Mengurangi perilaku yang tidak diinginkan</li>
</ul>

<h3>Tips Sensory Play yang Terorganisir:</h3>
<ul>
<li>Gunakan area khusus untuk aktivitas</li>
<li>Siapkan perlengkapan yang diperlukan</li>
<li>Atur waktu yang konsisten</li>
<li>Libatkan anak dalam pembersihan</li>
<li>Dokumentasikan kemajuan anak</li>
</ul>

<p>Di Mulia Special Academy, kami memiliki ruang sensory play yang terorganisir dan aman untuk semua anak.</p>',
                'tanggal' => '2024-11-28',
                'kategori' => 'edukasi',
                'meta_description' => 'Mengungkap kebenaran tentang sensory play untuk anak berkebutuhan khusus.',
                'meta_keywords' => ['sensory play', 'perkembangan sensorik', 'anak berkebutuhan khusus', 'terapi']
            ]
        ];

        foreach ($beritaData as $data) {
            Berita::create($data);
        }
    }
}