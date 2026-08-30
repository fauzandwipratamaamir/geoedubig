<?php

namespace App\Http\Controllers;

use App\Models\Materi;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function materi()
    {
        $materis = Materi::latest()->get();
        return view('pages.materi', compact('materis'));
    }

    public function materiDetail($slug)
    {
        $materi = Materi::where('slug', $slug)->firstOrFail();
        return view('pages.materi_detail', compact('materi'));
    }

    public function peta()
    {
        return view('pages.peta');
    }
}
