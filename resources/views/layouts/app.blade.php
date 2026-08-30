<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>{{ $title ?? 'GeoEdu BIG' }}</title>

  {{-- Vite --}}
  @vite(['resources/css/app.css','resources/js/app.js'])

  {{-- Leaflet CSS --}}
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

  {{-- optional extra head per page --}}
  @stack('head')
</head>

<body class="bg-slate-50 text-slate-800">

<header class="bg-blue-800 text-white">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between">
    <span class="font-bold">GeoEdu BIG</span>
    <nav class="flex gap-4">
      <a href="/">Beranda</a>
      <a href="/materi">Materi</a>
      <a href="/peta">Peta</a>
      <a href="/quiz">Quiz</a>
      <a href="/feedback">Feedback</a>
    </nav>
  </div>
</header>

<main class="max-w-7xl mx-auto px-6 py-10">
  @yield('content')
</main>

<footer class="border-t py-6 text-center text-sm text-slate-500">
  © {{ date('Y') }} GeoEdu BIG — Project Akhir
</footer>

{{-- Leaflet JS (HARUS di bawah) --}}
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

{{-- per page scripts --}}
@stack('scripts')

</body>
</html>
