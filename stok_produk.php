<!DOCTYPE html> <!-- Di Bantu AI --> <!-- Otak Saya Sudah Menyerah -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Class</title>
    <h1>Stok Produk</h1>
    <style>
        table {
            width: auto;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <a href="index.php"><button>Produk</button></a>
    <a href="kucing.php"><button>Kucing</button></a>
    <a href="viewProduk.php"><button>View Produk</button></a>
    <br><br>
    <form method="POST" action="">
        <input type="text" name="saldoAwal" placeholder="Masukkan Saldo Awal (Rupiah)" required pattern="^\d+(\.\d{1,2})?$" title="Masukkan angka yang valid, gunakan titik untuk desimal">
        <input type="number" name="stokInput" placeholder="Masukkan Stok" required min="0">
        <button type="submit">Submit</button>
    </form>

    <?php
    session_start();

    class Produk {
        public $jenis;
        public $merek;
        public $stok = 0;
        public $saldo = 0;

        public function tambahStok($jumlah) {
            if ($jumlah > 0) {
                $this->stok += $jumlah;
            }
        }

        public function tambahSaldo($jumlah) {
            if ($jumlah > 0) {
                $this->saldo += $jumlah;
            }
        }

        public function pesanProduk() {
            if ($this->stok > 0) {
                $this->stok -= 1;
            } else {
                echo "Stok tidak cukup!";
            }
        }
    }

    if (!isset($_SESSION['produk'])) {
        $_SESSION['produk'] = [];
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $barang = new Produk(); 

        if (isset($_POST['editIndex'])) {
            $index = intval($_POST['editIndex']);
            if (isset($_SESSION['produk'][$index])) {
                $produk = $_SESSION['produk'][$index];
                if (isset($_POST['saldoAwal'])) {
                    $saldoAwal = floatval(str_replace('.', '', $_POST['saldoAwal']));
                    $produk->saldo = $saldoAwal;
                }
                if (isset($_POST['stokInput'])) {
                    $inputStok = intval($_POST['stokInput']);
                    $produk->stok = $inputStok;
                }
                $_SESSION['produk'][$index] = $produk;
            }
        } else {
            if (isset($_POST['saldoAwal'])) {
                $saldoAwal = floatval(str_replace('.', '', $_POST['saldoAwal']));
                $barang->tambahSaldo($saldoAwal);
            }
            if (isset($_POST['stokInput'])) {
                $inputStok = intval($_POST['stokInput']);
                $barang->tambahStok($inputStok);
            }
            $_SESSION['produk'][] = $barang;
        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    echo "<h2>Stok Produk</h2>";
    echo "<table>";
    echo "<tr><th>Saldo Awal (Rupiah)</th><th>Stok</th><th>Aksi</th></tr>";

    if (count($_SESSION['produk']) > 0) {
        foreach ($_SESSION['produk'] as $index => $produk) {
            echo "<tr>";
            echo "<td>Rp " . number_format($produk->saldo, 0, ',', '.') . "</td>";
            echo "<td>" . $produk->stok . "</td>";
            echo "<td><a href='?edit=$index'>Edit</a> | <a href='?delete=$index'>Hapus</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='3'>Tidak ada produk tersedia.</td></tr>";
    }
    echo "</table>";

    if (isset($_GET['edit'])) {
        $index = intval($_GET['edit']);
        if (isset($_SESSION['produk'][$index])) {
            $produk = $_SESSION['produk'][$index];
            echo "<h3>Edit Produk:</h3>";
            echo "<form method='POST' action=''>";
            echo "<input type='number' name='saldoAwal' value='" . $produk->saldo . "' required min='0'>";
            echo "<input type='number' name='stokInput' value='" . $produk->stok . "' required min='0'>";
            echo "<input type='hidden' name='editIndex' value='$index'>";
            echo "<button type='submit'>Update</button>";
            echo "</form>";
        }
    }

    if (isset($_GET['delete'])) {
        $index = intval($_GET['delete']);
        if (isset($_SESSION['produk'][$index])) {
            unset($_SESSION['produk'][$index]);
            $_SESSION['produk'] = array_values($_SESSION['produk']);
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    if (isset($_POST['editIndex'])) {
        $index = intval($_POST['editIndex']);
        if (isset($_SESSION['produk'][$index])) {
            $produk = $_SESSION['produk'][$index];
            if (isset($_POST['saldoAwal'])) {
                $saldoAwal = floatval(str_replace('.', '', $_POST['saldoAwal']));
                $produk->saldo = $saldoAwal;
            }
            if (isset($_POST['stokInput'])) {
                $inputStok = intval($_POST['stokInput']);
                $produk->stok = $inputStok;
            }
            $_SESSION['produk'][$index] = $produk;
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
?>
</body>
</html>
