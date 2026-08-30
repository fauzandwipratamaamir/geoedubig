@extends('layouts.app', ['title' => 'Quiz - Mulai'])

@section('content')
<div class="max-w-3xl mx-auto">

  <div class="mb-6">
    <h1 class="text-2xl font-extrabold text-slate-900">Quiz Geospasial & BIG</h1>
    <p class="text-slate-600 mt-1">Jawab satu per satu. Gunakan Next untuk lanjut.</p>
  </div>

  {{-- Progress --}}
  <div class="mb-4 rounded-2xl border bg-white p-4">
    <div class="flex items-center justify-between text-sm">
      <div class="font-semibold text-slate-900">
        Soal <span id="curIdx">1</span> / <span id="totalIdx">{{ count($quizzes) }}</span>
      </div>
      <div class="text-slate-600" id="progressText">0%</div>
    </div>

    <div class="mt-3 h-2 rounded-full bg-slate-100 overflow-hidden">
      <div id="progressBar" class="h-full w-0 bg-blue-700 transition-all duration-300"></div>
    </div>
  </div>

  <form id="quizForm" action="/quiz/submit" method="POST" class="space-y-4">
    @csrf

    @foreach($quizzes as $i => $q)
      <div class="question-card hidden" data-index="{{ $i }}">
        <div class="rounded-3xl border bg-white p-6 md:p-7 shadow-sm">
          <div class="flex items-start justify-between gap-3">
            <div class="text-sm text-slate-500 font-semibold">
              Pertanyaan {{ $i + 1 }}
            </div>
            <div class="text-xs rounded-full border bg-slate-50 px-3 py-1 text-slate-600">
              {{ $q->kategori ?? 'Geospasial & BIG' }}
            </div>
          </div>

          <h2 class="mt-3 text-xl font-extrabold text-slate-900 leading-snug">
            {{ $q->pertanyaan }}
          </h2>

          <div class="mt-5 space-y-2">
            @foreach(['a','b','c','d'] as $opsi)
              <label class="group flex items-start gap-3 rounded-2xl border bg-white p-4 hover:bg-slate-50 transition cursor-pointer">
                <input
                  type="radio"
                  name="jawaban[{{ $q->id }}]"
                  value="{{ $opsi }}"
                  class="mt-1"
                >
                <div>
                  <div class="font-bold text-slate-900 uppercase">{{ $opsi }}.</div>
                  <div class="text-slate-700">{{ $q->$opsi }}</div>
                </div>
              </label>
            @endforeach
          </div>

          <div class="mt-6 flex items-center justify-between gap-3">
            <button type="button"
                    class="px-5 py-3 rounded-2xl border bg-white font-semibold hover:bg-slate-50 transition"
                    onclick="prevQuestion()">
              ← Back
            </button>

            <button type="button"
                    class="px-5 py-3 rounded-2xl bg-blue-700 text-white font-semibold hover:bg-blue-800 transition"
                    onclick="nextQuestion()">
              Next →
            </button>
          </div>
        </div>
      </div>
    @endforeach

    {{-- Final submit --}}
    <div id="finalCard" class="hidden">
      <div class="rounded-3xl border bg-white p-7 text-center">
        <h2 class="text-2xl font-extrabold text-slate-900">Siap submit?</h2>
        <p class="mt-2 text-slate-600">
          Pastikan semua soal sudah kamu jawab. Klik tombol di bawah untuk melihat hasil.
        </p>

        <div class="mt-6 flex flex-wrap justify-center gap-3">
          <button type="button"
                  class="px-6 py-3 rounded-2xl border bg-white font-semibold hover:bg-slate-50 transition"
                  onclick="goToLastQuestion()">
            Cek soal terakhir
          </button>

          <button type="submit"
                  class="px-6 py-3 rounded-2xl bg-slate-900 text-white font-semibold hover:bg-slate-800 transition">
            Submit & Lihat Nilai ✅
          </button>
        </div>

        <p class="mt-4 text-xs text-slate-500">
          * Kalau ada soal yang belum terjawab, kamu bisa kembali dan lengkapi dulu.
        </p>
      </div>
    </div>

  </form>
</div>
@endsection

@push('scripts')
<script>
  const cards = Array.from(document.querySelectorAll('.question-card'));
  const total = cards.length;
  let idx = 0;

  const curIdxEl = document.getElementById('curIdx');
  const totalIdxEl = document.getElementById('totalIdx');
  const progressBar = document.getElementById('progressBar');
  const progressText = document.getElementById('progressText');
  const finalCard = document.getElementById('finalCard');

  function showCard(i) {
    cards.forEach(c => c.classList.add('hidden'));
    finalCard.classList.add('hidden');

    if (i >= total) {
      // selesai -> show final
      finalCard.classList.remove('hidden');
      curIdxEl.textContent = total;
      updateProgress(total);
      return;
    }

    idx = Math.max(0, Math.min(i, total - 1));
    cards[idx].classList.remove('hidden');

    curIdxEl.textContent = idx + 1;
    updateProgress(idx);
  }

  function updateProgress(i) {
    // progress dihitung dari posisi (0..total)
    const step = Math.min(i + 1, total);
    const percent = Math.round((step / total) * 100);
    progressText.textContent = percent + '%';
    progressBar.style.width = percent + '%';
  }

  function isAnswered(i) {
    const card = cards[i];
    if (!card) return true;
    const radios = card.querySelectorAll('input[type="radio"]');
    return Array.from(radios).some(r => r.checked);
  }

  function nextQuestion() {
    // validasi harus jawab dulu
    if (!isAnswered(idx)) {
      alert('Pilih jawaban dulu sebelum lanjut.');
      return;
    }

    // animasi ringan
    cards[idx].classList.add('opacity-0');
    setTimeout(() => {
      cards[idx].classList.remove('opacity-0');
      showCard(idx + 1);
    }, 120);
  }

  function prevQuestion() {
    if (idx === 0) return;
    showCard(idx - 1);
  }

  function goToLastQuestion() {
    showCard(total - 1);
  }

  // init
  totalIdxEl.textContent = total;
  showCard(0);
</script>
@endpush
