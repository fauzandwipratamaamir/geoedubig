<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;

class QuizController extends Controller
{
    public function intro()
    {
        $total = Quiz::query()->where('is_active', true)->count();
        return view('pages.quiz_intro', compact('total'));
    }

    public function index()
    {
        // ambil 25 soal aktif
        $quizzes = Quiz::query()
            ->where('is_active', true)
            ->inRandomOrder()
            ->limit(25)
            ->get();

        return view('pages.quiz_wizard', compact('quizzes'));
    }

    public function submit(Request $request)
    {
        $jawaban = $request->input('jawaban', []); // jawaban[id] = a/b/c/d
        $ids = array_keys($jawaban);

        $quizzes = Quiz::query()->whereIn('id', $ids)->get();

        $benar = 0;
        $detail = [];

        foreach ($quizzes as $q) {
            $pilih = $jawaban[$q->id] ?? '';
            $isBenar = ($pilih === $q->jawaban);
            if ($isBenar) $benar++;

            $detail[] = [
                'pertanyaan' => $q->pertanyaan,
                'pilih' => $pilih,
                'jawaban' => $q->jawaban,
                'isBenar' => $isBenar,
                'pembahasan' => $q->pembahasan,
            ];
        }

        $total = count($quizzes);
        $salah = $total - $benar;
        $nilai = $total > 0 ? round(($benar / $total) * 100) : 0;

        return view('pages.quiz_result', compact('benar', 'salah', 'nilai', 'total', 'detail'));
    }
}
