@extends('layouts.app', ['title' => 'Quiz'])

@section('content')
  <div class="mb-6">
    <h1 class="text-3xl font-extrabold text-slate-900">Quiz Geospasial & BIG</h1>
    <p class="text-slate-600 mt-2">Jawab 25 soal berikut. Setelah submit, kamu dapat nilai + benar/salah.</p>
  </div>

  <form action="/quiz/submit" method="POST" class="space-y-4">
    @csrf

    @foreach($quizzes as $i => $q)
      <div class="bg-white border rounded-2xl p-5">
        <div class="font-bold text-slate-900 mb-3">
          {{ $i+1 }}. {{ $q->pertanyaan }}
        </div>

        @foreach(['a','b','c','d'] as $opsi)
          <label class="flex items-center gap-2 py-1 text-slate-700">
            <input type="radio" name="jawaban[{{ $q->id }}]" value="{{ $opsi }}" required>
            <span class="font-semibold uppercase">{{ $opsi }}.</span>
            <span>{{ $q->$opsi }}</span>
          </label>
        @endforeach
      </div>
    @endforeach

    <button class="px-6 py-3 rounded-2xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition">
      Submit Quiz
    </button>
  </form>
@endsection
