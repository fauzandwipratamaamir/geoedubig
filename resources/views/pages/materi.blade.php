@extends('layouts.app', ['title' => 'Materi'])

@section('content')
  {{-- TOP HEADER --}}
  <section class="relative overflow-hidden rounded-3xl border bg-white p-8 md:p-10">
    <div class="absolute -top-24 -right-24 h-80 w-80 rounded-full bg-blue-200 blur-3xl opacity-50"></div>
    <div class="absolute -bottom-24 -left-24 h-80 w-80 rounded-full bg-indigo-200 blur-3xl opacity-50"></div>

    <div class="relative">
      <div class="text-sm text-slate-600">
        <a href="/" class="hover:underline text-blue-700 font-semibold">Beranda</a>
        <span class="mx-2">/</span>
        <span class="text-slate-800 font-semibold">Materi</span>
      </div>

      <div class="mt-3 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
        <div>
          <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900">Materi Geospasial</h1>
          <p class="mt-2 text-slate-600 leading-relaxed max-w-3xl">
            Kumpulan materi edukasi bertema Badan Informasi Geospasial (BIG): dasar peta, koordinat,
            SIG, data spasial, hingga contoh penerapan nyata untuk pembangunan dan mitigasi bencana.
          </p>
        </div>

        <div class="flex gap-3">
          <a href="/peta" class="px-5 py-3 rounded-2xl border bg-white hover:bg-slate-50 font-semibold transition">
            Jelajahi Peta
          </a>
          <a href="/quiz" class="px-5 py-3 rounded-2xl bg-blue-700 text-white hover:bg-blue-800 font-semibold transition">
            Kerjakan Quiz
          </a>
        </div>
      </div>

      {{-- SEARCH & FILTER (UI READY) --}}
      <div class="mt-6 grid gap-3 md:grid-cols-12">
        <div class="md:col-span-7">
          <label class="text-sm font-semibold text-slate-700">Cari materi</label>
       <form method="GET" action="{{ url('/materi') }}" class="flex gap-2 mb-8">
    <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Cari materi geospasial..."
        class="w-full px-4 py-2 border rounded-xl focus:outline-none focus:ring focus:ring-blue-200"
    >

    <button
        type="submit"
        class="px-6 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700"
    >
        Cari
    </button>
