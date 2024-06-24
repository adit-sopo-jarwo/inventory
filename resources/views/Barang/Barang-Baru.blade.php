@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center py-14">
        <div class="w-full max-w-6xl p-8 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <form id="orderForm" action="{{ route('admin.Barang-Baru') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-1 px-8">
                    <div class="flex flex-col justify-start">
                        <div>
                            <label for="name_product" class="block mb-2 font-medium text-gray-900 dark:text-white">Nama Barang</label>
                        </div>
                        <div>
                            <input type="text" id="name_product" name="name_product" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                        </div>
                    </div>
                    <div>
                        <label for="color" class="block mb-2 font-medium text-gray-900 dark:text-white text-2xl">Warna</label>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach(['Hitam', 'Abu-Abu', 'Abu-Abu Tua', 'Hijau', 'Hijau Army', 'Cokelat', 'Cokelat Kopi', 'Cream', 'Olive', 'Khaki', 'Putih', 'Broken White'] as $color)
                                <div class="flex items-center justify-between border p-2 rounded-md">
                                    <span class="text-gray-900 dark:text-white">{{ $color }}</span>
                                    <input type="checkbox" id="{{ str_replace(' ', '_', $color) }}" name="colors[]" value="{{ $color }}" class="peer sr-only opacity-0" />
                                    <label for="{{ str_replace(' ', '_', $color) }}" class="relative flex h-6 w-11 cursor-pointer items-center rounded-full bg-gray-400 px-0.5 transition-colors before:h-5 before:w-5 before:rounded-full before:bg-white before:shadow before:transition-transform before:duration-300 peer-checked:bg-green-500 peer-checked:before:translate-x-full peer-focus-visible:outline peer-focus-visible:outline-offset-2"></label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div>
                        <label for="size" class="block mb-2 font-medium text-gray-900 dark:text-white text-2xl">Ukuran</label>
                        <div class="grid grid-cols-1 gap-2">
                            @foreach(['S', 'M', 'L', 'XL', 'XXL', 'XXXL', 'VIXL'] as $size)
                                <div class="flex items-center justify-between border p-2 rounded-md">
                                    <span class="text-gray-900 dark:text-white">{{ $size }}</span>
                                    <input type="checkbox" id="{{ $size }}" name="sizes[]" value="{{ $size }}" class="peer sr-only opacity-0" />
                                    <label for="{{ $size }}" class="relative flex h-6 w-11 cursor-pointer items-center rounded-full bg-gray-400 px-0.5 transition-colors before:h-5 before:w-5 before:rounded-full before:bg-white before:shadow before:transition-transform before:duration-300 peer-checked:bg-green-500 peer-checked:before:translate-x-full peer-focus-visible:outline peer-focus-visible:outline-offset-2"></label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Tombol plus dan minus -->
                <div class="flex justify-center items-center mb-6 gap-2">
                    <button id="decrementQuantityButton" type="button" class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                        </svg>
                    </button>
                    <input type="number" id="quantity" name="quantity" value="0" class="w-16 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2">
                    <button id="incrementQuantityButton" type="button" class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                        </svg>
                    </button>
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mendapatkan elemen
            const quantityInput = document.getElementById('quantity');
            const decrementButton = document.getElementById('decrementQuantityButton');
            const incrementButton = document.getElementById('incrementQuantityButton');

            // Event listener untuk tombol tambah
            incrementButton.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan default action dari tombol
                // Mendapatkan nilai saat ini dari input jumlah
                let currentQuantity = parseInt(quantityInput.value);
                // Memeriksa apakah nilai saat ini adalah angka yang valid
                if (!isNaN(currentQuantity)) {
                    // Menambahkan 1 ke nilai saat ini
                    currentQuantity++;
                    // Memperbarui nilai input jumlah
                    quantityInput.value = currentQuantity;
                } else {
                    // Jika nilai saat ini tidak valid, atur nilai input menjadi 1
                    quantityInput.value = 1;
                }
            });

            // Event listener untuk tombol kurang
            decrementButton.addEventListener('click', function(event) {
                event.preventDefault(); // Menghentikan default action dari tombol
                // Mendapatkan nilai saat ini dari input jumlah
                let currentQuantity = parseInt(quantityInput.value);
                // Memeriksa apakah nilai saat ini adalah angka yang valid dan lebih besar dari 1
                if (!isNaN(currentQuantity) && currentQuantity > 1) {
                    // Mengurangi 1 dari nilai saat ini
                    currentQuantity--;
                    // Memperbarui nilai input jumlah
                    quantityInput.value = currentQuantity;
                } else {
                    // Jika nilai saat ini tidak valid atau kurang dari atau sama dengan 1, atur nilai input menjadi 1
                    quantityInput.value = 1;
                }
            });
        });
    </script>
@endsection
