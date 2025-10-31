<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimoni;
use App\Models\Faq;
use App\Models\Program;
use App\Models\Fasilitas;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Testimoni Demo Data
        $testimoniData = [
            [
                'nama_narasumber' => 'Ibu Sarah',
                'jabatan' => 'Orang Tua Siswa',
                'deskripsi' => 'Alhamdulillah, sejak bergabung dengan MSA, anak saya menunjukkan perkembangan yang sangat pesat. Tim pengajar sangat sabar dan profesional dalam menangani anak berkebutuhan khusus.',
                'gambar' => null
            ],
            [
                'nama_narasumber' => 'Bapak Ahmad',
                'jabatan' => 'Orang Tua Siswa',
                'deskripsi' => 'Program one-on-one di MSA sangat membantu anak saya dalam meningkatkan kemampuan sosial dan komunikasi. Terima kasih MSA!',
                'gambar' => null
            ],
            [
                'nama_narasumber' => 'Ibu Fitri',
                'jabatan' => 'Orang Tua Siswa',
                'deskripsi' => 'Fasilitas di MSA sangat lengkap dan mendukung kebutuhan anak berkebutuhan khusus. Saya sangat merekomendasikan MSA untuk orang tua yang mencari sekolah terbaik.',
                'gambar' => null
            ],
        ];

        foreach ($testimoniData as $data) {
            Testimoni::create($data);
        }

        // FAQ Demo Data
        $faqData = [
            [
                'pertanyaan' => 'Bagaimana cara mendaftarkan anak saya di Mulia Special Academy?',
                'jawaban' => 'Anda dapat mendaftarkan anak melalui link pendaftaran online yang tersedia di halaman kontak kami, atau datang langsung ke sekolah untuk konsultasi dan pendaftaran. Tim kami akan membantu Anda dengan proses pendaftaran yang mudah dan cepat.'
            ],
            [
                'pertanyaan' => 'Apa saja program yang tersedia di MSA?',
                'jawaban' => 'MSA menyediakan berbagai program seperti Toilet Training Program, Pengembangan Akidah Akhlaq, Terapi Perilaku, Terapi Sensori, dan Stimulasi Tahap Perkembangan. Semua program dirancang khusus untuk memenuhi kebutuhan anak berkebutuhan khusus usia 2-6 tahun.'
            ],
            [
                'pertanyaan' => 'Bagaimana sistem pembelajaran di Mulia Special Academy?',
                'jawaban' => 'Sistem pembelajaran kami menggunakan pendekatan one-on-one (1:1) dengan stimulasi bertahap yang disesuaikan dengan kebutuhan setiap anak. Kami menggabungkan pendidikan akademik, terapi perkembangan, dan pembentukan karakter dalam program yang terintegrasi.'
            ],
            [
                'pertanyaan' => 'Apakah ada program konsultasi untuk orang tua?',
                'jawaban' => 'Ya, kami menyediakan program konsultasi rutin untuk orang tua, termasuk konseling keluarga, pelatihan keterampilan parenting, dan dukungan emosional. Kolaborasi dengan orang tua adalah kunci keberhasilan pembelajaran anak.'
            ],
            [
                'pertanyaan' => 'Berapa biaya pendidikan di Mulia Special Academy?',
                'jawaban' => 'Untuk informasi detail mengenai biaya pendidikan, silakan kunjungi halaman kontak kami atau hubungi langsung tim MSA. Kami juga menyediakan brosur digital yang berisi informasi lengkap tentang biaya pendidikan tahun ajaran 2025-2026.'
            ],
            [
                'pertanyaan' => 'Apa saja fasilitas yang tersedia di MSA?',
                'jawaban' => 'MSA dilengkapi dengan fasilitas lengkap seperti Ruang Belajar One-on-One, Ruang Terapi, Playground, Ruang Konsultasi, Toilet khusus anak, dan Kolam Renang. Semua fasilitas dirancang khusus untuk mendukung kebutuhan anak berkebutuhan khusus.'
            ],
        ];

        foreach ($faqData as $data) {
            Faq::create($data);
        }

        // Program Demo Data
        $programData = [
            [
                'nama' => 'Toilet Training Program',
                'slug' => 'toilet-training-program',
                'deskripsi' => 'Program Pelatihan Toilet',
                'tujuan_program' => 'Program ini bertujuan untuk mengembangkan kemandirian anak dalam menggunakan toilet, meningkatkan kesadaran tubuh, membangun rutinitas yang konsisten, dan meningkatkan kepercayaan diri anak dalam melakukan aktivitas toileting secara mandiri.',
                'gambar' => null
            ],
            [
                'nama' => 'Pengembangan Akidah Akhlaq',
                'slug' => 'pengembangan-akidah-akhlaq',
                'deskripsi' => 'Program Pembentukan Karakter Islami',
                'tujuan_program' => 'Program ini bertujuan untuk menanamkan nilai-nilai Islam dalam kehidupan sehari-hari, mengembangkan akhlak mulia, membangun karakter yang baik, dan mengenalkan konsep dasar agama Islam kepada anak dengan cara yang mudah dipahami dan diaplikasikan.',
                'gambar' => null
            ],
            [
                'nama' => 'Terapi Perilaku',
                'slug' => 'terapi-perilaku',
                'deskripsi' => 'Program Modifikasi Perilaku',
                'tujuan_program' => 'Program ini dirancang untuk mengurangi perilaku yang tidak diinginkan, meningkatkan perilaku positif, mengembangkan keterampilan sosial, dan meningkatkan kemampuan adaptasi anak dalam berbagai situasi dan lingkungan.',
                'gambar' => null
            ],
            [
                'nama' => 'Terapi Sensori',
                'slug' => 'terapi-sensori',
                'deskripsi' => 'Program Integrasi Sensorik',
                'tujuan_program' => 'Program ini bertujuan untuk meningkatkan kemampuan anak dalam memproses informasi sensorik, mengurangi sensitivitas berlebihan, meningkatkan toleransi terhadap berbagai stimulus, dan mengembangkan kemampuan regulasi diri yang lebih baik.',
                'gambar' => null
            ],
            [
                'nama' => 'Stimulasi Tahap Perkembangan',
                'slug' => 'stimulasi-tahap-perkembangan',
                'deskripsi' => 'Program Stimulasi Komprehensif',
                'tujuan_program' => 'Program ini bertujuan untuk mengoptimalkan perkembangan anak sesuai dengan tahap usianya, mengidentifikasi dan mengatasi keterlambatan perkembangan, meningkatkan kemampuan kognitif dan motorik, serta mempersiapkan anak untuk transisi ke tahap perkembangan berikutnya dengan lancar.',
                'gambar' => null
            ],
        ];

        foreach ($programData as $data) {
            Program::create($data);
        }

        // Fasilitas Demo Data
        $fasilitasData = [
            [
                'nama' => 'Ruang Belajar One-on-One',
                'slug' => 'ruang-belajar-one-on-one',
                'gambar' => null
            ],
            [
                'nama' => 'Ruang Terapi',
                'slug' => 'ruang-terapi',
                'gambar' => null
            ],
            [
                'nama' => 'Playground',
                'slug' => 'playground',
                'gambar' => null
            ],
            [
                'nama' => 'Ruang Konsultasi',
                'slug' => 'ruang-konsultasi',
                'gambar' => null
            ],
            [
                'nama' => 'Toilet',
                'slug' => 'toilet',
                'gambar' => null
            ],
            [
                'nama' => 'Kolam Renang',
                'slug' => 'kolam-renang',
                'gambar' => null
            ],
        ];

        foreach ($fasilitasData as $data) {
            Fasilitas::create($data);
        }

        $this->command->info('Demo data berhasil dibuat!');
        $this->command->info('- 3 Testimoni');
        $this->command->info('- 6 FAQ');
        $this->command->info('- 5 Program');
        $this->command->info('- 6 Fasilitas');
    }
}

