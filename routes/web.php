<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MateriController;


Route::get('/', [PageController::class, 'home']);
Route::get('/materi', [MateriController::class, 'index']);
Route::get('/materi', [PageController::class, 'materi']);
Route::get('/materi/{slug}', [PageController::class, 'materiDetail']);
Route::get('/peta', [PageController::class, 'peta']);


Route::get('/quiz', [QuizController::class, 'intro']);      // halaman basa-basi
Route::get('/quiz/start', [QuizController::class, 'index']); // halaman soal 1/25
Route::post('/quiz/submit', [QuizController::class, 'submit']);


Route::get('/feedback', [FeedbackController::class, 'index']);
Route::post('/feedback', [FeedbackController::class, 'store']);
