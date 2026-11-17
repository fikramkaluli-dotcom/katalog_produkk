
<?php

use Illuminate\Support\Facades\Route;

Route::get('/produk', function () {

    $produks = [
        [
            'nama' => 'Laptop Asus',
            'harga' => 7500000,
            'stok' => 5
        ],
        [
            'nama' => 'Mouse Logitech',
            'harga' => 150000,
            'stok' => 0
        ],
        [
            'nama' => 'Keyboard Mechanical',
            'harga' => 450000,
            'stok' => 10
        ],
        [
            'nama' => 'Monitor Samsung',
            'harga' => 2200000,
            'stok' => 3
        ],
    ];

    return view('produk', compact('produks'));

});
