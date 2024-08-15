<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Registrasi</title>
    <style>
        table {
            border-collapse: collapse;
            width: 70%; /* Mengatur lebar tabel */
            margin: 0 auto; /* Membuat tabel berada di tengah */
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
        
        h2 {
            text-align: center; /* Mengatur alignment judul di tengah */
        }

        .passport-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Hasil Registrasi</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Menerima nilai dari form
        $nama = $_POST['nama'];
        $email = $_POST['Email'];
        $pilihan_paket = $_POST["pilihan_paket"];
        $tanggal_booking = $_POST["date"];
        $tanggal_keberangkatan = $_POST["tgl_berangkat"];
        $tipe_trip = ($_POST["tipe_trip"]) ? : "";
        $jumlah_peserta = $_POST["jumlah_orang"];
        $layanan_tambahan = isset($_POST["add1"]) ? "Meals, " : "";
        $layanan_tambahan .= isset($_POST["add2"]) ? "International Air Ticket, " : "";
        $layanan_tambahan .= isset($_POST["add3"]) ? "Optional Tour" : "";
        $catatan_tambahan = $_POST["ket"];

        // Menampilkan hasil input dalam tabel
        echo "<table>";
        echo "<tr><th>Informasi</th><th>Detail</th></tr>";
        echo "<tr><td>Nama Lengkap</td><td>$nama</td></tr>";
        echo "<tr><td>Alamat Email</td><td>$email</td></tr>";
        echo "<tr><td>Pilihan Paket</td><td>$pilihan_paket</td></tr>";
        echo "<tr><td>Tanggal Booking</td><td>$tanggal_booking</td></tr>";
        echo "<tr><td>Tanggal Keberangkatan</td><td>";
        switch($tanggal_keberangkatan) {
            case "tgl_a": echo "11 - 15 Oktober 2024"; break;
            case "tgl_b": echo "17 - 20 Oktober 2024"; break;
            case "tgl_c": echo "14 - 17 November 2024"; break;
        }
        echo "</td></tr>";
        echo "<tr><td>Tipe Keberangkatan</td><td>";
        switch($tipe_trip) {
            case "single": echo "Individu/Selftour"; break;
            case "doub/trp": echo "Kelompok/Group"; break;
            default: echo "Belum memilih tipe keberangkatan";
        }
        echo "</td></tr>";
        echo "<tr><td>Jumlah Peserta</td><td>$jumlah_peserta</td></tr>";
        echo "<tr><td>Layanan Tambahan</td><td>$layanan_tambahan</td></tr>";
        echo "<tr><td>Catatan Tambahan</td><td>$catatan_tambahan</td></tr>";
       

        // Menampilkan foto passport
        $uploaddir = 'uploads/';
        $uploadfile = $uploaddir . $_FILES['foto']['name'];
        if ($_FILES['foto']['type']=="image/png" || $_FILES['foto']['type']=="image/jpg"){
            if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile))
            {
              echo "<tr><td>Status Foto Passport</td><td>Foto berhasil diupload</td></tr>";
            } else {
                echo "File gagal diupload";
            }
        } else {
            echo "Tipe file anda salah <br/>";
        }
        echo "</table>";
    } 
    ?>
</body>
</html>
