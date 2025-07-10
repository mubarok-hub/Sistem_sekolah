@extends('layouts.app')

@section('content')
    <a href="http://127.0.0.1:8000/guru/dashboard">Back to Dashboard</a>
    <div class="max-w-7xl mx-auto mt-10 px-4 sm:px-6 lg:px-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl font-semibold text-gray-800">Daftar Tugas</h1>
                <a href="{{ route('guru.tugas.create') }}"
                    class="inline-block bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    + Tambah Tugas
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 text-sm">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Judul</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Kelas</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Mapel</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Tipe</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Deadline</th>
                            <th class="px-4 py-2 text-left font-medium text-gray-700">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($tugas as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2">{{ $item->judul }}</td>
                                <td class="px-4 py-2">{{ $item->jadwal->kelas->nama_kelas ?? '-' }}</td>
                                <td class="px-4 py-2">{{ $item->jadwal->mapel->nama_mapel ?? '-' }}</td>
                                <td class="px-4 py-2 capitalize">{{ $item->tipe_tugas }}</td>
                                <td class="px-4 py-2">{{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}</td>
                                <td class="px-4 py-2 space-x-2">
                                    <a href="{{ route('guru.tugas.edit', $item->id) }}"
                                        class="inline-block px-3 py-1 text-sm bg-yellow-400 text-white rounded hover:bg-yellow-500 transition">
                                        Edit
                                    </a>
                                    <form action="{{ route('guru.tugas.destroy', $item->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus tugas ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="px-3 py-1 text-sm bg-red-600 text-white rounded hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                    Belum ada tugas yang tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
