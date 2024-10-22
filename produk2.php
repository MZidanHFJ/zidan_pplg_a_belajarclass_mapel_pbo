<?php
class Produk {
    public $namaProduk;
    public $jenisProduk;
    public $jumlahProduk;
    public $stok;
    public $pembelian;

    // Constructor untuk inisialisasi pengertian/atribut
    public function __construct($namaProduk = '', $jenisProduk = '', $jumlahProduk = 0, $stok = 0, $pembelian = 0) {
        $this->namaProduk = $namaProduk;
        $this->jenisProduk = $jenisProduk;
        $this->jumlahProduk = $jumlahProduk;
        $this->stok = $stok;
        $this->pembelian = $pembelian;
    }

    public function stokAkhirProduk () {
        // menghitung hasil akhir stok
        $this->stok = ($this->stok - $this->pembelian);
        return $this->stok;
    }
}

// inisialisasi variabel untuk perhitungan stok
$Stokakhir = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membentuk instabce /objek baru dari class produk
    $panggilProduk = new Produk();
    $panggilProduk->stok = intval($_POST['stok']);
    $panggilProduk->pembelian = intval($_POST['pembelian']);

    // Perhitungan akhir sebuah produk
    $Stokakhir = $panggilProduk->stokAkhirProduk();
}
?>