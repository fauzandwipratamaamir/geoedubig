@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Feedback</h1>

@if(session('success'))
<p class="bg-green-100 p-3 rounded">{{ session('success') }}</p>
@endif

<form method="POST">
@csrf
<input name="nama" placeholder="Nama" class="border p-2 w-full mb-3">
<input name="email" placeholder="Email" class="border p-2 w-full mb-3">
<textarea name="pesan" placeholder="Pesan" class="border p-2 w-full mb-3"></textarea>
<button class="bg-blue-700 text-white px-6 py-2 rounded">Kirim</button>
</form>
@endsection
