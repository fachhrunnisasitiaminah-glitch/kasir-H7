<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KatalogController extends Controller
{
    public function index()
    {
        // Data produk sesuai permintaan
        $produk = [
            ['id' => 1, 'nama' => 'Kopi Ende', 'kategori' => 'Minuman', 'harga' => 15000, 'stok' => 12],
            ['id' => 2, 'nama' => 'Roti Cokelat', 'kategori' => 'Makanan', 'harga' => 8000, 'stok' => 0],
        ];

        // Mengirim data ke view 'katalog' (resources/views/katalog.blade.php)
        return view('katalog.index', compact('produk'));
    }
}