@extends('layouts.app', ['title' => 'Beranda'])

@section('content')
  {{-- HERO SECTION --}}
  <section class="relative overflow-hidden rounded-3xl border bg-white">
    <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-blue-200 blur-3xl opacity-60"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-indigo-200 blur-3xl opacity-60"></div>

    <div class="relative grid gap-10 px-6 py-10 md:grid-cols-2 md:px-10 md:py-14 items-center">
      <div class="space-y-5">
        <div class="inline-flex items-center gap-2 rounded-full border bg-blue-50 px-3 py-1 text-sm text-blue-800">
          <span class="font-semibold">GeoEdu BIG</span>
          <span class="text-slate-500">•</span>
          <span class="text-slate-700">Materi • Peta • Quiz • Feedback</span>
        </div>

        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-slate-900">
          Belajar Geospasial Itu
          <span class="text-blue-700">Seru</span>
          dan
          <span class="text-blue-700">Berguna</span>
        </h1>

        <p class="text-slate-600 text-lg leading-relaxed">
          Media pembelajaran interaktif untuk memahami dasar informasi geospasial,
          mulai dari peta, koordinat, hingga penerapan data spasial untuk kehidupan sehari-hari.
          Website ini dibuat untuk mendukung pemahaman peran
          <span class="font-semibold text-slate-900">Badan Informasi Geospasial</span>.
        </p>

        <div class="flex flex-wrap gap-3 pt-1">
          <a href="/materi"
             class="inline-flex items-center justify-center rounded-2xl bg-blue-700 px-5 py-3 text-white font-semibold hover:bg-blue-800 transition">
            Mulai Belajar
          </a>
          <a href="/peta"
             class="inline-flex items-center justify-center rounded-2xl border bg-white px-5 py-3 font-semibold hover:bg-slate-50 transition">
            Jelajahi Peta
          </a>
          <a href="/quiz"
             class="inline-flex items-center justify-center rounded-2xl bg-slate-900 px-5 py-3 text-white font-semibold hover:bg-slate-800 transition">
            Ikuti Quiz
          </a>
        </div>

        {{-- QUICK STATS --}}
        <div class="grid grid-cols-3 gap-3 pt-4 text-center">
          <div class="rounded-2xl border bg-white p-4">
            <div class="text-2xl font-extrabold text-blue-700">25</div>
            <div class="text-sm text-slate-600">Soal Quiz</div>
          </div>
          <div class="rounded-2xl border bg-white p-4">
            <div class="text-2xl font-extrabold text-blue-700">10+</div>
            <div class="text-sm text-slate-600">Materi</div>
          </div>
          <div class="rounded-2xl border bg-white p-4">
            <div class="text-2xl font-extrabold text-blue-700">∞</div>
            <div class="text-sm text-slate-600">Manfaat</div>
          </div>
        </div>
      </div>

      {{-- HERO CARD --}}
      <div class="rounded-3xl border bg-gradient-to-br from-blue-50 to-white p-6 md:p-8">
        <h2 class="text-xl font-bold text-slate-900">Kenapa Geospasial Penting?</h2>
        <p class="mt-2 text-slate-600 leading-relaxed">
          Data geospasial membantu kita memahami lokasi dan kondisi wilayah,
          sehingga keputusan dapat dibuat lebih tepat: untuk tata ruang, mitigasi bencana,
          perencanaan transportasi, hingga pemetaan sumber daya.
        </p>

        <div class="mt-5 grid gap-3">
          <div class="rounded-2xl border bg-white p-4">
            <div class="font-semibold text-slate-900">Contoh pemanfaatan</div>
            <ul class="mt-2 list-disc pl-5 text-sm text-slate-600 space-y-1">
              <li>Navigasi & rute perjalanan</li>
              <li>Pemetaan bencana banjir/longsor</li>
              <li>Perencanaan wilayah & tata ruang</li>
              <li>Pemetaan fasilitas publik</li>
            </ul>
          </div>

          <div class="grid grid-cols-2 gap-3">
            <a href="/materi"
               class="rounded-2xl border bg-white p-4 hover:bg-slate-50 transition">
              <div class="font-bold text-blue-700">📚 Materi</div>
              <div class="text-sm text-slate-600 mt-1">Belajar konsep dasar</div>
            </a>
            <a href="/feedback"
               class="rounded-2xl border bg-white p-4 hover:bg-slate-50 transition">
              <div class="font-bold text-blue-700">💬 Feedback</div>
              <div class="text-sm text-slate-600 mt-1">Beri saran & nilai</div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- FEATURE SECTION --}}
  <section class="mt-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <h2 class="text-2xl font-extrabold text-slate-900">Fitur Utama</h2>
        <p class="text-slate-600 mt-1">Semua dibuat ringkas, jelas, dan interaktif.</p>
      </div>
      <a href="/materi" class="text-sm font-semibold text-blue-700 hover:underline">
        Lihat semua materi →
      </a>
    </div>

    <div class="mt-5 grid gap-4 md:grid-cols-4">
      <div class="rounded-2xl border bg-white p-5 hover:shadow-sm transition">
        <div class="text-blue-700 font-bold">📚 Materi</div>
        <p class="mt-2 text-sm text-slate-600">
          Materi bertahap dari dasar peta, koordinat, SIG, sampai penggunaan data geospasial.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-5 hover:shadow-sm transition">
        <div class="text-blue-700 font-bold">🗺️ Peta</div>
        <p class="mt-2 text-sm text-slate-600">
          Peta interaktif untuk memahami persebaran wilayah dan contoh titik penting.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-5 hover:shadow-sm transition">
        <div class="text-blue-700 font-bold">✅ Quiz</div>
        <p class="mt-2 text-sm text-slate-600">
          25 soal pilihan ganda + nilai akhir + review benar/salah.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-5 hover:shadow-sm transition">
        <div class="text-blue-700 font-bold">💬 Feedback</div>
        <p class="mt-2 text-sm text-slate-600">
          Pengguna bisa mengirim saran, pertanyaan, atau laporan bug untuk pengembangan.
        </p>
      </div>
    </div>
  </section>

  {{-- LEARNING PATH --}}
  <section class="mt-10">
    <h2 class="text-2xl font-extrabold text-slate-900">Alur Belajar yang Disarankan</h2>
    <p class="text-slate-600 mt-1">Ikuti step ini agar pemahaman meningkat cepat.</p>

    <div class="mt-5 grid gap-4 md:grid-cols-3">
      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-2xl bg-blue-700 text-white grid place-items-center font-bold">1</div>
          <div>
            <div class="font-bold text-slate-900">Baca materi dasar</div>
            <div class="text-sm text-slate-600">Peta, skala, simbol, koordinat</div>
          </div>
        </div>
        <p class="mt-4 text-sm text-slate-600 leading-relaxed">
          Mulai dari konsep inti: apa itu informasi geospasial, peta dasar vs tematik, serta cara membaca peta.
        </p>
        <a href="/materi" class="mt-4 inline-flex text-sm font-semibold text-blue-700 hover:underline">Mulai dari materi →</a>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-2xl bg-blue-700 text-white grid place-items-center font-bold">2</div>
          <div>
            <div class="font-bold text-slate-900">Lihat peta interaktif</div>
            <div class="text-sm text-slate-600">Titik wilayah & info ringkas</div>
          </div>
        </div>
        <p class="mt-4 text-sm text-slate-600 leading-relaxed">
          Setelah memahami teori, gunakan peta interaktif untuk menghubungkan konsep dengan lokasi nyata di Indonesia.
        </p>
        <a href="/peta" class="mt-4 inline-flex text-sm font-semibold text-blue-700 hover:underline">Buka peta →</a>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="flex items-center gap-3">
          <div class="h-10 w-10 rounded-2xl bg-blue-700 text-white grid place-items-center font-bold">3</div>
          <div>
            <div class="font-bold text-slate-900">Kerjakan quiz</div>
            <div class="text-sm text-slate-600">Nilai + pembahasan</div>
          </div>
        </div>
        <p class="mt-4 text-sm text-slate-600 leading-relaxed">
          Uji pemahamanmu lewat 25 soal. Setelah selesai, kamu akan mendapatkan nilai dan review benar/salah.
        </p>
        <a href="/quiz" class="mt-4 inline-flex text-sm font-semibold text-blue-700 hover:underline">Mulai quiz →</a>
      </div>
    </div>
  </section>

  {{-- ABOUT BIG (LONG CONTENT) --}}
  <section class="mt-10">
    <div class="rounded-3xl border bg-white p-8 md:p-10">
      <div class="flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
          <h2 class="text-2xl font-extrabold text-slate-900">Tentang Badan Informasi Geospasial</h2>
          <p class="text-slate-600 mt-2 leading-relaxed max-w-3xl">
            BIG berperan mendukung penyediaan dan pembinaan informasi geospasial di Indonesia.
            Melalui edukasi, masyarakat dapat memahami pentingnya peta dan data spasial untuk pembangunan.
          </p>
        </div>
        <a href="/feedback" class="inline-flex rounded-2xl bg-blue-700 text-white px-5 py-3 font-semibold hover:bg-blue-800 transition">
          Kirim Saran
        </a>
      </div>

      <div class="mt-8 grid gap-6 md:grid-cols-2">
        <div class="rounded-2xl border bg-slate-50 p-6">
          <h3 class="font-bold text-slate-900">Apa itu Informasi Geospasial?</h3>
          <p class="mt-2 text-slate-600 leading-relaxed">
            Informasi geospasial adalah informasi mengenai lokasi geografis, dimensi, dan karakteristik objek di permukaan bumi.
            Contohnya: peta jalan, batas administrasi, sebaran fasilitas publik, hingga peta risiko bencana.
          </p>
          <ul class="mt-4 list-disc pl-6 text-slate-600 space-y-1">
            <li><span class="font-semibold text-slate-900">Peta dasar</span> untuk kerangka referensi.</li>
            <li><span class="font-semibold text-slate-900">Peta tematik</span> untuk topik tertentu (bencana, kependudukan).</li>
            <li><span class="font-semibold text-slate-900">Koordinat</span> untuk menentukan lokasi akurat.</li>
          </ul>
        </div>

        <div class="rounded-2xl border bg-slate-50 p-6">
          <h3 class="font-bold text-slate-900">Kenapa perlu belajar geospasial?</h3>
          <p class="mt-2 text-slate-600 leading-relaxed">
            Karena banyak keputusan penting membutuhkan data berbasis lokasi.
            Dengan peta dan data spasial, kita bisa merencanakan, memetakan, serta mengevaluasi kondisi wilayah.
          </p>
          <div class="mt-4 grid gap-3">
            <div class="rounded-xl border bg-white p-4">
              <div class="font-semibold text-slate-900">Mitigasi bencana</div>
              <div class="text-sm text-slate-600 mt-1">Pemetaan rawan banjir/longsor untuk pengurangan risiko.</div>
            </div>
            <div class="rounded-xl border bg-white p-4">
              <div class="font-semibold text-slate-900">Tata ruang</div>
              <div class="text-sm text-slate-600 mt-1">Penggunaan lahan dan rencana pembangunan lebih tepat.</div>
            </div>
            <div class="rounded-xl border bg-white p-4">
              <div class="font-semibold text-slate-900">Transportasi</div>
              <div class="text-sm text-slate-600 mt-1">Analisis rute, jarak, kemacetan, dan akses layanan.</div>
            </div>
          </div>
        </div>
      </div>

      {{-- MINI TIMELINE --}}
      <div class="mt-10">
        <h3 class="text-lg font-bold text-slate-900">Ringkasan Materi yang Akan Kamu Temui</h3>
        <div class="mt-4 grid gap-4 md:grid-cols-4">
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Peta</div>
            <p class="text-sm text-slate-600 mt-2">Skala, simbol, legenda, interpretasi peta.</p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Koordinat</div>
            <p class="text-sm text-slate-600 mt-2">Lintang-bujur dan konsep lokasi absolut.</p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">SIG</div>
            <p class="text-sm text-slate-600 mt-2">Konsep sistem informasi geografis & layer.</p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Data</div>
            <p class="text-sm text-slate-600 mt-2">Data spasial & non-spasial untuk analisis.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- FAQ --}}
  <section class="mt-10">
    <div class="flex items-end justify-between gap-4">
      <div>
        <h2 class="text-2xl font-extrabold text-slate-900">FAQ</h2>
        <p class="text-slate-600 mt-1">Pertanyaan yang sering muncul.</p>
      </div>
      <a href="/feedback" class="text-sm font-semibold text-blue-700 hover:underline">
        Punya pertanyaan lain? →
      </a>
    </div>

    <div class="mt-5 grid gap-4 md:grid-cols-2">
      <div class="rounded-2xl border bg-white p-6">
        <div class="font-bold text-slate-900">Apa bedanya peta dasar dan peta tematik?</div>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">
          Peta dasar berisi unsur umum (jalan, sungai, batas administrasi) sebagai referensi.
          Peta tematik menampilkan tema tertentu seperti sebaran penduduk atau peta risiko bencana.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="font-bold text-slate-900">Kenapa koordinat penting?</div>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">
          Koordinat memungkinkan penentuan lokasi dengan akurat sehingga peta bisa digunakan untuk navigasi,
          analisis wilayah, dan pemetaan data.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="font-bold text-slate-900">Apa itu SIG?</div>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">
          SIG (Sistem Informasi Geografis) adalah sistem yang membantu mengelola, menganalisis, dan menampilkan data berbasis lokasi.
        </p>
      </div>

      <div class="rounded-2xl border bg-white p-6">
        <div class="font-bold text-slate-900">Nilai quiz dihitung bagaimana?</div>
        <p class="mt-2 text-sm text-slate-600 leading-relaxed">
          Nilai dihitung dari jumlah jawaban benar dibanding total soal, kemudian dikonversi ke skala 0–100.
        </p>
      </div>
    </div>
  </section>

  {{-- FINAL CTA --}}
  <section class="mt-10">
    <div class="rounded-3xl border bg-gradient-to-r from-blue-700 to-indigo-700 p-8 md:p-10 text-white">
      <div class="grid md:grid-cols-2 gap-8 items-center">
        <div>
          <h2 class="text-2xl md:text-3xl font-extrabold">Siap jadi paham geospasial?</h2>
          <p class="mt-2 text-white/90 leading-relaxed">
            Mulai dari materi → lihat peta → kerjakan quiz 25 soal → dapat nilai dan evaluasi.
          </p>
          <div class="mt-5 flex flex-wrap gap-3">
            <a href="/materi" class="rounded-2xl bg-white px-5 py-3 font-semibold text-blue-800 hover:bg-white/90 transition">
              Mulai dari Materi
            </a>
            <a href="/quiz" class="rounded-2xl bg-slate-900 px-5 py-3 font-semibold text-white hover:bg-slate-800 transition">
              Kerjakan Quiz
            </a>
            <a href="/feedback" class="rounded-2xl border border-white/40 px-5 py-3 font-semibold hover:bg-white/10 transition">
              Kirim Feedback
            </a>
          </div>
        </div>

        <div class="rounded-2xl bg-white/10 border border-white/15 p-6">
          <div class="font-bold">Tips cepat belajar</div>
          <ul class="mt-3 text-sm space-y-2 text-white/90 list-disc pl-5">
            <li>Baca materi secara berurutan.</li>
            <li>Coba jelaskan ulang dengan kata sendiri.</li>
            <li>Gunakan peta untuk menghubungkan konsep dengan lokasi nyata.</li>
            <li>Kerjakan quiz sebagai evaluasi akhir.</li>
          </ul>
        </div>
      </div>
    </div>
  </section>
@endsection
