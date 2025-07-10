@extends('layouts.app')
@section('content')
    <div class="max-w-5xl mx-auto px-4 py-8">
        <a href="{{ url('/guru/dashboard') }}" class="inline-block mb-6 text-blue-600 hover:underline">&larr; Back to
            Dashboard</a>
        <h1 class="text-2xl font-bold mb-6">Nilai Tugas Murid</h1>

        @if (session('success'))
            <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($tugas as $item)
            <div class="mb-8">
                <h5 class="text-lg font-semibold mb-2">{{ $item->judul }} - {{ $item->jadwal->mapel->nama_mapel }}</h5>
                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white border border-gray-200 rounded shadow">
                        <thead>
                            <tr class="bg-gray-100 text-gray-700">
                                <th class="py-2 px-4 border-b">Nama Murid</th>
                                <th class="py-2 px-4 border-b">Upload</th>
                                <th class="py-2 px-4 border-b">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->tugasMurid as $tm)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-2 px-4 border-b">{{ $tm->murid->name }}</td>
                                    <td class="py-2 px-4 border-b text-center">
                                        @if ($tm->file)
                                            <a href="{{ asset('storage/' . $tm->file) }}" target="_blank"
                                                class="text-blue-600 hover:underline">Lihat</a>
                                        @endif
                                    </td>
                                    <td class="py-2 px-4 border-b">
                                        <form action="{{ route('guru.nilai.store') }}" method="POST"
                                            class="flex items-center gap-2">
                                            @csrf
                                            <input type="hidden" name="murid_id" value="{{ $tm->murid->id }}">
                                            <input type="hidden" name="mapel_id" value="{{ $item->jadwal->mapel->id }}">
                                            <input type="hidden" name="kategori" value="harian">
                                            <input type="number" name="nilai"
                                                class="border rounded px-2 py-1 w-20 focus:outline-none focus:ring focus:border-blue-400"
                                                value="" min="0" max="100" required>
                                            <button
                                                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 text-sm">Simpan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endforeach
    </div>
@endsection
