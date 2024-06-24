@extends('layouts.main')

@section('content')
    <div class="flex justify-center items-center py-16">
        <div class="max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow-lg dark:bg-gray-800 dark:border-gray-700">
            <form id="orderForm" action="{{ route('admin.Out') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="stok_id" name="stok_id" value="">
                <div class="mb-6">
                    <label for="order_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                        Pesanan</label>
                    <input type="text" id="order_id" name="order_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ID Pesanan" />
                </div>
                <div class="mb-6">
                    <label for="id_ecommerce" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID
                        Ecommerce</label>
                    <input type="text" id="id_ecommerce" name="id_ecommerce"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="ID Ecommerce" />
                </div>
                <div class="mb-6">
                    <label for="receiver_name" class="mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                        Penerima</label>
                    <input type="text" id="receiver_name" name="receiver_name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nama Penerima" required />
                </div>
                <div class="mb-6">
                    <label for="alamat"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                    <textarea id="alamat" name="alamat"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Alamat" required></textarea>
                </div>
                <div class="mb-6">
                    <label for="telepon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Telepon</label>
                    <input type="tel" id="telepon" name="telepon"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="No Telepon" required />
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="productSelect" name="productSelect"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Produk</label>
                        <select id="productSelect" name="productSelect"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option value="" disabled selected>Pilih Produk</option>
                            <option value="adalfo" data-stok-id="1">Adalfo</option>
                            <option value="alverio" data-stok-id="2">Alverio</option>
                            <option value="antonio" data-stok-id="3">Antonio</option>
                            <option value="carlos" data-stok-id="4">Carlos</option>
                            <option value="casimiro" data-stok-id="5">Casimiro</option>
                            <option value="classico" data-stok-id="6">Classico</option>
                            <option value="dyaz" data-stok-id="7">Dyaz</option>
                            <option value="erasmo" data-stok-id="8">Erasmo</option>
                            <option value="gavi" data-stok-id="9">Gavi</option>
                            <option value="gordo" data-stok-id="10">Gordo</option>
                            <option value="hilario" data-stok-id="11">Hilario</option>
                            <option value="limitado" data-stok-id="12">Limitado</option>
                            <option value="luis" data-stok-id="13">Luis</option>
                            <option value="new_carlos" data-stok-id="14">New Carlos</option>
                            <option value="new_paloma" data-stok-id="15">New Paloma</option>
                            <option value="paloma" data-stok-id="16">Paloma</option>
                            <option value="camper" data-stok-id="17">Camper</option>
                            <option value="gream_reaper" data-stok-id="18">Gream Reaper</option>
                            <option value="greatmoth" data-stok-id="19">Greatmoth</option>
                            <option value="haloween" data-stok-id="20">Haloween</option>
                            <option value="mountcation" data-stok-id="21">Mountcation</option>
                            <option value="original" data-stok-id="22">Original</option>
                            <option value="perfect" data-stok-id="23">Perfect</option>
                            <option value="relax" data-stok-id="24">Relax</option>
                            <option value="samurai" data-stok-id="25">Samurai</option>
                            <option value="vitamin" data-stok-id="26">Vitamin</option>
                            <option value="byu" data-stok-id="27">Byu</option>
                            <option value="chico" data-stok-id="28">Chico</option>
                            <option value="gte" data-stok-id="29">Gte</option>
                            <option value="jago" data-stok-id="30">Jago</option>
                            <option value="macario" data-stok-id="31">Macario</option>
                            <option value="pirro" data-stok-id="32">Pirro</option>
                            <option value="bermudas" data-stok-id="33">Bermudas</option>
                        </select>
                    </div>
                    <div>
                        <label for="colorSelect" name="colorSelect"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Warna</label>
                        <select id="colorSelect" name="colorSelect" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Pilih Warna</option>
                            <option value="hitam">Hitam</option>
                            <option value="abu">Abu-Abu</option>
                            <option value="abu_tua">Abu-Abu Tua</option>
                            <option value="hijau">Hijau</option>
                            <option value="hijau_army">Hijau Army</option>
                            <option value="cokelat">Coklat</option>
                            <option value="cokelat_kopi">Coklat Kopi</option>
                            <option value="cream">Cream</option>
                            <option value="olive">Olive</option>
                            <option value="khaki">Khaki</option>
                            <option value="putih">Putih</option>
                            <option value="broken_white">Broken White</option>
                        </select>
                    </div>
                    <div>
                        <label for="sizeSelect" name="sizeSelect"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Ukuran</label>
                        <select id="sizeSelect" name="sizeSelect" disabled
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option selected disabled>Pilih Ukuran</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="XXXL">XXXL</option>
                            <option value="VIXL">VIXL</option>
                        </select>
                    </div>
                    <div>
                        <label for="mediaSelect" name="mediaSelect"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih
                            Media</label>
                        <select id="mediaSelect" name="mediaSelect"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required>
                            <option disabled selected>Pilih a Media</option>
                            <option value="shopee">Shopee</option>
                            <option value="Tokopedia">Tokopedia</option>
                            <option value="Tiktok Shop">Tiktok Shop</option>
                            <option value="Offline">Offline</option>
                        </select>
                    </div>
                    <div>
                        <label for="skuInput" name="skuInput"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">SKU</label>
                        <input type="text" id="skuInput" name="skuInput"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="SKU" readonly />
                    </div>
                    <div>
                        <!-- Tombol plus dan minus -->
                        <label for="quantity"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white px-10">Jumlah</label>
                        <div class="flex justify-between">
                            <div>
                                <button id="decrementQuantityButton" type="button"
                                    class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-dash-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 8a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11A.5.5 0 0 1 2 8" />
                                    </svg>
                                </button>
                                <input type="number" id="quantity" name="quantity" value="0"
                                    class="w-16 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 p-2 text-center"
                                    required>
                                <button id="incrementQuantityButton" type="button"
                                    class="p-2 bg-gray-200 rounded-full hover:bg-gray-300 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end items-center">
                    <button type="submit" value="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Kirim</button>
                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const orderForm = document.getElementById('orderForm');
            const order_id = document.getElementById('order_id');
            const receiver_name = document.getElementById('receiver_name');
            const alamat = document.getElementById('alamat');
            const stokIdInput = document.getElementById('stok_id');
            const productSelect = document.getElementById('productSelect');
            const colorSelect = document.getElementById('colorSelect');
            const sizeSelect = document.getElementById('sizeSelect');
            const quantityInput = document.getElementById('quantity');
            const skuField = document.getElementById('sku');
            const telephoneInput = document.getElementById('telepon');
            const decrementButton = document.getElementById('decrementQuantityButton');
            const incrementButton = document.getElementById('incrementQuantityButton');

            const updateColorSelect = () => {
                sizeSelect.disabled = false;
            };


            const decrementQuantity = () => {
                const currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            };

            const incrementQuantity = () => {
                const currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            };

            const validateForm = (event) => {
                event.preventDefault();

                if (!receiver_name.value || !alamat.value || !productSelect.value ||
                    !colorSelect.value || !sizeSelect.value || !quantityInput.value || !telephoneInput.value) {
                    alert('Mohon lengkapi semua field!');
                    return;
                }

                orderForm.submit();
            };

            const updateStokId = () => {
                const selectedProductId = productSelect.value;
                if (selectedProductId) {
                    const selectedOption = productSelect.querySelector(`option[value="${selectedProductId}"]`);
                    const stokId = selectedOption.getAttribute('data-stok-id');
                    stokIdInput.value = stokId;
                }
            };

            productSelect.addEventListener('change', () => {
                if (!productSelect.value) {
                    colorSelect.disabled = true;
                    sizeSelect.disabled = true;
                } else {
                    colorSelect.disabled = false;
                    colorSelect.selectedIndex = 0;
                    sizeSelect.selectedIndex = 0;

                    const productOptions = {
                        'adalfo': {
                            stok_id: 1,
                            colors: ['hitam', 'hijau', 'cokelat', 'abu', 'cream'],
                            sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                        },
                            'alverio': {
                                stok_id: 2,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu', 'cream', 'abu_tua'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'antonio': {
                                stok_id: 3,
                                colors: ['hitam', 'hijau_army', 'cokelat_kopi', 'abu'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'carlos': {
                                stok_id: 4,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'casimiro': {
                                stok_id: 5,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'classico': {
                                stok_id: 6,
                                colors: ['hitam', 'cream', 'cokelat', 'abu', 'khaki'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'dyaz': {
                                stok_id: 7,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'erasmo': {
                                stok_id: 8,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu', 'abu_tua', 'cream'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'gavi': {
                                stok_id: 9,
                                colors: ['hitam', 'hijau_army', 'cokelat_kopi', 'abu'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'gordo': {
                                stok_id: 10,
                                colors: ['hitam', 'hijau_army', 'cokelat_kopi', 'abu', 'olive', 'cream'],
                                sizes: ['XXXL', 'VIXL']
                            },
                            'hilario': {
                                stok_id: 11,
                                colors: ['hitam', 'hijau_army', 'cokelat_kopi', 'abu'],
                                sizes: ['XXXL', 'VIXL']
                            },
                            'limitado': {
                                stok_id: 12,
                                colors: ['broken_white', 'hijau_army', 'cokelat_kopi', 'abu'],
                                sizes: ['M', 'L', 'XL']
                            },
                            'luis': {
                                stok_id: 13,
                                colors: ['hitam', 'hijau_army', 'cokelat_kopi', 'abu'],
                                sizes: ['XXXL', 'VIXL']
                            },
                            'new_carlos': {
                                stok_id: 14,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu'],
                                sizes: ['M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'new_paloma': {
                                stok_id: 15,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu'],
                                sizes: ['M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'paloma': {
                                stok_id: 16,
                                colors: ['hitam', 'hijau', 'cokelat', 'abu', 'cream'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'camper': {
                                stok_id: 17,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'gream_reaper': {
                                stok_id: 18,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'greatmoth': {
                                stok_id: 19,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'haloween': {
                                stok_id: 20,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'mountcation': {
                                stok_id: 21,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'original': {
                                stok_id: 22,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'perfect': {
                                stok_id: 23,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'relax': {
                                stok_id: 24,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'samurai': {
                                stok_id: 25,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'vitamin': {
                                stok_id: 26,
                                colors: ['hitam', 'putih'],
                                sizes: ['S', 'M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                            'byu': {
                                stok_id: 27,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'chico': {
                                stok_id: 28,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'gte': {
                                stok_id: 29,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'jago': {
                                stok_id: 30,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'macario': {
                                stok_id: 31,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'pirro': {
                                stok_id: 32,
                                colors: ['hitam'],
                                sizes: ['S']
                            },
                            'bermudas': {
                                stok_id: 32,
                                colors: ['hitam', 'cokelat_kopi', 'abu', 'hijau_army'],
                                sizes: ['M', 'L', 'XL', 'XXL', 'XXXL']
                            },
                    };

                    const product = productOptions[productSelect.value];
                    const stok_id = product.stok_id;
                    const colors = product.colors;
                    const sizes = product.sizes;


                    colorSelect.innerHTML = `<option value="">Pilih Warna</option>` + colors.map(color => (
                        `<option value="${color}">${color}</option>`)).join('');
                    sizeSelect.innerHTML = `<option value="">Pilih Ukuran</option>` + sizes.map(size => (
                        `<option value="${size}">${size}</option>`)).join('');
                }
            });

            const updateSKU = () => {
                const selectedProduct = productSelect.value;
                const selectedColor = colorSelect.value;
                const selectedSize = sizeSelect.value;

                // Daftar SKU berdasarkan produk, warna, dan ukuran
                const skuList = {
                    'adalfo': {
                        'hitam': {
                            'S': '02060103',
                            'M': '02060203',
                            'L': '02060303',
                            'XL': '02060403',
                            'XXL': '02060503',
                            'XXXL': '02060603'
                        },
                        'hijau': {
                            'S': '02060104',
                            'M': '02060204',
                            'L': '02060304',
                            'XL': '02060404',
                            'XXL': '02060504',
                            'XXXL': '02060604'
                        },
                        'cokelat': {
                            'S': '02060105',
                            'M': '02060205',
                            'L': '02060305',
                            'XL': '02060405',
                            'XXL': '02060505',
                            'XXXL': '02060605'
                        },
                        'abu': {
                            'S': '02060106',
                            'M': '02060206',
                            'L': '02060306',
                            'XL': '02060406',
                            'XXL': '02060506',
                            'XXXL': '02060606'
                        },
                        'cream': {
                            'S': '02060107',
                            'M': '02060207',
                            'L': '02060307',
                            'XL': '02060407',
                            'XXL': '02060507',
                            'XXXL': '02060607'
                        }
                    },
                    'paloma': {
                        'hitam': {
                            'S': '02070113',
                            'M': '02070213',
                            'L': '02070313',
                            'XL': '02070413',
                            'XXL': '02070513',
                            'XXXL': '02070613'
                        },
                        'hijau': {
                            'S': '02070114',
                            'M': '02070214',
                            'L': '02070314',
                            'XL': '02070414',
                            'XXL': '02070514',
                            'XXXL': '02070614'
                        },
                        'cokelat': {
                            'S': '02070115',
                            'M': '02070215',
                            'L': '02070315',
                            'XL': '02070415',
                            'XXL': '02070515',
                            'XXXL': '02070615'
                        },
                        'abu': {
                            'S': '02070116',
                            'M': '02070216',
                            'L': '02070316',
                            'XL': '02070416',
                            'XXL': '02070516',
                            'XXXL': '02070616'
                        },
                        'cream': {
                            'S': '02070117',
                            'M': '02070217',
                            'L': '02070317',
                            'XL': '02070417',
                            'XXL': '02070517',
                            'XXXL': '02070617'
                        }
                    },
                    'alverio': {
                        'hitam': {
                            'S': '02080123',
                            'M': '02080223',
                            'L': '02080323',
                            'XL': '02080423',
                            'XXL': '02080523',
                            'XXXL': '02080623'
                        },
                        'hijau': {
                            'S': '02080124',
                            'M': '02080224',
                            'L': '02080324',
                            'XL': '02080424',
                            'XXL': '02080524',
                            'XXXL': '02080624'
                        },
                        'cokelat': {
                            'S': '02080125',
                            'M': '02080225',
                            'L': '02080325',
                            'XL': '02080425',
                            'XXL': '02080525',
                            'XXXL': '02080625'
                        },
                        'cream': {
                            'S': '02080126',
                            'M': '02080226',
                            'L': '02080326',
                            'XL': '02080426',
                            'XXL': '02080526',
                            'XXXL': '02080626'
                        },
                        'abu': {
                            'S': '02080127',
                            'M': '02080227',
                            'L': '02080327',
                            'XL': '02080427',
                            'XXL': '02080527',
                            'XXXL': '02080627'
                        },
                        'abu_tua': {
                            'S': '02080128',
                            'M': '02080228',
                            'L': '02080328',
                            'XL': '02080428',
                            'XXL': '02080528',
                            'XXXL': '02080628'
                        }
                    },
                    'erasmo': {
                        'hitam': {
                            'S': '02090133',
                            'M': '02090233',
                            'L': '02090333',
                            'XL': '02090433',
                            'XXL': '02090533',
                            'XXXL': '02090633'
                        },
                        'hijau': {
                            'S': '02090134',
                            'M': '02090234',
                            'L': '02090334',
                            'XL': '02090434',
                            'XXL': '02090534',
                            'XXXL': '02090634'
                        },
                        'cokelat': {
                            'S': '02090135',
                            'M': '02090235',
                            'L': '02090335',
                            'XL': '02090435',
                            'XXL': '02090535',
                            'XXXL': '02090635'
                        },
                        'cream': {
                            'S': '02090136',
                            'M': '02090236',
                            'L': '02090336',
                            'XL': '02090436',
                            'XXL': '02090536',
                            'XXXL': '02090636'
                        },
                        'abu': {
                            'S': '02090137',
                            'M': '02090237',
                            'L': '02090337',
                            'XL': '02090437',
                            'XXL': '02090537',
                            'XXXL': '02090637'
                        },
                        'abu_tua': {
                            'S': '02090138',
                            'M': '02090238',
                            'L': '02090338',
                            'XL': '02090438',
                            'XXL': '02090538',
                            'XXXL': '02090638'
                        }
                    },
                    'casimiro': {
                        'hitam': {
                            'S': '02100143',
                            'M': '02100243',
                            'L': '02100343',
                            'XL': '02100443',
                            'XXL': '02100543',
                            'XXXL': '02100643'
                        },
                        'hijau': {
                            'S': '02100144',
                            'M': '02100244',
                            'L': '02100344',
                            'XL': '02100444',
                            'XXL': '02100544',
                            'XXXL': '02100644'
                        },
                        'cokelat': {
                            'S': '02060145',
                            'M': '02060245',
                            'L': '02060345',
                            'XL': '02060445',
                            'XXL': '02060545',
                            'XXXL': '02060645'
                        },
                        'abu': {
                            'S': '02060146',
                            'M': '02060246',
                            'L': '02060346',
                            'XL': '02060446',
                            'XXL': '02060546',
                            'XXXL': '02060646'
                        }
                    },
                    'relax': {
                        'hitam': {
                            'S': '01030154',
                            'M': '01030254',
                            'L': '01030354',
                            'XL': '01030454',
                            'XXL': '01030554',
                            'XXXL': '01030654'
                        },
                        'putih': {
                            'S': '01030155',
                            'M': '01030255',
                            'L': '01030355',
                            'XL': '01030455',
                            'XXL': '01030555',
                            'XXXL': '01030655'
                        }
                    },
                    'mountcation': {
                        'hitam': {
                            'S': '01030156',
                            'M': '01030256',
                            'L': '01030356',
                            'XL': '01030456',
                            'XXL': '01030556',
                            'XXXL': '01030656'
                        },
                        'putih': {
                            'S': '01030157',
                            'M': '01030257',
                            'L': '01030357',
                            'XL': '01030457',
                            'XXL': '01030557',
                            'XXXL': '01030657'
                        }
                    },
                    'vitamin': {
                        'hitam': {
                            'S': '01030158',
                            'M': '01030258',
                            'L': '01030358',
                            'XL': '01030458',
                            'XXL': '01030558',
                            'XXXL': '01030658'
                        },
                        'putih': {
                            'S': '01030159',
                            'M': '01030259',
                            'L': '01030359',
                            'XL': '01030459',
                            'XXL': '01030559',
                            'XXXL': '01030859'
                        }
                    },
                    'gream_reaper': {
                        'hitam': {
                            'S': '01040160',
                            'M': '01040260',
                            'L': '01040360',
                            'XL': '01040460',
                            'XXL': '01040560',
                            'XXXL': '01040660'
                        },
                        'putih': {
                            'S': '01040161',
                            'M': '01040261',
                            'L': '01040361',
                            'XL': '01040461',
                            'XXL': '01040561',
                            'XXXL': '01040861'
                        }
                    },
                    'haloween': {
                        'hitam': {
                            'S': '01040162',
                            'M': '01040262',
                            'L': '01040362',
                            'XL': '01040462',
                            'XXL': '01040562',
                            'XXXL': '01040662'
                        },
                        'putih': {
                            'S': '01040163',
                            'M': '01040263',
                            'L': '01040363',
                            'XL': '01040463',
                            'XXL': '01040563',
                            'XXXL': '01040863'
                        }
                    },
                    'greatmoth': {
                        'hitam': {
                            'S': '01040164',
                            'M': '01040264',
                            'L': '01040364',
                            'XL': '01040464',
                            'XXL': '01040564',
                            'XXXL': '01040664'
                        },
                        'putih': {
                            'S': '01040164',
                            'M': '01040264',
                            'L': '01040364',
                            'XL': '01040464',
                            'XXL': '01040564',
                            'XXXL': '01040864'
                        }
                    },
                    'samurai': {
                        'hitam': {
                            'S': '01040165',
                            'M': '01040265',
                            'L': '01040365',
                            'XL': '01040465',
                            'XXL': '01040565',
                            'XXXL': '01040665'
                        },
                        'putih': {
                            'S': '01040166',
                            'M': '01040266',
                            'L': '01040366',
                            'XL': '01040466',
                            'XXL': '01040566',
                            'XXXL': '01040866'
                        }
                    },
                    'camper': {
                        'hitam': {
                            'S': '01040168',
                            'M': '01040268',
                            'L': '01040368',
                            'XL': '01040468',
                            'XXL': '01040568',
                            'XXXL': '01040668'
                        },
                        'putih': {
                            'S': '01040169',
                            'M': '01040269',
                            'L': '01040369',
                            'XL': '01040469',
                            'XXL': '01040569',
                            'XXXL': '01040869'
                        }
                    },
                    'original': {
                        'hitam': {
                            'S': '01050170',
                            'M': '01050270',
                            'L': '01050370',
                            'XL': '01050470',
                            'XXL': '01050570',
                            'XXXL': '01050670'
                        },
                        'putih': {
                            'S': '01050171',
                            'M': '01050271',
                            'L': '01050371',
                            'XL': '01050471',
                            'XXL': '01050571',
                            'XXXL': '01050871'
                        }
                    },
                    'perfect': {
                        'hitam': {
                            'S': '01050172',
                            'M': '01050272',
                            'L': '01050372',
                            'XL': '01050472',
                            'XXL': '01050572',
                            'XXXL': '01050672'
                        },
                        'putih': {
                            'S': '01050173',
                            'M': '01050273',
                            'L': '01050373',
                            'XL': '01050473',
                            'XXL': '01050573',
                            'XXXL': '01050873'
                        }
                    },
                    'byu': {
                        'hitam': {
                            'S': '031278'
                        }
                    },
                    'chico': {
                        'hitam': {
                            'S': '031378'
                        }
                    },
                    'gte': {
                        'hitam': {
                            'S': '031478'
                        }
                    },
                    'jago': {
                        'hitam': {
                            'S': '031578'
                        }
                    },
                    'macario': {
                        'hitam': {
                            'S': '031678'
                        }
                    },
                    'pirro': {
                        'hitam': {
                            'S': '031778'
                        }
                    },
                    'gordo': {
                        'hitam': {
                            'XXXL': '02180681',
                            'VIXL': '02180981'
                        },
                        'olive': {
                            'XXXL': '02180682',
                            'VIXL': '02180982'
                        },
                        'cream': {
                            'XXXL': '02180683',
                            'VIXL': '02180983'
                        },
                        'abu': {
                            'XXXL': '02180684',
                            'VIXL': '02180984'
                        },
                        'coklat_kopi': {
                            'XXXL': '02180685',
                            'VIXL': '02180985'
                        },
                        'hijau_army': {
                            'XXXL': '02180686',
                            'VIXL': '02180986'
                        }
                    },
                    'classsico': {
                        'hitam': {
                            'M': '02190290',
                            'L': '02190390',
                            'XL': '02190490',
                        },
                        'abu': {
                            'M': '02190291',
                            'L': '02190391',
                            'XL': '02190491',
                        },
                        'cokelat': {
                            'M': '02190292',
                            'L': '02190392',
                            'XL': '02190492',
                        },
                        'khaki': {
                            'M': '02190293',
                            'L': '02190393',
                            'XL': '02190493',
                        },
                        'cream': {
                            'M': '02190294',
                            'L': '02190394',
                            'XL': '02190494',
                        }
                    },
                    'new_paloma': {
                        'hitam': {
                            'S': '022001100',
                            'M': '022002100',
                            'L': '022003100',
                            'XL': '022004100',
                            'XXL': '022005100',
                            'XXXL': '022006100'
                        },
                        'hijau': {
                            'S': '022001101',
                            'M': '022002101',
                            'L': '022003101',
                            'XL': '022004101',
                            'XXL': '022005101',
                            'XXXL': '022006101'
                        },
                        'cokelat': {
                            'S': '022001102',
                            'M': '022002102',
                            'L': '022003102',
                            'XL': '022004102',
                            'XXL': '022005102',
                            'XXXL': '022006102'
                        },
                        'abu': {
                            'S': '022001103',
                            'M': '022002103',
                            'L': '022003103',
                            'XL': '022004103',
                            'XXL': '022005103',
                            'XXXL': '022006103'
                        },
                    },
                    'limitado': {
                        'hijau': {
                            'M': '022102106',
                            'L': '022103106',
                            'XL': '022104106',
                        },
                        'cream': {
                            'M': '022102107',
                            'L': '022103107',
                            'XL': '022104107',
                        },
                        'cokelat': {
                            'M': '022102108',
                            'L': '022103108',
                            'XL': '022104108',
                        },
                        'abu': {
                            'M': '022102109',
                            'L': '022103109',
                            'XL': '022104109',
                        }
                    },
                    'gavi': {
                        'hijau_army': {
                            'M': '022202113',
                            'L': '022203113',
                            'XL': '022204113',
                        },
                        'abu': {
                            'M': '022202114',
                            'L': '022203114',
                            'XL': '022204114',
                        },
                        'cokelat_kopi': {
                            'M': '022202115',
                            'L': '022203115',
                            'XL': '022204115',
                        },
                        'hitam': {
                            'M': '022202116',
                            'L': '022203116',
                            'XL': '022204116',
                        }
                    },
                    'carlos': {
                        'cokelat': {
                            'M': '022302120',
                            'L': '022303120',
                            'XL': '022304120',
                            'XXL': '022305120',
                            'XXXL': '022306120',
                        },
                        'hitam': {
                            'M': '022302121',
                            'L': '022303121',
                            'XL': '022304121',
                            'XXL': '022305121',
                            'XXXL': '022306121',
                        },
                        'hijau': {
                            'M': '022302122',
                            'L': '0223031202',
                            'XL': '022304122',
                            'XXL': '022305122',
                            'XXXL': '022306122',
                        },
                        'abu': {
                            'M': '022302123',
                            'L': '022303123',
                            'XL': '022304123',
                            'XXL': '022305123',
                            'XXXL': '022306123',
                        },
                    },
                    'new_carlos': {
                        'cokelat': {
                            'M': '022402127',
                            'L': '022403127',
                            'XL': '022404127',
                            'XXL': '022405127',
                            'XXXL': '022406127',
                        },
                        'hitam': {
                            'M': '022402128',
                            'L': '022403128',
                            'XL': '022404128',
                            'XXL': '022405128',
                            'XXXL': '022406128',
                        },
                        'hijau': {
                            'M': '022402129',
                            'L': '0224031279',
                            'XL': '022404129',
                            'XXL': '022405129',
                            'XXXL': '022406129',
                        },
                        'abu': {
                            'M': '022402130',
                            'L': '022403130',
                            'XL': '022404130',
                            'XXL': '022405130',
                            'XXXL': '022406130',
                        },
                    },
                    'hilario': {
                        'hijau': {
                            'XXXL': '022506134',
                            'VIXL': '022509134'
                        },
                        'abu': {
                            'XXXL': '022506135',
                            'VIXL': '022509135'
                        },
                        'hitam': {
                            'XXXL': '022506136',
                            'VIXL': '022509136'
                        },
                        'cokelat_kopi': {
                            'XXXL': '022506137',
                            'VIXL': '022509137'
                        }
                    },
                    'antonio': {
                        'hitam': {
                            'M': '022602140',
                            'L': '022603140',
                            'XL': '022604140',
                        },
                        'abu': {
                            'M': '022602141',
                            'L': '022603141',
                            'XL': '022604141',
                        },
                        'hijau': {
                            'M': '022602142',
                            'L': '022603142',
                            'XL': '022604142',
                        },
                        'cokelat_kopi': {
                            'M': '022602143',
                            'L': '022603143',
                            'XL': '022604143',
                        }
                    },
                    'luis': {
                        'hitam': {
                            'XXXL': '022706147',
                            'VIXL': '022709147'
                        },
                        'abu': {
                            'XXXL': '022706148',
                            'VIXL': '022709148'
                        },
                        'hijau': {
                            'XXXL': '022706149',
                            'VIXL': '022709149'
                        },
                        'cokelat_kopi': {
                            'XXXL': '022706150',
                            'VIXL': '022709150'
                        }
                    },
                    'dyaz': {
                        'hitam': {
                            'M': '022802153',
                            'L': '022803153',
                            'XL': '022804153',
                        },
                        'abu': {
                            'M': '022802154',
                            'L': '022803154',
                            'XL': '022804154',
                        },
                        'hijau': {
                            'M': '022802155',
                            'L': '022803155',
                            'XL': '022804155',
                        },
                        'cokelat': {
                            'M': '022802156',
                            'L': '022803156',
                            'XL': '022804156',
                        }
                    },
                    'bermudas': {
                        'hitam': {
                            'M': '022902160',
                            'L': '022903160',
                            'XL': '022904160',
                            'XXL': '022905160',
                            'XXXL': '022906160'
                        },
                        'cokelat_kopi': {
                            'M': '022902161',
                            'L': '022903161',
                            'XL': '022904161',
                            'XXL': '022905161',
                            'XXXL': '022906161'
                        },
                        'abu': {
                            'M': '022902162',
                            'L': '022903162',
                            'XL': '022904162',
                            'XXL': '022905162',
                            'XXXL': '022906162'
                        },
                        'hijau_army': {
                            'M': '022902163',
                            'L': '022903163',
                            'XL': '022904163',
                            'XXL': '022905163',
                            'XXXL': '022906163'
                        },
                    }
                };

                // Periksa apakah produk, warna, dan ukuran dipilih
                if (selectedProduct && selectedColor && selectedSize) {
                    // Ambil SKU berdasarkan produk, warna, dan ukuran
                    const sku = skuList[selectedProduct][selectedColor][selectedSize];
                    // Set nilai SKU input
                    skuInput.value = sku;
                } else {
                    // Set nilai SKU input menjadi kosong jika tidak ada produk, warna, atau ukuran yang dipilih
                    skuInput.value = '';
                }
            };


            colorSelect.addEventListener('change', updateColorSelect);
            sizeSelect.addEventListener('change', updateSKU);
            productSelect.addEventListener('change', updateStokId);
            decrementButton.addEventListener('click', decrementQuantity);
            incrementButton.addEventListener('click', incrementQuantity);
            orderForm.addEventListener('submit', validateForm);

            updateStokId();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if ($message = Session::get('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ $message }}',
            })
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            Swal.fire({
                icon: 'warning',
                title: 'Warning',
                text: '{{ $message }}',
            })
        </script>
    @endif
@endsection
