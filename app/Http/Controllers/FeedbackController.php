<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.feedback');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:150',
            'subjek' => 'nullable|string|max:120',
            'pesan' => 'required|string|max:2000',
            'rating' => 'nullable|integer|min:1|max:5',
            'tipe' => 'nullable|string|max:50',
        ]);

        // default jika kosong
        $data['tipe'] = $data['tipe'] ?? 'Saran';

        Feedback::create($data);

        return back()->with('success', 'Feedback berhasil dikirim. Terima kasih!');
    }
}
