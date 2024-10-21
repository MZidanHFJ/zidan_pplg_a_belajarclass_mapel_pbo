<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Class</title>
</head>
<body>
    <h1>Produk</h1>
    <a href="kucing.php"><button>Kucing</button></a>
    <a href="stok_produk.php"><button>Stok Produk</button></a>
    <br>
    <br>
</body>
</html>

<?php
class Produk {
    public $nama = "Sabun";
    public $merek = "Lifebuoy";
    public $harga = 3000;
    public $stok = 150;
    public $diskon = "10%";
    public function pemesanan () {
        return "Pesanan sudah diterima...";
    }
}
$tv = new Produk ();
echo "Nama : ".$tv -> nama."<br>";
echo "Merek : ".$tv -> merek."<br>";
echo "Harga : ".$tv -> harga."<br>";
echo "Stok : ".$tv -> stok."<br>";
echo "Diskon : ".$tv -> diskon."<br>";
echo $tv -> pemesanan ();
?>
