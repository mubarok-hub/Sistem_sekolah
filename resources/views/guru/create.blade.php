{{-- resources/views/guru/tugas/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <a href="http://127.0.0.1:8000/guru/dashboard">Back to Dashboard</a>
    <div class="max-w-2xl mx-auto mt-10 bg-white p-8 rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Tugas</h1>

        <form action="{{ route('guru.tugas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- Mata Pelajaran --}}
            <div>
                <label for="jadwal_id" class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran</label>
                <select name="jadwal_id" id="jadwal_id" required
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="">-- Pilih Mapel --</option>
                    @foreach ($jadwal as $item)
                        <option value="{{ $item->id }}">
                            {{ $item->mapel->nama_mapel }} - {{ $item->kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Judul Tugas --}}
            <div>
                <label for="judul" class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas</label>
                <input type="text" name="judul" id="judul" required
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- Tipe Tugas --}}
            <div>
                <label for="tipe_tugas" class="block text-sm font-medium text-gray-700 mb-1">Tipe Tugas</label>
                <select name="tipe_tugas" id="tipe_tugas" required
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <option value="harian">Harian</option>
                    <option value="mingguan">Mingguan</option>
                    <option value="bulanan">Bulanan</option>
                </select>
            </div>

            {{-- Deadline --}}
            <div>
                <label for="deadline" class="block text-sm font-medium text-gray-700 mb-1">Deadline</label>
                <input type="date" name="deadline" id="deadline" required
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>

            {{-- File --}}
            <div>
                <label for="file" class="block text-sm font-medium text-gray-700 mb-1">File Pendukung (opsional)</label>
                <input type="file" name="file" id="file"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            {{-- Deskripsi --}}
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi (opsional)</label>
                <textarea name="deskripsi" id="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded-md shadow-sm px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500"></textarea>
            </div>

            {{-- Tombol --}}
            <div class="flex justify-end gap-2">
                <a href="{{ route('guru.tugas.index') }}"
                    class="inline-block px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition">Kembali</a>
                <button type="submit"
                    class="inline-block px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition">Simpan</button>
            </div>
        </form>
    </div>
@endsection
