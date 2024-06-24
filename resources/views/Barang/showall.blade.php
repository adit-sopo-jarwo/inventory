@extends('layouts/main')

@section('content')
    

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <caption class="p-5 text-lgtext-center text-3xl font-bold rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            Provinsi/Kota Penjualan Terbanyak
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                   No
                </th>
                <th scope="col" class="px-6 py-3">
                    Provinsi/Kota
                </th>
                <th scope="col" class="px-6 py-3">
                    Total
                </th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($provinsiPesanan as $provinsi => $total)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{ $no++ }}</td>
                <td class="px-6 py-4">{{ $provinsi }}</td>
                <td class="px-6 py-4">{{ $total }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection