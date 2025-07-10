@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-6">Dashboard Admin</h1>

        {{-- Menu Aksi --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>

                {{-- <a href="{{ route('admin.user.index') }}" --}}
                <a href="#" class="bg-indigo-600 hover:bg-indigo-700 text-white p-4 rounded-lg shadow text-center">
                    👥 Kelola Pengguna
                </a>
            </div>

            <div>

                {{-- <a href="{{ route('admin.kelas.index') }}" --}}
                <a href="#" class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-lg shadow text-center">
                    🏫 Kelola Kelas
                </a>
            </div>

            <div>

                {{-- <a href="{{ route('admin.mapel.index') }}" --}}
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-lg shadow text-center">📘
                    Kelola Mata Pelajaran
                </a>
            </div>

            <div>

                {{-- <a href="{{ route('admin.jadwal.index') }}" --}}
                <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white p-4 rounded-lg shadow text-center">
                    🗓️ Kelola Jadwal Pelajaran
                </a>
            </div>

            <div>

                {{-- <a href="{{ route('admin.pengumuman.index') }}" --}}
                <a href="#" class="bg-pink-600 hover:bg-pink-700 text-white p-4 rounded-lg shadow text-center">
                    📢 Kelola Pengumuman
                </a>
            </div>

            <a href="#" class="bg-gray-500 text-white p-4 rounded-lg shadow text-center cursor-not-allowed">
                💸 Pembayaran
        </div>
    </div>
@endsection
