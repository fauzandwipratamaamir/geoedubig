@extends('layouts.app', ['title' => 'Quiz'])

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

  <div class="rounded-3xl border bg-white p-8">
    <div class="inline-flex items-center gap-2 rounded-full border bg-blue-50 px-3 py-1 text-sm text-blue-800">
      <span class="font-semibold">Quiz</span>
      <span class="text-slate-500">•</span>
      <span class="text-slate-700">Geospasial & BIG</span>
    </div>

    <h1 class="mt-4 text-3xl font-extrabold text-slate-900">Uji Pemahaman Geospasial</h1>
    <p class="mt-2 text-slate-600 leading-relaxed">
      Quiz ini berisi pertanyaan seputar Informasi Geospasial, peta, koordinat, SIG, dan peran BIG.
      Cocok untuk evaluasi setelah membaca materi.
    </p>

    <div class="mt-6 grid gap-4 md:grid-cols-3">
      <div class="rounded-2xl border bg-slate-50 p-4">
        <div class="text-sm text-slate-600">Jumlah soal</div>
        <div class="text-2xl font-extrabold text-blue-700">25</div>
      </div>
      <div class="rounded-2xl border bg-slate-50 p-4">
        <div class="text-sm text-slate-600">Mode</div>
        <div class="text-2xl font-extrabold text-blue-700">1 per 1</div>
      </div>
      <div class="rounded-2xl border bg-slate-50 p-4">
        <div class="text-sm text-slate-600">Hasil</div>
        <div class="text-2xl font-extrabold text-blue-700">Nilai</div>
      </div>
    </div>

    <div class="mt-6 rounded-2xl border bg-white p-5">
      <div class="font-bold text-slate-900">Aturan singkat</div>
      <ul class="mt-2 list-disc pl-6 text-slate-600 space-y-1">
        <li>Setiap soal harus dipilih jawabannya.</li>
        <li>Kamu bisa kembali ke soal sebelumnya.</li>
        <li>Di akhir kamu akan mendapat benar/salah dan nilai (0–100).</li>
      </ul>
    </div>

    <div class="mt-7 flex flex-wrap gap-3">
      <a href="/quiz/start"
         class="inline-flex items-center justify-center rounded-2xl bg-blue-700 px-6 py-3 text-white font-semibold hover:bg-blue-800 transition">
        Mulai Quiz →
      </a>
      <a href="/materi"
         class="inline-flex items-center justify-center rounded-2xl border bg-white px-6 py-3 font-semibold hover:bg-slate-50 transition">
        Baca Materi Dulu
      </a>
    </div>

    <p class="mt-4 text-xs text-slate-500">
      * Total soal aktif di database saat ini: {{ $total }} (quiz akan ambil maksimal 25 soal).
    </p>
  </div>

</div>
@endsection
