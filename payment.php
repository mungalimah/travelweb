<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil dan Perhitungan</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: auto;
        }
        h3 {
            text-align: center;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $harga_produk = $_POST["harga_produk"];
    $bunga_pinjaman = $_POST["bunga_pinjaman"] / 100; // Konversi persen ke desimal
    $uang_muka_persen = max(0.25, min($_POST["uang_muka"] / 100, 0.99)); // Uang muka minimal 25%, maksimal 99%
    $uang_muka_rupiah = $harga_produk * $uang_muka_persen; // Hitung uang muka dalam Rupiah
    $tenor_bulan = $_POST["tenor"]; 
    
    $pinjaman = $harga_produk * (1 - $uang_muka_persen);
    $angsuran_per_bulan = $pinjaman / $tenor_bulan;
    
    // Array untuk menyimpan detail simulasi
    $simulasi = array();
    
    echo "<h3>Detail Input:</h3>";
    echo "<table>";
    echo "<tr><th>Keterangan</th><th>Nilai</th></tr>";
    echo "<tr><td>Harga Paket Wisata (Rp)</td><td> " . number_format($harga_produk, 0, ",", ".") . " </td></tr>";
    echo "<tr><td>Bunga Pinjaman (%)</td><td>" . $_POST["bunga_pinjaman"] . " % </td></tr>";
    echo "<tr><td>Uang Muka (%)</td><td>" . ($uang_muka_persen * 100) . " % </td></tr>";
    echo "<tr><td>Uang Muka (Rp)</td><td>" . number_format($uang_muka_rupiah, 0, ",", ".") . "</td></tr>";
    echo "<tr><td>Jangka Waktu (Bulan)</td><td>" . $tenor_bulan . " Bulan</td></tr>";
    echo "</table>";
    
    echo "<h3>Detail Simulasi:</h3>";
    echo "<table>";
    echo "<tr><th>Bulan</th><th>Angsuran Pokok (Rp)</th><th>Bunga (Rp)</th><th>Total Angsuran (Rp)</th><th>Sisa Pinjaman (Rp)</th></tr>";
    
    $sisa_pinjaman = $pinjaman;
    for ($bulan = 1; $bulan <= $tenor_bulan; $bulan++) {
        $bunga = $sisa_pinjaman * $bunga_pinjaman / 12;
        $angsuran_total = $angsuran_per_bulan + $bunga;
        $sisa_pinjaman -= $angsuran_per_bulan;
        
        // Menambahkan detail simulasi ke dalam array
        $simulasi[$bulan] = array(
            "bulan" => $bulan,
            "angsuran_pokok" => $angsuran_per_bulan,
            "bunga" => $bunga,
            "total_angsuran" => $angsuran_total,
            "sisa_pinjaman" => $sisa_pinjaman
        );
    }
    
    // Menampilkan detail simulasi dari array
    foreach ($simulasi as $detail) {
        echo "<tr>";
        echo "<td>" . $detail['bulan'] . "</td>";
        echo "<td>" . number_format($detail['angsuran_pokok'], 0, ",", ".") . "</td>";
        echo "<td>" . number_format($detail['bunga'], 0, ",", ".") . "</td>";
        echo "<td>" . number_format($detail['total_angsuran'], 0, ",", ".") . "</td>";
        echo "<td>" . number_format($detail['sisa_pinjaman'], 0, ",", ".") . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
}
?>

</body>
</html>
