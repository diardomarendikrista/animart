<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Helper untuk meng init / mendapatkan data produk dari Laravel Session
    private function getProductsFromSession()
    {
        if (!session()->has('products')) {
            $products = [];
            $animeNames = [
                'Monkey D. Luffy Gear 5',
                'Gojo Satoru Unlimited Void',
                'Nezuko Kamado Demon Form',
                'Roronoa Zoro Wano Land',
                'Uzumaki Naruto Sage Mode',
                'Uchiha Sasuke Susanoo',
                'Izuku Midoriya One For All',
                'Bakugo Katsuki Explosion',
                'Kamado Tanjirou Hinokami',
                'Agatsuma Zenitsu Thunder Clap',
                'Hashibira Inosuke Beast',
                'Rimuru Tempest Demon Lord',
                'Saitama One Punch Man',
                'Son Goku Ultra Instinct',
                'Vegeta Super Saiyan Blue',
                'Mikasa Ackerman Survey Corps',
                'Eren Yeager Attack Titan',
                'Levi Ackerman Captain',
                'Fushiguro Megumi Divine Dog',
                'Kugisaki Nobara Resonance'
            ];
            $brands = ['Good Smile Company', 'Kotobukiya', 'Aniplex', 'Bandai Spirits', 'Max Factory'];
            $images = ['product_luffy.png', 'product_gojo.png', 'product_nezuko.png'];

            // brand , image, rating dan harga di random
            for ($i = 1; $i <= 20; $i++) {
                $products[] = [
                    'id' => $i,
                    'name' => $animeNames[$i - 1],
                    'description' => "Detail berkualitas tinggi skala 1/7 original berlisensi dari produsen Jepang resmi.",
                    'price' => rand(1800, 3800) * 1000,
                    'brand' => $brands[array_rand($brands)],
                    'image' => 'images/' . $images[($i - 1) % count($images)],
                    'rating' => number_format(4.5 + (rand(0, 5) / 10), 1),
                    'badge' => $i % 3 === 0 ? 'HOT ITEM' : ($i % 3 === 1 ? 'NEW ARRIVAL' : 'BEST SELLER')
                ];
            }
            session(['products' => $products]);
        }

        return session('products');
    }

    // list produk
    public function index()
    {
        $products = $this->getProductsFromSession();
        return view('products.list', compact('products'));
    }

    // form route
    public function create()
    {
        return view('products.form', ['isEdit' => false]);
    }

    // menyimpan data baru ke Session (Simulasi Create)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $products = $this->getProductsFromSession();
        $newId = count($products) > 0 ? max(array_column($products, 'id')) + 1 : 1;

        $images = ['product_luffy.png', 'product_gojo.png', 'product_nezuko.png'];

        $products[] = [
            'id' => $newId,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'brand' => 'Custom Creation',
            'image' => 'images/' . $images[array_rand($images)],
            'rating' => '5.0',
            'badge' => 'NEW ARRIVAL'
        ];

        session(['products' => $products]);

        return redirect()->route('products')->with('success', 'Produk baru "' . $request->name . '" berhasil ditambahkan ke memori sementara!');
    }

    // menampilkan detail produk dari Session (Read)
    public function show($id)
    {
        $products = $this->getProductsFromSession();
        $product = collect($products)->firstWhere('id', (int) $id);

        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('products.show', compact('product'));
    }

    // untuk form edit mengambil dari Session
    public function edit($id)
    {
        $products = $this->getProductsFromSession();
        $product = collect($products)->firstWhere('id', (int) $id);

        if (!$product) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('products.form', ['product' => $product, 'isEdit' => true]);
    }

    // update data di Session (Simulasi Update)
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
        ]);

        $products = $this->getProductsFromSession();

        foreach ($products as $key => $item) {
            if ($item['id'] == $id) {
                $products[$key]['name'] = $request->name;
                $products[$key]['description'] = $request->description;
                $products[$key]['price'] = $request->price;
                break;
            }
        }

        session(['products' => $products]);

        return redirect()->route('products')->with('success', 'Produk ID #' . $id . ' berhasil diperbarui di memori sementara!');
    }

    // hapus data dari Session (Simulasi Delete)
    public function destroy($id)
    {
        $products = $this->getProductsFromSession();

        $filtered = array_filter($products, function ($item) use ($id) {
            return $item['id'] != $id;
        });

        session(['products' => array_values($filtered)]);

        return redirect()->route('products')->with('success', 'Produk ID #' . $id . ' berhasil dihapus dari memori sementara!');
    }

    // reset data memori sesi kembali ke kondisi awal 20 produk
    public function reset()
    {
        session()->forget('products');
        return redirect()->route('products')->with('success', 'Sesi berhasil di-reset! Semua data produk telah dikembalikan ke kondisi awal (20 produk default).');
    }
}
