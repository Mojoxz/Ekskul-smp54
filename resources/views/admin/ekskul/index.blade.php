<!-- resources/views/admin/ekskul/index.blade.php -->
@extends('layouts.app')

@section('title', 'Kelola Ekstrakurikuler')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-800">Kelola Ekstrakurikuler</h1>
    <a href="{{ route('admin.ekskul.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Tambah Ekstrakurikuler
    </a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="min-w-full">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jadwal</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($ekskuls as $index => $ekskul)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $ekskuls->firstItem() + $index }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                    {{ $ekskul->nama }}
                </td>
                <td class="px-6 py-4 text-sm text-gray-900 max-w-xs truncate">
                    {{ $ekskul->deskripsi }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    {{ $ekskul->hari }}<br>
                    <span class="text-xs text-gray-500">
                        {{ date('H:i', strtotime($ekskul->jam_mulai)) }} - {{ date('H:i', strtotime($ekskul->jam_selesai)) }}
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    @if($ekskul->status)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                            Nonaktif
                        </span>
                    @endif
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                    <button class="text-blue-600 hover:text-blue-900 mr-2">Edit</button>
                    <button class="text-red-600 hover:text-red-900">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="mt-4">
    {{ $ekskuls->links() }}
</div>
@endsection
