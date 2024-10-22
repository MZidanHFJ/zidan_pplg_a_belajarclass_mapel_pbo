<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Class</title>
</head>
<body>
    <h1>Kucing</h1>
    <a href="index.php"><button>Produk</button></a>
    <a href="stok_produk.php"><button>Stok Produk</button></a>
    <a href="viewProduk.php"><button>View Produk</button></a>
    <br>
    <br>
</body>
</html>

<?php
class Kucing {
    public $warna = "Hitam";
    public $ekor = "Panjang";
    public $umur = "3 tahun";
    public $jenis_kelamin = "Jantan";
    public $jenis_kucing = "Persia";
    public function suara (){
        return "Meong...";
    }
    public function goyang_ekor (){
        return "Goyang Ekor";
    }
    public function loncat (){
        return "Loncat";
    }
}
$kucing = new Kucing ();
echo "Warna : ".$kucing -> warna."<br>";
echo "Ekor : ".$kucing -> ekor."<br>";
echo "Umur : ".$kucing -> umur."<br>";
echo "Jenis Kelamin : ".$kucing -> jenis_kelamin."<br>";
echo "Jenis Kucing : ".$kucing -> jenis_kucing."<br>";

echo $kucing -> suara ()."<br>";
echo $kucing -> goyang_ekor ()."<br>";
echo $kucing -> loncat ();
?>
