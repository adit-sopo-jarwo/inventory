@extends('layouts.main')

@section('content')
    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
        @foreach ($tableData as $category => $tables)
            <div class="bg-white shadow-lg rounded-lg">
                <div class="px-6 py-4 bg-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">{{ $category }}</h2>
                </div>
                @foreach ($tables as $tableName => $tableEntries)
                    <h2 class="text-3xl font-bold m-6 text-center text-gray-800">{{ ucfirst($tableName) }}</h2>
                    @if ($tableEntries->isNotEmpty())
                        <div class="overflow-x-auto">
                            <table class="w-full table-auto bg-white">
                                <thead>
                                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <th class="px-4 py-2">Warna</th>
                                        <th class="px-4 py-2">S</th>
                                        <th class="px-4 py-2">M</th>
                                        <th class="px-4 py-2">L</th>
                                        <th class="px-4 py-2">XL</th>
                                        <th class="px-4 py-2">XXL</th>
                                        <th class="px-4 py-2">XXXL</th>
                                        <th class="px-4 py-2">VIXL</th>
                                        <th class="px-4 py-2">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tableEntries as $entry)
                                        <tr class="text-gray-700">
                                            <td class="border px-4 py-2">{{ ucfirst($entry->warna) }}</td>
                                            <td class="border px-4 py-2">{{ $entry->S ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->M ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->L ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->XL ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->XXL ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->XXXL ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->VIXL ?? '0' }}</td>
                                            <td class="border px-4 py-2">{{ $entry->Total ?? '0' }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="px-6 py-4 text-center text-red-500">Tabel {{ $tableName }} tidak ditemukan atau
                            kosong.</p>
                    @endif
                @endforeach
                <div class="px-6 py-4 bg-gray-200">
                    <p class="text-lg font-bold text-gray-800">Total: {{ $totals[$category] }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
