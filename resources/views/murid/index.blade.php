@extends('layouts.app')

@section('content')
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Tugas</h1>
            <a href="{{ route('guru.tugas.create') }}"
                class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                + Tambah Tugas
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">#</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Judul</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Mapel</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Kelas</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Tipe</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Deadline</th>
                        <th class="px-4 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse ($tugas as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 font-semibold text-gray-800">{{ $item->judul }}</td>
                            <td class="px-4 py-3">{{ $item->jadwal->mapel->nama_mapel ?? '-' }}</td>
                            <td class="px-4 py-3">{{ $item->jadwal->kelas->nama_kelas ?? '-' }}</td>
                            <td class="px-4 py-3 capitalize">{{ $item->tipe_tugas }}</td>
                            <td class="px-4 py-3">{{ \Carbon\Carbon::parse($item->deadline)->format('d M Y') }}</td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('guru.tugas.edit', $item->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('guru.tugas.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus tugas ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-6 text-center text-gray-500">Belum ada tugas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
