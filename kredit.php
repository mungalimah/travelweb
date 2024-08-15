<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Penghitungan Kredit</title>
    <style>
        .form-container {
    max-width: 600px;
    margin: 50px auto; /* Jarak atas dan bawah 50px, dan tengah secara horizontal */
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 8px;
    background-color: #f9f9f9;
    }

    .form-container h2 {
    text-align: center;
    margin-top: 0; /* Hilangkan margin atas */
    margin-bottom: 20px; /* Tambahkan margin bawah */
    }

    .form-group {
    margin-bottom: 20px;
    }

    .form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group select {
    width: calc(100% - 20px); /* Lebar formulir 100%, dikurangi 20px untuk padding */
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 16px;
    }

    .form-container button {
    width: 100%; /* Tombol mengisi lebar formulir */
    margin-top: 20px; /* Tambahkan jarak antara formulir dan tombol */
    padding: 10px 0; /* Atur padding tombol */
    }

    .form-container button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    }

    .form-container button[type="reset"] {
    background-color: #f44336;
    color: white;
    border: none;
    }

    .form-container button[type="submit"]:hover,
    .form-container button[type="reset"]:hover {
    opacity: 0.9; /* Efek transparansi saat dihover */
    }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Formulir Penghitungan Kredit Perjalanan Wisata</h2>
    <form action="payment.php" method="post">
        <div class="form-group">
            <label for="harga_produk">Harga Paket Wisata (Rp):</label>
            <input type="number" id="harga_produk" name="harga_produk" placeholder="Masukkan harga produk dalam Rupiah" required>
        </div>
        <div class="form-group">
            <label for="bunga_pinjaman">Bunga Pinjaman (%):</label>
            <input type="number" id="bunga_pinjaman" name="bunga_pinjaman" placeholder="Masukkan bunga pinjaman antara 5-10%" min="5" max="10" required>
        </div>
        <div class="form-group">
            <label for="uang_muka">Uang Muka (%):</label>
            <input type="number" id="uang_muka" name="uang_muka" placeholder="Masukkan uang muka minimal 25%" min="25" max="100" required>
        </div>
        <div class="form-group">
            <label for="tenor">Jangka Waktu (Bulan):</label>
            <input type="number" id="tenor" name="tenor" placeholder="Masukkan tenor minimal 3 bulan dan maksimal 24 bulan" min="3" max="24" required>
        </div>
        <button type="submit">Hitung</button>
        <button type="reset" class="reset">Reset</button>
    </form>
</div>

</body>
</html>
