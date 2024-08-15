<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get form data
  $id_paket = $_POST["id_paket"];
  $nama_paket = $_POST["nama_paket"];
  $harga_paket = $_POST["harga_paket"];
  $destinasi = $_POST["destinasi"];
  $lama_perjalanan = $_POST["lama_perjalanan"];
  $tgl_berangkat = $_POST["tgl_berangkat"];

  // Initialize uploadOk variable
  $uploadOk = 0;

  // Handle file upload
  if (isset($_FILES['foto'])) {
    $uploaddir = 'uploads/';
    $uploadfile = $uploaddir . basename($_FILES['foto']['name']);
    $imageFileType = strtolower(pathinfo($uploadfile, PATHINFO_EXTENSION));
    
    // Check file type
    if ($imageFileType == "png" || $imageFileType == "jpg" || $imageFileType == "jpeg") {
      if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadfile)) {
        echo "Foto berhasil diupload<br>";
        $uploadOk = 1;
      } else {
        echo "File gagal diupload<br>";
      }
    } else {
      echo "Tipe file anda salah. Hanya PNG, JPG, dan JPEG yang diperbolehkan.<br>";
    }
  } else {
    echo "Tidak ada file yang diupload.<br>";
  }

  // Upload file
  if ($uploadOk == 1) {
    // Write to rekap-admin.txt file
    $fp = fopen("rekap-admin.txt", "a");
    if ($fp) {
      fwrite($fp, $id_paket . "," . $nama_paket . "," . $harga_paket . "," . $destinasi . "," . $lama_perjalanan . "," . $tgl_berangkat . "," . basename($_FILES['foto']['name']) . "," . date("d F Y") . "\n");
      fclose($fp);
      echo "Data berhasil disimpan!";
    } else {
      echo "Error membuka file rekap-admin.txt.";
    }
  } else {
    echo "Error uploading file.";
  }
}
?>
