@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard Guru</h1>


        {{-- Tombol Aksi Cepat --}}
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <a href="{{ route('guru.tugas.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white text-center py-3 px-4 rounded-lg shadow">
                ➕ Buat Tugas
            </a>
            <a href="{{ route('guru.tugas.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white text-center py-3 px-4 rounded-lg shadow">
                📑 Daftar Tugas
            </a>
            <a href="{{ route('guru.nilai.index') }}"
                class="bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 px-4 rounded-lg shadow">
                📝 Beri Nilai
            </a>
            <a href="#" class="bg-gray-400 text-white text-center py-3 px-4 rounded-lg shadow cursor-not-allowed">
                📊 Rekap Nilai (Soon)
            </a>
        </div>

        {{-- Ringkasan Data --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="bg-green-100 border-l-4 border-green-500 p-4 rounded shadow">
                <h2 class="text-lg font-semibold text-green-700">Total Tugas</h2>
                <p class="text-3xl font-bold text-green-800 mt-2">{{ $totalTugas ?? 0 }}</p>
            </div>

            <div class="bg-blue-100 border-l-4 border-blue-500 p-4 rounded shadow">
                <h2 class="text-lg font-semibold text-blue-700">Jumlah Murid</h2>
                <p class="text-3xl font-bold text-blue-800 mt-2">{{ $totalMurid ?? 0 }}</p>
            </div>

            <div class="bg-yellow-100 border-l-4 border-yellow-500 p-4 rounded shadow">
                <h2 class="text-lg font-semibold text-yellow-700">Nilai Diberikan</h2>
                <p class="text-3xl font-bold text-yellow-800 mt-2">{{ $totalNilai ?? 0 }}</p>
            </div>
        </div>
    </div>
@endsection
