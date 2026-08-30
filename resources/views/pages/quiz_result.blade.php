@extends('layouts.app', ['title' => 'Hasil Quiz'])

@section('content')
  <div class="bg-white border rounded-2xl p-6">
    <h1 class="text-3xl font-extrabold text-slate-900">Hasil Quiz</h1>

    <div class="mt-4 grid md:grid-cols-4 gap-3">
      <div class="p-4 rounded-xl bg-slate-50 border">
        <div class="text-sm text-slate-600">Nilai</div>
        <div class="text-2xl font-extrabold text-blue-700">{{ $nilai }}</div>
      </div>
      <div class="p-4 rounded-xl bg-slate-50 border">
        <div class="text-sm text-slate-600">Benar</div>
        <div class="text-2xl font-extrabold text-green-600">{{ $benar }}</div>
      </div>
      <div class="p-4 rounded-xl bg-slate-50 border">
        <div class="text-sm text-slate-600">Salah</div>
        <div class="text-2xl font-extrabold text-red-600">{{ $salah }}</div>
      </div>
      <div class="p-4 rounded-xl bg-slate-50 border">
        <div class="text-sm text-slate-600">Total Soal</div>
        <div class="text-2xl font-extrabold text-slate-900">{{ $total }}</div>
      </div>
    </div>
  </div>

  <div class="mt-6">
    <a href="/quiz" class="inline-flex px-5 py-3 rounded-2xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
      Ulangi Quiz
    </a>
  </div>
@endsection
