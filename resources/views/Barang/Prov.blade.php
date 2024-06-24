@extends('layouts.main')

@section('content')
    <div class="pr-4 flex justify-center">
        <div class="w-1/2">
            <h2 class="text-lg font-bold mb-4 text-center">Provinsi Dengan Pesanan Paling Banyak</h2>
            <div class="shadow-md sm:rounded-lg">
                <table class="w-full text-center text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-yellow-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Provinsi / Kota</th>
                            <th scope="col" class="px-6 py-3">Total Pesanan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($currentItems as $index => $item)
                            <tr class="items-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-3">{{ ($currentPage - 1) * $perPage + $index + 1 }}</td>
                                <td class="px-6 py-3">{{ $item->provinsi_kota }}</td>
                                <td class="px-6 py-3">{{ $item->total_pesanan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="flex justify-center gap-2 mt-4">
        @if ($currentPage > 1)
            <a href="{{ route('admin.provinces', ['page' => $currentPage - 1]) }}"
                class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18">
                    </path>
                </svg>
                <span class="ml-1 font-bold text-lg">Back</span>
            </a>
        @endif
        @if ($currentItems->count() == $perPage)
            <a href="{{ route('admin.provinces', ['page' => $currentPage + 1]) }}"
                class="inline-flex items-center border border-indigo-300 px-3 py-1.5 rounded-md text-indigo-500 hover:bg-indigo-50">
                <span class="mr-1 font-bold text-lg">Next</span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    class="h-6 w-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        @endif
    </div>
@endsection
