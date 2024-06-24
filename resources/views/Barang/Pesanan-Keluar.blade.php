@extends('layouts.main')

@section('content')
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div class="pl-32">
            <a href="{{ route('admin.Keluar') }}"
                class="bg-blue-800 hover:bg-blue-900 text-white items-center px-8 py-2 rounded-md ml-72 relative">Pesanan
                Baru</a>
        </div>
        <form action="{{ route('admin.pesanan') }}" method="get">
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
    <div class="flex justify-between gap-5">

        <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
            <div class="flex justify-between pb-4 mb-4 border-b border-gray-200 dark:border-gray-700">
                <div class="flex items-center">
                    <div class="w-12 h-12 rounded-lg bg-gray-100 dark:bg-gray-700 flex items-center justify-center me-3">
                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 19">
                            <path
                                d="M14.5 0A3.987 3.987 0 0 0 11 2.1a4.977 4.977 0 0 1 3.9 5.858A3.989 3.989 0 0 0 14.5 0ZM9 13h2a4 4 0 0 1 4 4v2H5v-2a4 4 0 0 1 4-4Z" />
                            <path
                                d="M5 19h10v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2ZM5 7a5.008 5.008 0 0 1 4-4.9 3.988 3.988 0 1 0-3.9 5.859A4.974 4.974 0 0 1 5 7Zm5 3a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm5-1h-.424a5.016 5.016 0 0 1-1.942 2.232A6.007 6.007 0 0 1 17 17h2a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5ZM5.424 9H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h2a6.007 6.007 0 0 1 4.366-5.768A5.016 5.016 0 0 1 5.424 9Z" />
                        </svg>
                    </div>
                    <div>
                        <div>
                            <h5 class="leading-none text-2xl font-bold text-gray-900 dark:text-white pb-1">Total Orders:
                                <span id="total-orders">{{ $totalOrders }}</span>
                            </h5>
                            <p class="text-sm font-normal text-gray-500 dark:text-gray-400">Completed: <span
                                    id="completed-orders">{{ $completed }}</span>, Processing: <span
                                    id="processing-orders">{{ $processing }}</span>, Cancelled: <span
                                    id="cancelled-orders">{{ $cancelled }}</span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="chart-container" class="w-full h-[400px]"></div>
            <div class="grid grid-cols-1 items-center border-gray-200 border-t dark:border-gray-700 justify-between">
                <div class="flex justify-center items-center pt-5">
                    <a href="{{ route('admin.show-all') }}"
                        class="uppercase text-sm font-semibold inline-flex items-center rounded-lg text-blue-600 hover:text-blue-700 dark:hover:text-blue-500 hover:bg-gray-100 dark:hover:bg-gray-700">
                        Liat Semua
                    </a>
                </div>
            </div>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-gray-700 uppercase bg-yellow-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr class="text-center">
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">ID Pesanan</th>
                        <th scope="col" class="px-6 py-3">ID Ecomerce</th>
                        <th scope="col" class="px-10 py-3">Nama Penerima</th>
                        <th scope="col" class="px-20 py-3">Alamat</th>
                        <th scope="col" class="px-6 py-3">NO Telepon</th>
                        <th scope="col" class="px-6 py-3">SKU</th>
                        <th scope="col" class="px-6 py-3">Nama Produk</th>
                        <th scope="col" class="px-6 py-3">Warna</th>
                        <th scope="col" class="px-6 py-3">Ukuran</th>
                        <th scope="col" class="px-6 py-3">Jumlah</th>
                        <th scope="col" class="px-6 py-3">Media</th>
                        <th scope="col" class="px-6 py-3">Tanggal Pemesanan</th>
                        <th scope="col" class="px-6 py-3">Tanggal Selesai</th>
                        <th scope="col" class="px-6 py-3">Status Pesanan</th>
                        <th scope="col" class="px-6 py-3">Update Pesanan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $groupedOrders = $keluar->groupBy('id_pesanan');
                    @endphp
                    @foreach ($groupedOrders as $orderId => $orders)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-center">
                            <td class="px-6 py-3">{{ ($keluar->currentPage() - 1) * $keluar->perPage() + $loop->iteration }}
                            </td>
                            <td class="px-6 py-3">{{ $orderId }}</td>
                            <td class="px-6 py-3">{{ $orders->first()->id_ecommerce }}</td>
                            <td class="text-center py-3">{{ $orders->first()->nama_penerima }}</td>
                            <td class="text-center py-6">{{ $orders->first()->alamat }}</td>
                            <td class="px-6 py-3">{{ $orders->first()->no_tlp }}</td>
                            <td class="text-center py-3 capitalize">
                                @foreach ($orders as $order)
                                    {{ $order->SKU }}<br>
                                @endforeach
                            </td>
                            <td class="text-center py-3 capitalize">
                                @foreach ($orders as $order)
                                    {{ $order->nama }}<br>
                                @endforeach
                            </td>
                            <td class="text-center py-3 capitalize">
                                @foreach ($orders as $order)
                                    {{ $order->warna }}<br>
                                @endforeach
                            </td>
                            <td class="text-center py-3 capitalize">
                                @foreach ($orders as $order)
                                    {{ $order->size }}<br>
                                @endforeach
                            </td>
                            <td class="text-center py-3 capitalize">
                                @foreach ($orders as $order)
                                    {{ $order->total }}<br>
                                @endforeach
                            </td>
                            <td class="px-6 py-3">{{ $orders->first()->media }}</td>
                            <td class="px-6 py-3">{{ $orders->first()->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-3">
                                @if ($orders->first()->first_success_time)
                                    {{ \Carbon\Carbon::parse($orders->first()->first_success_time)->format('d-m-Y') }}
                                @else
                                    -
                                @endif
                            </td>

                            <td class="px-6 py-3 status" data-status="{{ $orders->first()->status }}">
                                {{ $orders->first()->status }}</td>
                            <td class="px-6 py-3">
                                <form id="status-form-{{ $orders->first()->id }}"
                                    action="{{ route('admin.update-status', $orders->first()->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="flex items-center gap-2">
                                        <button type="submit" name="status" value="Berhasil"
                                            class="bg-blue-500 text-white px-3 py-1 hover:bg-blue-700 rounded-md update-button"
                                            id="Berhasil-{{ $orders->first()->id }}">Berhasil</button>
                                        <button type="submit" name="status" value="Batal"
                                            class="bg-red-500 text-white px-3 py-1 hover:bg-red-700 rounded-md update-button"
                                            id="Batal-{{ $orders->first()->id }}">Batal</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="px-10 flex justify-center items-center">
                <div class="flex mt-6">
                    <a href="{{ $keluar->previousPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 me-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <svg class="w-3.5 h-3.5 me-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5H1m0 0 4 4M1 5l4-4" />
                        </svg>
                        Previous
                    </a>
                    <a href="{{ $keluar->nextPageUrl() }}"
                        class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        Next
                        <svg class="w-3.5 h-3.5 ms-2 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.status').forEach(function(statusElement) {
                const status = statusElement.dataset.status;
                const row = statusElement.closest('tr');
                const updateButtons = row.querySelectorAll('.update-button');

                if (status === 'Proses') {
                    updateButtons.forEach(function(button) {
                        button.disabled = false;
                        button.classList.remove('opacity-50', 'cursor-not-allowed');
                    });
                } else {
                    updateButtons.forEach(function(button) {
                        button.disabled = true;
                        button.classList.add('opacity-50', 'cursor-not-allowed');
                    });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi array kosong untuk data chart
            const provinsiKotaData = [];

            // Gunakan Blade untuk mengisi data ke dalam array
            @foreach ($provinsiKota as $item)
                provinsiKotaData.push({
                    name: "{{ $item->provinsi_kota }}",
                    y: {{ $item->total_pesanan }}
                });
            @endforeach

            // Inisialisasi Highcharts
            Highcharts.chart('chart-container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Top 5 Provinsi/Kota dengan Jumlah Pesanan Terbanyak'
                },
                xAxis: {
                    type: 'category',
                    title: {
                        text: 'Provinsi/Kota'
                    }
                },
                yAxis: {
                    title: {
                        text: 'Jumlah Pesanan'
                    }
                },
                series: [{
                    name: "Pesanan",
                    color: "#1A56DB",
                    data: provinsiKotaData
                }]
            });
        });
    </script>
@endsection
