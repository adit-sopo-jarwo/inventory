@extends('layouts.main')

@section('content')
    @if ($productEntries->isNotEmpty())
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <h1 class="px-12 text-6xl mb-4 font-bold">{{ ucfirst($tableName) }}</h1>
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Warna</th>
                        <th scope="col" class="px-6 py-3">S</th>
                        <th scope="col" class="px-6 py-3">M</th>
                        <th scope="col" class="px-6 py-3">L</th>
                        <th scope="col" class="px-6 py-3">XL</th>
                        <th scope="col" class="px-6 py-3">2XL</th>
                        <th scope="col" class="px-6 py-3">3XL</th>
                        <th scope="col" class="px-6 py-3">6XL</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productEntries as $productEntry)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-3">{{ $productEntry->warna }}</td>
                            <td class="px-6 py-3">{{ $productEntry->S ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->M ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->L ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->XL ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->XXL ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->XXXL ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->VIXL ?? '-' }}</td>
                            <td class="px-6 py-3">{{ $productEntry->Total }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-red-500">No data found for this table and stok_id</p>
    @endif
@endsection