</form>


        <div class="md:col-span-5">
          <label class="text-sm font-semibold text-slate-700">Filter kategori</label>
          <div class="mt-2 grid grid-cols-2 gap-3">
            <button type="button" class="px-4 py-3 rounded-2xl border bg-white hover:bg-slate-50 text-sm font-semibold transition">
              Dasar Geospasial
            </button>
            <button type="button" class="px-4 py-3 rounded-2xl border bg-white hover:bg-slate-50 text-sm font-semibold transition">
              Peta & Koordinat
            </button>
            <button type="button" class="px-4 py-3 rounded-2xl border bg-white hover:bg-slate-50 text-sm font-semibold transition">
              SIG & Data
            </button>
            <button type="button" class="px-4 py-3 rounded-2xl border bg-white hover:bg-slate-50 text-sm font-semibold transition">
              Penerapan
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- CONTENT GRID --}}
  <section class="mt-8 grid gap-6 lg:grid-cols-12">
    {{-- SIDEBAR --}}
    <aside class="lg:col-span-4">
      <div class="rounded-3xl border bg-white p-6 sticky top-24">
        <div class="flex items-center justify-between">
          <h2 class="font-extrabold text-slate-900">Daftar Materi</h2>
          <span class="text-xs text-slate-500">Terbaru</span>
        </div>

        <div class="mt-4 space-y-3">
          @if(isset($materis) && count($materis))
            @foreach($materis as $m)
              <a href="/materi/{{ $m->slug }}"
                 class="block rounded-2xl border bg-white p-4 hover:bg-slate-50 transition">
                <div class="font-bold text-slate-900">{{ $m->judul }}</div>
                <div class="text-xs text-slate-500 mt-1">
                  {{ $m->kategori ?? 'Dasar Geospasial' }} • {{ $m->created_at?->format('d M Y') }}
                </div>
                @if(!empty($m->ringkasan))
                  <p class="text-sm text-slate-600 mt-2 line-clamp-2">{{ $m->ringkasan }}</p>
                @endif
              </a>
            @endforeach
          @else
            {{-- fallback if DB empty --}}
            <div class="rounded-2xl border bg-slate-50 p-4 text-sm text-slate-600">
              <div class="font-semibold text-slate-900">Belum ada materi di database.</div>
              <p class="mt-1">
                Tenang—halaman ini tetap punya materi panjang di bagian kanan.
                Nanti kita isi DB pakai Seeder biar list ini terisi otomatis.
              </p>
              <a href="/feedback" class="inline-flex mt-3 text-blue-700 font-semibold hover:underline">
                Minta aku buat Seeder Materi →
              </a>
            </div>

            <div class="mt-3 space-y-3">
              <div class="rounded-2xl border bg-white p-4">
                <div class="font-bold text-slate-900">Apa itu Informasi Geospasial?</div>
                <div class="text-xs text-slate-500 mt-1">Dasar Geospasial</div>
              </div>
              <div class="rounded-2xl border bg-white p-4">
                <div class="font-bold text-slate-900">Peta Dasar vs Peta Tematik</div>
                <div class="text-xs text-slate-500 mt-1">Peta & Koordinat</div>
              </div>
              <div class="rounded-2xl border bg-white p-4">
                <div class="font-bold text-slate-900">SIG (Sistem Informasi Geografis)</div>
                <div class="text-xs text-slate-500 mt-1">SIG & Data</div>
              </div>
              <div class="rounded-2xl border bg-white p-4">
                <div class="font-bold text-slate-900">Pemanfaatan Geospasial</div>
                <div class="text-xs text-slate-500 mt-1">Penerapan</div>
              </div>
            </div>
          @endif
        </div>

        <div class="mt-6 rounded-2xl bg-blue-700 text-white p-5">
          <div class="font-extrabold">Tips Belajar Cepat</div>
          <ul class="mt-3 text-sm space-y-2 list-disc pl-5 text-white/90">
            <li>Baca materi berurutan dari dasar.</li>
            <li>Catat istilah penting (peta, skala, koordinat).</li>
            <li>Hubungkan konsep dengan peta interaktif.</li>
            <li>Kerjakan quiz untuk evaluasi.</li>
          </ul>
        </div>
      </div>
    </aside>

    {{-- MAIN ARTICLE CONTENT (LONG) --}}
    <article class="lg:col-span-8 space-y-6">
      {{-- SECTION 1 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">1) Pengantar Informasi Geospasial</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          Informasi geospasial adalah informasi yang menggambarkan lokasi, posisi, serta karakteristik suatu objek atau fenomena di permukaan bumi.
          Informasi ini biasanya direpresentasikan dalam bentuk peta, koordinat, citra satelit, dan data spasial lainnya.
          Pemahaman geospasial membantu kita menjawab pertanyaan: <span class="font-semibold">“di mana?”</span>,
          <span class="font-semibold">“apa yang ada di sana?”</span>, dan <span class="font-semibold">“bagaimana kondisinya?”</span>.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Contoh sehari-hari</div>
            <ul class="mt-2 list-disc pl-5 text-slate-700 space-y-1">
              <li>Mencari rute tercepat di aplikasi peta</li>
              <li>Melihat wilayah rawan banjir</li>
              <li>Mengecek batas administrasi kota/kabupaten</li>
              <li>Menentukan lokasi sekolah atau fasilitas kesehatan</li>
            </ul>
          </div>
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Peran BIG</div>
            <p class="mt-2 text-slate-700 leading-relaxed">
              Badan Informasi Geospasial berperan dalam penyediaan, pengelolaan, dan pembinaan informasi geospasial nasional.
              Melalui data geospasial yang baik, keputusan pembangunan bisa lebih tepat dan terukur.
            </p>
          </div>
        </div>

        <div class="mt-6 rounded-2xl border bg-blue-50 p-5">
          <div class="font-bold text-blue-900">Catatan penting</div>
          <p class="mt-2 text-slate-700 leading-relaxed">
            Data geospasial bukan hanya “gambar peta”, tetapi juga struktur data yang bisa dianalisis: jarak, luas, sebaran, kepadatan, dan pola.
            Inilah mengapa geospasial sangat penting dalam mitigasi bencana, tata ruang, dan layanan publik.
          </p>
        </div>
      </div>

      {{-- SECTION 2 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">2) Peta, Skala, Simbol, dan Legenda</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          Peta adalah representasi permukaan bumi pada bidang datar.
          Agar peta mudah dipahami, peta menggunakan <span class="font-semibold">skala</span>,
          <span class="font-semibold">simbol</span>, dan <span class="font-semibold">legenda</span>.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-3">
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-slate-900">Skala</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Perbandingan jarak di peta dan jarak sebenarnya. Contoh: 1:50.000.
            </p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-slate-900">Simbol</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Tanda yang mewakili objek seperti jalan, sungai, gunung, dll.
            </p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-slate-900">Legenda</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Keterangan untuk menjelaskan simbol pada peta.
            </p>
          </div>
        </div>

        <div class="mt-6 overflow-hidden rounded-2xl border">
          <div class="bg-slate-50 px-5 py-3 font-bold text-slate-900">Contoh tabel ringkas</div>
          <div class="p-5">
            <div class="grid grid-cols-3 text-sm font-semibold text-slate-700">
              <div>Komponen</div>
              <div>Fungsi</div>
              <div>Contoh</div>
            </div>
            <div class="mt-3 grid grid-cols-3 gap-y-2 text-sm text-slate-700">
              <div class="font-semibold">Skala</div>
              <div>Ukuran perbandingan</div>
              <div>1:25.000</div>

              <div class="font-semibold">Simbol</div>
              <div>Representasi objek</div>
              <div>Ikon jalan/sungai</div>

              <div class="font-semibold">Legenda</div>
              <div>Penjelas simbol</div>
              <div>Daftar arti simbol</div>
            </div>
          </div>
        </div>
      </div>

      {{-- SECTION 3 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">3) Koordinat dan Lokasi</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          Koordinat membantu menentukan lokasi secara akurat. Dalam konteks geospasial, koordinat umum adalah
          <span class="font-semibold">lintang</span> dan <span class="font-semibold">bujur</span>.
          Misalnya, Jakarta berada sekitar koordinat -6.2, 106.8.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Lintang (Latitude)</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Garis imajiner dari barat ke timur; menunjukkan posisi utara/selatan dari garis khatulistiwa.
            </p>
          </div>
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Bujur (Longitude)</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Garis imajiner dari utara ke selatan; menunjukkan posisi timur/barat dari meridian utama.
            </p>
          </div>
        </div>

        <div class="mt-6 rounded-2xl border bg-yellow-50 p-5">
          <div class="font-bold text-yellow-900">Tips</div>
          <p class="mt-2 text-slate-700 leading-relaxed">
            Coba buka halaman <a href="/peta" class="text-blue-700 font-semibold hover:underline">Peta</a> lalu klik titik/marker.
            Perhatikan lokasi dan kaitkan dengan koordinat (lat, lng).
          </p>
        </div>
      </div>

      {{-- SECTION 4 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">4) SIG (Sistem Informasi Geografis)</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          SIG adalah sistem yang digunakan untuk mengumpulkan, menyimpan, menganalisis, dan menampilkan data spasial.
          SIG biasanya bekerja dengan konsep <span class="font-semibold">layer</span> (lapisan data) seperti:
          jalan, sungai, batas administrasi, dan penggunaan lahan.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-3">
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Layer</div>
            <p class="mt-2 text-sm text-slate-600">Lapisan data yang bisa ditumpuk untuk analisis.</p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Analisis</div>
            <p class="mt-2 text-sm text-slate-600">Menghitung jarak, sebaran, pola, dan keterjangkauan.</p>
          </div>
          <div class="rounded-2xl border bg-white p-5">
            <div class="font-bold text-blue-700">Visualisasi</div>
            <p class="mt-2 text-sm text-slate-600">Menampilkan hasil analisis dalam peta yang mudah dibaca.</p>
          </div>
        </div>

        <div class="mt-6 rounded-2xl border bg-slate-50 p-5">
          <div class="font-bold text-slate-900">Contoh sederhana SIG</div>
          <p class="mt-2 text-slate-700 leading-relaxed">
            Menentukan lokasi sekolah baru dengan mempertimbangkan kepadatan penduduk,
            jarak ke jalan utama, dan jarak ke fasilitas publik.
          </p>
        </div>
      </div>

      {{-- SECTION 5 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">5) Peta Dasar vs Peta Tematik</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          Peta dasar adalah peta yang berisi informasi umum sebagai kerangka referensi,
          sedangkan peta tematik menampilkan informasi khusus sesuai tema tertentu.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
          <div class="rounded-2xl border bg-white p-6">
            <div class="font-bold text-slate-900">Peta Dasar</div>
            <ul class="mt-3 list-disc pl-6 text-slate-700 space-y-1">
              <li>Jalan, sungai, garis pantai</li>
              <li>Batas administrasi</li>
              <li>Topografi/relief</li>
              <li>Referensi untuk peta lain</li>
            </ul>
          </div>
          <div class="rounded-2xl border bg-white p-6">
            <div class="font-bold text-slate-900">Peta Tematik</div>
            <ul class="mt-3 list-disc pl-6 text-slate-700 space-y-1">
              <li>Sebaran penduduk</li>
              <li>Peta rawan bencana</li>
              <li>Peta penggunaan lahan</li>
              <li>Peta sebaran fasilitas</li>
            </ul>
          </div>
        </div>

        <div class="mt-6 rounded-2xl border bg-blue-50 p-5">
          <div class="font-bold text-blue-900">Kenapa penting?</div>
          <p class="mt-2 text-slate-700 leading-relaxed">
            Karena pembangunan butuh peta yang tepat. Peta dasar memberi referensi, peta tematik memberi analisis sesuai kebutuhan.
          </p>
        </div>
      </div>

      {{-- SECTION 6 --}}
      <div class="rounded-3xl border bg-white p-8">
        <h2 class="text-2xl font-extrabold text-slate-900">6) Penerapan Geospasial (Use Case)</h2>
        <p class="mt-3 text-slate-700 leading-relaxed">
          Berikut beberapa penerapan nyata yang membuat geospasial “kerasa manfaatnya”.
          Kamu bisa jadikan ini sebagai bagian “latar belakang” atau “manfaat” di laporan tugas akhir.
        </p>

        <div class="mt-6 grid gap-4 md:grid-cols-2">
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Mitigasi Bencana</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Peta rawan bencana membantu menentukan jalur evakuasi, lokasi posko, serta prioritas penanganan wilayah.
            </p>
          </div>
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Tata Ruang & Perencanaan</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Memastikan pembangunan sesuai zonasi dan meminimalkan konflik penggunaan lahan.
            </p>
          </div>
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Transportasi</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Analisis rute, aksesibilitas fasilitas publik, dan perbaikan jaringan jalan.
            </p>
          </div>
          <div class="rounded-2xl border bg-slate-50 p-5">
            <div class="font-bold text-slate-900">Lingkungan</div>
            <p class="mt-2 text-sm text-slate-700 leading-relaxed">
              Monitoring perubahan tutupan lahan, kualitas lingkungan, dan konservasi wilayah.
            </p>
          </div>
        </div>

        <div class="mt-6 rounded-2xl bg-slate-900 text-white p-6">
          <div class="font-extrabold text-lg">Mini Challenge</div>
          <p class="mt-2 text-white/90 leading-relaxed">
            Buka halaman <span class="font-semibold">Peta</span>, pilih 3 lokasi, lalu tulis:
            (1) koordinat perkiraan, (2) kondisi wilayah, (3) manfaat data spasial untuk lokasi tersebut.
            Ini cocok jadi tugas kecil di laporan.
          </p>
          <a href="/peta" class="inline-flex mt-4 rounded-2xl bg-white px-5 py-3 font-semibold text-slate-900 hover:bg-white/90 transition">
            Buka Peta →
          </a>
        </div>
      </div>

      {{-- SECTION 7: CTA --}}
      <div class="rounded-3xl border bg-gradient-to-r from-blue-700 to-indigo-700 p-8 text-white">
        <h2 class="text-2xl font-extrabold">Siap uji pemahaman?</h2>
        <p class="mt-2 text-white/90 leading-relaxed">
          Setelah membaca materi, kerjakan quiz 25 soal dan dapatkan nilai + review benar/salah.
        </p>
        <div class="mt-5 flex flex-wrap gap-3">
          <a href="/quiz" class="rounded-2xl bg-white px-5 py-3 font-semibold text-blue-800 hover:bg-white/90 transition">
            Kerjakan Quiz
          </a>
          <a href="/feedback" class="rounded-2xl border border-white/40 px-5 py-3 font-semibold hover:bg-white/10 transition">
            Kirim Feedback
          </a>
        </div>
      </div>
    </article>
  </section>
@endsection
