    @extends('layouts.main')

    @section('content')
        <div class="mx-12 my-5">
            <!-- Actions: Add New Product and Search -->
            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <a href="{{ route('admin.Create') }}"
                    class="flex justify-center items-center p-3 text-white bg-blue-800 hover:bg-blue-900 rounded-md">
                    Tambah Barang Baru
                </a>
                <form action="{{ route('admin.home') }}" method="get">
                    @csrf
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative flex items-center">
                        <input type="text" id="table-search" name="search"
                            class="block p-2 ps-6 text-gray-900 border border-gray-300 rounded-lg w-60 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search" value="{{ request()->get('search') }}">
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

            <!-- Product Table -->
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr class="text-center">
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-10 py-3">Foto</th>
                            <th scope="col" class="px-6 py-3">Nama Barang</th>
                            <th scope="col" class="px-6 py-3">Warna</th>
                            <th scope="col" class="px-6 py-3">Ukuran</th>
                            <th scope="col" class="px-6 py-3">Total</th>
                            <th scope="col" class="mr-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $d)
                            <tr
                                class="items-center bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                                <td class="px-6 py-3">{{ $loop->iteration }}</td>
                                <td scope="col" class="px-10 py-3">
                                    @if ($d->image)
                                        <img src="{{ asset('storage/produk/' . $d->image) }}" alt="Photo of {{ $d->produk }}"
                                            class="w-20 h-20 object-cover cursor-pointer"
                                            onclick="showModal('{{ asset('storage/produk/' . $d->image) }}')">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td class="px-6 py-3">{{ $d->nama }}</td>
                                <td class="px-6 py-3">{{ $d->warna }}</td>
                                <td class="px-6 py-3">{{ $d->size }}</td>
                                <td class="px-6 py-3">{{ $d->total }}</td>
                                <td class="px-6 py-3 flex justify-center items-center space-x-2">
                                    <!-- Tombol Detail -->
                                    <a href="{{ route('admin.detail', $d->id) }}"
                                        class="font-medium text-white hover:underline flex justify-center items-center bg-blue-600 rounded-md w-20 h-9">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-eye me-1" viewBox="0 0 16 16">
                                            <path
                                                d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13 13 0 011.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0114.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 011.172 8z" />
                                            <path
                                                d="M8 5.5a2.5 2.5 0 100 5 2.5 2.5 0 000-5zM4.5 8a3.5 3.5 0 117 0 3.5 3.5 0 01-7 0z" />
                                        </svg> Detail
                                    </a>
                                    <!-- Tombol Edit -->
                                    <a href="{{ route('admin.edit', $d->id) }}"
                                        class="font-medium text-black hover:underline flex justify-center items-center bg-yellow-300 rounded-md w-20 h-9">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pen me-1" viewBox="0 0 16 16">
                                            <path
                                                d="m13.498.795.149-.149a1.207 1.207 0 111.707 1.708l-.149.148a1.5 1.5 0 01-.059 2.059L4.854 14" />
                                        </svg> Edit
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('admin.delete', $d->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this item?');"
                                        class="flex justify-center items-center">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-white hover:underline bg-red-600 rounded-md w-20 h-9 flex justify-center items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-trash3 me-1" viewBox="0 0 16 16">
                                                <path
                                                    d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5" />
                                            </svg> Delete
                                        </button>
                                    </form>
                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Modal for Image Preview -->
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

        <!-- JavaScript for Modal -->
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
