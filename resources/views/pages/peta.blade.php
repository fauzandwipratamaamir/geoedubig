@extends('layouts.app', ['title' => 'Peta Interaktif'])

@section('content')
<div class="space-y-6">

  {{-- HEADER --}}
  <div>
    <h1 class="text-3xl font-extrabold text-blue-900">Peta Interaktif Indonesia</h1>
    <p class="text-slate-600 mt-2">
      Cari kota, tempat wisata, restoran, atau perusahaan langsung di peta.
    </p>
  </div>

  {{-- FILTER --}}
  <div class="grid md:grid-cols-3 gap-4 bg-white p-4 rounded-2xl shadow">

    <select id="citySelect" class="border rounded-xl px-4 py-2">
      <option value="">Pilih Kota</option>
      <option value="Jakarta">Jakarta</option>
      <option value="Bandung">Bandung</option>
      <option value="Surabaya">Surabaya</option>
      <option value="Yogyakarta">Yogyakarta</option>
      <option value="Medan">Medan</option>
      <option value="Denpasar">Denpasar</option>
    </select>

    <select id="categorySelect" class="border rounded-xl px-4 py-2">
      <option value="">Jenis Tempat</option>
      <option value="tourism">Tempat Wisata</option>
      <option value="restaurant">Restoran / Kuliner</option>
      <option value="company">Perusahaan</option>
    </select>

    <button
      onclick="searchPlaces()"
      class="bg-blue-600 text-white rounded-xl hover:bg-blue-700"
    >
      Cari di Peta
    </button>

  </div>

  {{-- MAP --}}
  <div class="bg-white rounded-2xl shadow overflow-hidden">
<div id="map" style="height: 550px; width: 100%;"></div>
  </div>

</div>
@endsection

@push('scripts')
<script>
  // =========================
  // INIT MAP
  // =========================
  const map = L.map('map').setView([-2.5, 118], 5);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '© OpenStreetMap contributors'
  }).addTo(map);

  let markersLayer = L.layerGroup().addTo(map);

  // =========================
  // GET CITY COORDINATE
  // =========================
  async function getCityLocation(city) {
    const res = await fetch(
      `https://nominatim.openstreetmap.org/search?format=json&q=${city}, Indonesia`
    );
    const data = await res.json();
    if (data.length > 0) {
      return {
        lat: data[0].lat,
        lon: data[0].lon
      };
    }
    return null;
  }

  // =========================
  // SEARCH PLACES
  // =========================
  async function searchPlaces() {
    const city = document.getElementById('citySelect').value;
    const category = document.getElementById('categorySelect').value;

    if (!city || !category) {
      alert('Pilih kota dan jenis tempat!');
      return;
    }

    const location = await getCityLocation(city);
    if (!location) return;

    map.setView([location.lat, location.lon], 13);
    markersLayer.clearLayers();

    let tag = '';
    if (category === 'tourism') tag = 'tourism=attraction';
    if (category === 'restaurant') tag = 'amenity=restaurant';
    if (category === 'company') tag = 'office=company';

    const query = `
      [out:json];
      node[${tag}](around:5000, ${location.lat}, ${location.lon});
      out;
    `;

    const url = 'https://overpass-api.de/api/interpreter';

    const response = await fetch(url, {
      method: 'POST',
      body: query
    });

    const data = await response.json();

    data.elements.forEach(place => {
      if (!place.tags) return;

      const name = place.tags.name || 'Tanpa Nama';
      const address = place.tags['addr:street'] || city;

      const popup = `
        <div class="space-y-1">
          <strong>${name}</strong><br/>
          <span class="text-sm text-gray-600">${address}</span><br/>
          <span class="text-xs text-blue-600">${category.toUpperCase()}</span>
        </div>
      `;

      L.marker([place.lat, place.lon])
        .addTo(markersLayer)
        .bindPopup(popup);
    });
  }
</script>
@endpush
