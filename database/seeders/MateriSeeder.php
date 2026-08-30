<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MateriSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'judul' => 'Pengantar Informasi Geospasial',
                'kategori' => 'Dasar Geospasial',
                'ringkasan' => 'Dasar pengertian informasi geospasial dan peran BIG.',
                'isi' => 'Informasi geospasial adalah informasi yang menggambarkan lokasi, posisi, dan kondisi suatu objek di permukaan bumi. Data ini digunakan untuk perencanaan pembangunan, mitigasi bencana, tata ruang, dan pengambilan keputusan berbasis wilayah. Badan Informasi Geospasial (BIG) bertanggung jawab dalam penyediaan data geospasial nasional yang akurat dan terstandar.'
            ],
            [
                'judul' => 'Peran Badan Informasi Geospasial (BIG)',
                'kategori' => 'Kelembagaan',
                'ringkasan' => 'Fungsi BIG dalam sistem informasi geospasial nasional.',
                'isi' => 'BIG memiliki peran penting dalam menyediakan peta dasar nasional, mengelola standar data geospasial, serta membina instansi pemerintah dalam pemanfaatan data spasial. BIG memastikan satu referensi peta nasional (One Map Policy).'
            ],
            [
                'judul' => 'Peta Dasar dan Peta Tematik',
                'kategori' => 'Peta',
                'ringkasan' => 'Perbedaan peta dasar dan peta tematik.',
                'isi' => 'Peta dasar menampilkan unsur umum seperti jalan dan sungai, sedangkan peta tematik menyajikan tema tertentu seperti kepadatan penduduk atau rawan bencana. Keduanya saling melengkapi.'
            ],
            [
                'judul' => 'Koordinat Lintang dan Bujur',
                'kategori' => 'Koordinat',
                'ringkasan' => 'Cara menentukan lokasi menggunakan koordinat.',
                'isi' => 'Koordinat geografis terdiri dari lintang dan bujur. Sistem ini digunakan untuk menentukan posisi suatu lokasi di bumi secara presisi.'
            ],
            [
                'judul' => 'Sistem Informasi Geografis (SIG)',
                'kategori' => 'SIG',
                'ringkasan' => 'Pengertian dan manfaat SIG.',
                'isi' => 'SIG adalah sistem berbasis komputer untuk mengelola dan menganalisis data spasial. SIG digunakan dalam perencanaan wilayah, transportasi, dan pengelolaan sumber daya.'
            ],
            [
                'judul' => 'Pemanfaatan Geospasial untuk Mitigasi Bencana',
                'kategori' => 'Penerapan',
                'ringkasan' => 'Peran data spasial dalam kebencanaan.',
                'isi' => 'Data geospasial membantu pemetaan wilayah rawan bencana, jalur evakuasi, dan perencanaan mitigasi risiko.'
            ],
            [
                'judul' => 'Citra Satelit dan Penginderaan Jauh',
                'kategori' => 'Teknologi',
                'ringkasan' => 'Pemanfaatan citra satelit dalam geospasial.',
                'isi' => 'Citra satelit digunakan untuk memantau perubahan permukaan bumi seperti deforestasi dan urbanisasi.'
            ],
            [
                'judul' => 'Skala Peta dan Simbolisasi',
                'kategori' => 'Kartografi',
                'ringkasan' => 'Cara membaca skala dan simbol peta.',
                'isi' => 'Skala peta menunjukkan perbandingan jarak peta dengan jarak sebenarnya. Simbol peta digunakan untuk merepresentasikan objek.'
            ],
        ];

        foreach ($data as $item) {
            Materi::create([
                'judul' => $item['judul'],
                'slug' => Str::slug($item['judul']),
                'kategori' => $item['kategori'],
                'ringkasan' => $item['ringkasan'],
                'isi' => $item['isi'],
            ]);
        }
    }
}
