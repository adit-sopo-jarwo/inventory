<?php

namespace App\Http\Controllers;

use App\Models\Stok;
use App\Models\Keluar;
use App\Models\Masuk;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $query = Stok::query();

        if ($request->has('search') && !empty($request->search)) {
            $keyword = $request->search;
            $query->where('nama', 'LIKE', "%$keyword%");
        }

        $data = $query->get();

        // Daftar nama tabel
        $tables = [
            'adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico', 'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis', 'new_carlos', 'new_paloma', 'paloma', 'camper', 'gream_reaper', 'greatmoth', 'haloween', 'mountcation', 'original', 'perfect', 'relax', 'samurai', 'vitamin', 'byu', 'chico', 'gte', 'jago', 'macario', 'pirro', 'bermudas'
        ];

        $stocksWithImages = $data->map(function ($item) use ($tables) {
            $image = null;
            // Cari gambar di setiap tabel dalam daftar
            foreach ($tables as $table) {
                $modelName = 'App\Models\\' . ucfirst($table);
                $entry = $modelName::where('stok_id', $item->id)->first();
                if ($entry && $entry->image) {
                    $image = $entry->image;
                    break; // Hentikan pencarian setelah menemukan gambar pertama
                }
            }
            $item->image = $image;
            return $item;
        });

        return view('Barang.Stock', [
            'data' => $stocksWithImages,
            'request' => $request,
        ]);
    }
    public function keluar()
    {
        return view('Barang.Keluar');
    }

    public function Out(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'id_ecommerce' => 'required',
            'receiver_name' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'mediaSelect' => 'required',
            'first_success_time' => 'nullable',
            'products' => 'required|array',
            'products.*.product' => 'required',
            'products.*.stok_id' => 'required',
            'products.*.color' => 'required',
            'products.*.size' => 'required',
            'products.*.quantity' => 'required|min:1',
            'products.*.sku' => 'required',
        ]);

        // Periksa apakah validasi gagal
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Simpan data ke dalam tabel keluar dan kurangi stok
        foreach ($request->products as $product) {
            $stok = Stok::find($product['stok_id']);
            if (!$stok || $stok->total < $product['quantity']) {
                return redirect()->back()->withInput()->with('error', 'Stok barang tidak mencukupi.');
            }

            // Simpan data ke dalam tabel keluar
            $keluar = new Keluar();
            $keluar->stok_id = $product['stok_id'];
            $keluar->id_pesanan = $request->order_id;
            $keluar->id_ecommerce = $request->id_ecommerce;
            $keluar->nama_penerima = $request->receiver_name;
            $keluar->alamat = $request->alamat;
            $keluar->no_tlp = $request->telepon;
            $keluar->media = $request->mediaSelect;
            $keluar->nama = $product['product'];
            $keluar->warna = $product['color'];
            $keluar->size = $product['size'];
            $keluar->sku = $product['sku'];
            $keluar->total = $product['quantity'];
            $keluar->save();

            // Mengurangi jumlah total stok
            if ($stok) {
                $stok->total -= $product['quantity'];
                $stok->save();
            }

            // Mengurangi jumlah total stok di setiap tabel yang terkait
            $this->updateStock($product['stok_id'], $product['color'], $product['size'], $product['quantity']);
        }

        return redirect()->route('admin.pesanan');
    }

    private function updateStock($stok_id, $colorSelect, $sizeSelect, $quantity)
    {
        // Daftar nama tabel
        $tables = [
            'adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico', 'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis', 'new_carlos', 'new_paloma', 'paloma', 'camper', 'gream_reaper', 'greatmoth', 'haloween', 'mountcation', 'original', 'perfect', 'relax', 'samurai', 'vitamin', 'byu', 'chico', 'gte', 'jago', 'macario', 'pirro', 'bermudas'
        ];

        foreach ($tables as $tableName) {
            // Tentukan nama model
            $modelName = 'App\Models\\' . $tableName;

            // Temukan entri di tabel produk berdasarkan stok_id dan warna
            $productEntry = $modelName::where('stok_id', $stok_id)
                ->where('warna', $colorSelect)
                ->first();

            if ($productEntry) {
                // Kurangi nilai kolom ukuran yang sesuai
                if ($sizeSelect === 'S') {
                    $productEntry->S -= $quantity;
                } elseif ($sizeSelect === 'M') {
                    $productEntry->M -= $quantity;
                } elseif ($sizeSelect === 'L') {
                    $productEntry->L -= $quantity;
                } elseif ($sizeSelect === 'XL') {
                    $productEntry->XL -= $quantity;
                } elseif ($sizeSelect === 'XXL') {
                    $productEntry->XXL -= $quantity;
                } elseif ($sizeSelect === 'XXXL') {
                    $productEntry->XXXL -= $quantity;
                } elseif ($sizeSelect === 'VIXL') {
                    $productEntry->VIXL -= $quantity;
                }

                // Kurangi nilai total juga
                $productEntry->Total -= $quantity;
                $productEntry->save();
            }
        }
    }

    public function update_status(Request $request, $id)
    {
        // Validate the request
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:Berhasil,Batal',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Find the order by ID
        $order = Keluar::findOrFail($id);

        // Jika status pesanan diubah menjadi "Batal"
        if ($request->status === 'Batal') {
            // Panggil fungsi untuk mengembalikan stok
            $this->returnStock($order);
        }

        // Jika status diubah menjadi "Berhasil", atur first_success_time menjadi waktu sekarang
        if ($request->status === 'Berhasil') {
            $order->first_success_time = now();
        }

        // Update the status
        $order->status = $request->status;
        $order->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

    private function returnStock($order)
    {
        // Ambil informasi pesanan
        $stok_id = $order->stok_id;
        $colorSelect = $order->warna;
        $sizeSelect = $order->size;
        $quantity = $order->total;

        // Ambil entri stok berdasarkan stok_id
        $stockEntry = Stok::where('id', $stok_id)->first();

        if ($stockEntry) {
            // Tambahkan kembali jumlah yang dibatalkan ke total stok
            $stockEntry->total += $quantity;
            $stockEntry->save();
        }

        // Daftar nama tabel
        $tables = ['adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico', 'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis', 'new_carlos', 'new_paloma', 'paloma', 'camper', 'gream_reaper', 'greatmoth', 'haloween', 'mountcation', 'original', 'perfect', 'relax', 'samurai', 'vitamin', 'byu', 'chico', 'gte', 'jago', 'macario', 'pirro'];

        foreach ($tables as $tableName) {
            // Tentukan nama model
            $modelName = 'App\Models\\' . $tableName;

            // Temukan entri di tabel produk berdasarkan stok_id dan warna
            $productEntry = $modelName::where('stok_id', $stok_id)
                ->where('warna', $colorSelect)
                ->first();

            if ($productEntry) {
                // Tambahkan kembali jumlah yang dibatalkan ke stok
                switch ($sizeSelect) {
                    case 'S':
                        $productEntry->S += $quantity;
                        break;
                    case 'M':
                        $productEntry->M += $quantity;
                        break;
                    case 'L':
                        $productEntry->L += $quantity;
                        break;
                    case 'XL':
                        $productEntry->XL += $quantity;
                        break;
                    case 'XXL':
                        $productEntry->XXL += $quantity;
                        break;
                    case 'XXXL':
                        $productEntry->XXXL += $quantity;
                        break;
                    case 'VIXL':
                        $productEntry->VIXL += $quantity;
                        break;
                    default:
                        // Do nothing for unsupported sizes
                        break;
                }

                // Tambahkan kembali jumlah yang dibatalkan ke total stok
                $productEntry->Total += $quantity;
                $productEntry->save();
            }
        }
    }

    public function pesanan(Request $request)
    {
        $data = new Keluar;
        // Query to get the orders, ordered by creation date
        $keluarQuery = Keluar::orderBy('created_at', 'DESC');

        // Filter based on search keyword
        if ($request->has('search') && $request->get('search') !== null) {
            $keyword = $request->get('search');
            $keluarQuery->where(function ($query) use ($keyword) {
                $query->where('id_pesanan', 'LIKE', "%$keyword%")
                    ->orWhere('nama_penerima', 'LIKE', "%$keyword%")
                    ->orWhere('nama', 'LIKE', "%$keyword%");
            });
        }

        $data = $data->get();

        // Get the orders with pagination
        $keluar = $keluarQuery->paginate(10);

        // Get all orders with a non-null address
        $pesanan = Keluar::whereNotNull('alamat')->get();

        // Initialize an array to store the total orders per province
        $provinsiPesanan = $pesanan->reduce(function ($carry, $item) {
            $alamatArray = explode(', ', $item->alamat);
            $provinsi = end($alamatArray); // Get the province
            if (isset($carry[$provinsi])) {
                $carry[$provinsi]++;
            } else {
                $carry[$provinsi] = 1;
            }
            return $carry;
        }, []);

        // Sort the array based on the total orders
        arsort($provinsiPesanan);

        // Get the top 5 provinces
        $topProvinsi = array_slice($provinsiPesanan, 0, 5, true);

        // Prepare data for the top provinces or cities with total orders
        $provinsiKota = collect($topProvinsi)->map(function ($totalPesanan, $provinsi) {
            return (object) ['provinsi_kota' => $provinsi, 'total_pesanan' => $totalPesanan];
        });

        // Query to get status summary
        $statusSummary = Keluar::selectRaw('status, COUNT(id) as count')
            ->groupBy('status')
            ->get();

        $totalOrders = $statusSummary->sum('count');
        $completed = $statusSummary->where('status', 'Selesai')->sum('count');
        $processing = $statusSummary->where('status', 'Proses')->sum('count');
        $cancelled = $statusSummary->where('status', 'Batal')->sum('count');

        // Return view with all data
        return view('Barang.Pesanan-Keluar', compact('data', 'keluar', 'request', 'provinsiKota', 'totalOrders', 'completed', 'processing', 'cancelled'));
    }

    public function showAll()
    {
        // Get all orders with a non-null address
        $pesanan = Keluar::whereNotNull('alamat')->get();

        // Initialize an array to store the total orders per province
        $provinsiPesanan = $pesanan->reduce(function ($carry, $item) {
            $alamatArray = explode(', ', $item->alamat);
            $provinsi = end($alamatArray); // Get the province
            if (isset($carry[$provinsi])) {
                $carry[$provinsi]++;
            } else {
                $carry[$provinsi] = 1;
            }
            return $carry;
        }, []);

        // Sort the array based on the total orders
        arsort($provinsiPesanan);

        return view('Barang.showall', [
            'provinsiPesanan' => $provinsiPesanan,
        ]);
    }

    public function masuk()
    {
        $stoks = Stok::all();
        return view('Barang.Masuk', compact('stoks'));
    }

    public function stok_baru(Request $request)
    {
        $data = new Masuk;
        $stoks = Stok::all();

        if ($request->has('search') && $request->get('search') !== null) {
            $keyword = $request->get('search');
            $data = $data->where('batch', 'LIKE', "%$keyword%");
        }

        $data = $data->get();

        return view('Barang.Barang-Masuk', compact('data', 'stoks', 'request'));
    }

    public function barang_masuk(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'operator' => 'required',
            'batch' => 'required',
            'products' => 'required|array',
            'products.*.product' => 'required',
            'products.*.stok_id' => 'required',
            'products.*.color' => 'required',
            'products.*.size' => 'required',
            'products.*.image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'products.*.quantity' => 'required|min:1',
            'products.*.sku' => 'required',
            'dateIn' => 'required',
            'datePayment' => 'required',
        ]);

        if ($validator->fails()) {
            dd($validator->errors());
            // Return errors with  back to the form
            return redirect()->back()->withInput()->withErrors($validator);
        }

        foreach ($request->products as $product) {
            // Handle the image upload
            if (isset($product['image'])) {
                $photo = $product['image'];
                $filename = $photo->getClientOriginalName();
                $path = 'produk/' . $filename;

                Storage::disk('public')->put($path, file_get_contents($photo));
            } else {
                $filename = null; // If no image is uploaded
            }

            // Save each product into the 'masuk' table
            $masuk = new Masuk();
            $masuk->stok_id = $product['stok_id'];
            $masuk->operator = $request->operator;
            $masuk->batch = $request->batch;
            $masuk->sku = $product['sku'];
            $masuk->produk = $product['product'];
            $masuk->warna = $product['color'];
            $masuk->ukuran = $product['size'];
            $masuk->image = $filename;
            $masuk->total = $product['quantity'];
            $masuk->tanggal_masuk = $request->dateIn;
            $masuk->pembayaran = $request->datePayment;
            $masuk->save();

            // Update the stock
            $stok = Stok::find($product['stok_id']);
            if ($stok) {
                $stok->total += $product['quantity'];
                $stok->save();
            } else {
                // Create new stock entry if not found
                $newStok = new Stok();
                $newStok->id = $product['stok_id'];
                $newStok->nama = $product['product'];
                $newStok->warna = $product['color'];
                $newStok->size = $product['size'];
                $newStok->total = $product['quantity'];
                $newStok->save();
            }

            // Call addStock method
            $this->addStock($product['stok_id'], $product['color'], $product['size'], $product['quantity'], $product['sku']);
        }

        // Redirect with success message
        return redirect()->route('admin.stok-baru')->with('success', 'Stok Berhasil Ditambah!');
    }

    private function addStock($stok_id, $color, $size, $quantity, $sku)
    {
        // Daftar nama tabel
        $tables = ['adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico', 'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis', 'new_carlos', 'new_paloma', 'paloma', 'camper', 'gream_reaper', 'greatmoth', 'haloween', 'mountcation', 'original', 'perfect', 'relax', 'samurai', 'vitamin', 'byu', 'chico', 'gte', 'jago', 'macario', 'pirro', 'bermudas'];

        // Tentukan indeks tabel berdasarkan stok_id
        $tableIndex = $stok_id - 1;
        if ($tableIndex < 0 || $tableIndex >= count($tables)) {
            // stok_id tidak valid, tangani kesalahan sesuai kebutuhan
            throw new \Exception('stok_id tidak valid');
        }

        // Tentukan nama tabel berdasarkan indeks
        $tableName = $tables[$tableIndex];
        $modelName = 'App\Models\\' . ucfirst($tableName);

        // Temukan entri produk berdasarkan stok_id dan warna
        $productEntry = $modelName::where('stok_id', $stok_id)->where('warna', $color)->first();

        if ($productEntry) {
            // Jika produk dengan stok_id dan warna yang sama sudah ada dalam tabel produk
            if ($productEntry->{$size} !== null) {
                // Jika ukuran sudah ada, tambahkan stok baru ke ukuran yang ada
                $productEntry->{$size} += $quantity;
            } else {
                // Jika ukuran belum ada, tambahkan ukuran baru dengan stok yang diberikan
                $productEntry->{$size} = $quantity;
            }
            // Update total stok
            $productEntry->Total += $quantity;

            // Set nilai SKU
            $productEntry->sku = $sku;

            // Set nilai image
            $imageFilename = session()->get('image_filename');
            $productEntry->image = $imageFilename;

            // Simpan perubahan pada tabel produk
            $productEntry->save();
        } else {
            // Jika produk belum ada dalam tabel produk, buat entri baru
            $newProductEntry = new $modelName();
            // Set atribut-atribut produk
            $newProductEntry->stok_id = $stok_id;
            $newProductEntry->warna = $color;
            // Set stok untuk ukuran yang dipilih
            $newProductEntry->{$size} = $quantity;
            // Set total stok
            $newProductEntry->Total = $quantity;
            // Set nilai SKU
            $newProductEntry->sku = $sku;
            // Set nilai image
            $imageFilename = session()->get('image_filename');
            $newProductEntry->image = $imageFilename;
            // Simpan entri baru pada tabel produk
            $newProductEntry->save();
        }
    }

    public function create()
    {
        return view('Barang.Barang-Baru');
    }

    public function store(Request $request)
    {
        // Debugging untuk melihat semua data request
        // dd($request->all());

        // Validasi request
        $validator = Validator::make($request->all(), [
            'name_product' => 'required|string|max:255',
            'colors' => 'required|array',
            'sizes' => 'required|array',
            'quantity' => 'required',
        ]);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Menyimpan data yang valid ke dalam database
        $data = [
            'nama' => $request->name_product,
            'warna' => implode(', ', $request->colors), // Menggabungkan array colors menjadi string
            'size' => implode(', ', $request->sizes),   // Menggabungkan array sizes menjadi string
            'total' => $request->quantity,
        ];

        Stok::create($data);

        // Redirect ke halaman home admin setelah data tersimpan
        return redirect()->route('admin.home');
    }

    public function detail(Request $request, $stok_id)
    {
        $tables = [
            'adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico',
            'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis',
            'new_carlos', 'new_paloma', 'paloma', 'camper', 'gream_reaper',
            'greatmoth', 'haloween', 'mountcation', 'original', 'perfect', 'relax',
            'samurai', 'vitamin', 'byu', 'chico', 'gte', 'jago', 'macario', 'pirro', 'bermudas'
        ];

        $tableIndex = $stok_id - 1;

        if ($tableIndex < 0 || $tableIndex >= count($tables)) {
            throw new \Exception('Invalid stok_id');
        }

        $tableName = $tables[$tableIndex];
        $modelName = 'App\Models\\' . ucfirst($tableName);

        $productEntries = $modelName::where('stok_id', $stok_id)->get();

        return view('Barang.Detail', compact('tableName', 'productEntries'));
    }

    public function edit(Request $request, $id)
    {
        // Mengambil data dari database
        $data = Stok::findOrFail($id);

        // Pisahkan nilai warna dan size dari string menjadi array dengan menghapus spasi
        $data->warna = array_map('trim', explode(',', $data->warna));
        $data->size = array_map('trim', explode(',', $data->size));

        // Mengirim data ke view
        return view('Barang.Edit', compact('data'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name_product' => 'required',
            'colors' => 'required|array',
            'sizes' => 'required|array',
            'quantity' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = Stok::findOrFail($id);

        // Mengambil nilai warna dan ukuran dari request
        $colors = implode(', ', $request->colors);
        $sizes = implode(', ', $request->sizes);

        // Update data pada model Stok
        $data->update([
            'nama' => $request->name_product,
            'warna' => $colors,
            'size' => $sizes,
            'total' => $request->quantity,
        ]);

        return redirect()->route('admin.home');
    }

    public function delete(Request $request, $id)
    {
        $data = Stok::findOrFail($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('admin.home');
    }
    
    public function master()
    {
        // Definisikan tabel berdasarkan kategori
        $categories = [
            'Celana' => [
                'adalfo', 'alverio', 'antonio', 'carlos', 'casimiro', 'classico',
                'dyaz', 'erasmo', 'gavi', 'gordo', 'hilario', 'limitado', 'luis',
                'new_carlos', 'new_paloma', 'paloma', 'bermudas'
            ],
            'Baju' => [
                'camper', 'gream_reaper', 'greatmoth', 'haloween', 'mountcation',
                'original', 'perfect', 'relax', 'samurai', 'vitamin'
            ],
            'Tas' => [
                'byu', 'chico', 'gte', 'jago', 'macario', 'pirro'
            ],
        ];

        // Variabel untuk menyimpan data dan total per kategori
        $tableData = [];
        $totals = [
            'Celana' => 0,
            'Baju' => 0,
            'Tas' => 0,
        ];

        // Fungsi untuk memproses tabel-tabel
        foreach ($categories as $category => $tables) {
            foreach ($tables as $tableName) {
                $modelName = 'App\Models\\' . ucfirst($tableName);

                // Memeriksa apakah model tersedia
                if (!class_exists($modelName)) {
                    continue; // Skip jika model tidak ditemukan
                }

                // Membuat instance model
                $modelInstance = new $modelName;
                $tableNameActual = $modelInstance->getTable();

                // Menyimpan data tabel
                $tableData[$category][$tableName] = $modelName::all();

                // Jika tabel memiliki kolom 'Total', kita jumlahkan nilainya
                if (Schema::hasColumn($tableNameActual, 'Total')) {
                    $totalSum = $modelName::sum('Total');
                    $totals[$category] += $totalSum;
                }
            }
        }

        // Mengirim data ke view
        return view('Barang.master', compact('tableData', 'totals'));
    }


    public function order()
    {
        return view('Barang.pesanan');
    }
}
