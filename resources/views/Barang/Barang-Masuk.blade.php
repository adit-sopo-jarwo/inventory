@extends('layouts.main')

@section('content')
    <div class="mx-12 my-5">
        <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
            <a href="{{ route('admin.Masuk') }}"
                class="flex justify-center items-center p-3 text-white bg-blue-800 hover:bg-blue-900 rounded-md">
                Tambah Barang Baru
            </a>
            <form action="{{ route('admin.home') }}" method="get">
                @csrf
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative flex items-center">
                    <input type="text" id="table-search" name="search"
                        class="block p-2 ps-6 text-gray-900 border border-gray-300 rounded-lg w-60 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search" value="{{ $request->get('search') }}">
                    <button type="submit" class="absolute right-0 top-0 bottom-0 mt-auto mb-auto mr-2">
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Operator</th>
                        <th scope="col" class="px-6 py-3">Batch</th>
                        <th scope="col" class="px-6 py-3">SKU</th>
                        <th scope="col" class="px-6 py-3">Produk</th>
                        <th scope="col" class="px-6 py-3">Warna</th>
                        <th scope="col" class="px-6 py-3">Ukuran</th>
                        <th scope="col" class="px-10 py-3">Foto</th>
                        <th scope="col" class="px-6 py-3">Tanggal Masuk</th>
                        <th scope="col" class="px-6 py-3">Pembayaran</th>
                        <th scope="col" class="px-6 py-3">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupedData = $data->groupBy('batch');
                    @endphp
                    @foreach ($groupedData as $batch => $items)
                        @foreach ($items as $index => $item)
                            <tr
                                class="items-center text-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                @if ($index === 0)
                                    <td scope="col" rowspan="{{ $items->count() }}" class="px-6 py-3">
                                        {{ $loop->parent->iteration }}</td>
                                    <td scope="col" rowspan="{{ $items->count() }}" class="px-6 py-3">
                                        {{ $item->operator }}</td>
                                    <td scope="col" rowspan="{{ $items->count() }}" class="px-6 py-3">{{ $item->batch }}
                                    </td>
                                @endif
                                <td scope="col" class="px-6 py-3">{{ $item->sku }}</td>
                                <td scope="col" class="px-6 py-3">{{ $item->produk }}</td>
                                <td scope="col" class="px-6 py-3">{{ $item->warna }}</td>
                                <td scope="col" class="px-6 py-3">{{ $item->ukuran }}</td>
                                <td scope="col" class="px-10 py-3">
                                    @if ($item->image)
                                        <img src="{{ asset('storage/produk/' . $item->image) }}"
                                            alt="Photo of {{ $item->produk }}"
                                            class="w-20 h-20 object-cover cursor-pointer"
                                            onclick="showModal('{{ asset('storage/produk/' . $item->image) }}')">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td scope="col" class="px-6 py-3">{{ $item->tanggal_masuk }}</td>
                                <td scope="col" class="px-6 py-3">{{ $item->pembayaran }}</td>
                                <td scope="col" class="px-6 py-3">{{ $item->total }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="fixed z-10 inset-0 overflow-y-auto flex items-center justify-center hidden" id="imageModal">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <div class="mt-2">
                            <img src="" class="imagepreview w-full">
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                    class="close-modal w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Close
                </button>
            </div>
        </div>
    </div>

    <script>
        function showModal(imageUrl) {
            const modal = document.getElementById('imageModal');
            const imagePreview = modal.querySelector('.imagepreview');
            imagePreview.src = imageUrl;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const closeModalButtons = document.querySelectorAll('.close-modal');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = document.getElementById('imageModal');
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                });
            });
        });
    </script>
@endsection
