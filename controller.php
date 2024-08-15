<?php

include 'database.php';
//menampilkan data
function select ($query)
{
  //panggil koneksi database
  global $db;

  $result = mysqli_query($db, $query);
  $rows = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}



$query = mysqli_query($db, "select * from jenis;") or die(mysqli_error($db));
$data_paket = mysqli_query($db, "select * from paket INNER JOIN jenis ON paket.id_paket=jenis.id_paket;") or die(mysqli_error($db));
$data_paket = mysqli_query($db, "SELECT * FROM jenis WHERE id_paket IN ('PW001', 'PW002', 'PW003')");


//fungsi menambahkan paket
function create_paket($post)
{  
    global $db;

    $id_paket       = strip_tags($post['id_paket']);
    $harga      = strip_tags($post['harga']);
    $destinasi  = strip_tags($post['destinasi']);
    $lama_perjalanan = strip_tags($post['lama_perjalanan']);
    $deskripsi  = strip_tags($post['deskripsi']);
    $foto       = upload_file();
    $confirmation = isset($data['confirmCheckbox']) ? 1 : 0;

    // cek upload foto
    if (!$foto) {
      return false;
    }

    //query tambah data
    $query = "INSERT INTO paket VALUES(null, '$id_paket', '$harga', '$destinasi', '$lama_perjalanan', CURRENT_TIMESTAMP(),'$deskripsi', '$foto', '$confirmation')";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

//fungsi mengedit paket
function update_paket($post)
{  
    global $db;

    $id   = strip_tags($post['id']);
    $id_paket       = strip_tags($post['id_paket']);
    $harga      = strip_tags($post['harga']);
    $destinasi  = strip_tags($post['destinasi']);
    $lama_perjalanan = strip_tags($post['lama_perjalanan']);
    $deskripsi  = strip_tags($post['deskripsi']);
    $fotoLama      = strip_tags($post['fotoLama']);

    // cek upload foto baru atau tidak
    if ($_FILES['foto']['error'] == 4) {
      $foto = $fotoLama;
    } else {
      $foto = upload_file();
    }
    //query edit data
    $query = "UPDATE paket SET id_paket = '$id_paket', harga ='$harga', destinasi = '$destinasi', lama_perjalanan = '$lama_perjalanan', deskripsi = '$deskripsi', foto = '$foto' WHERE id = $id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

// fungsi upload file
function upload_file()
{
  $namaFile = $_FILES['foto']['name'];
  $ukuranFile = $_FILES['foto']['size'];
  $error = $_FILES['foto']['error'];
  $tmpName = $_FILES['foto']['tmp_name'];

  // check file yang diupload
  $ekstensifileValid = ['jpg', 'jpeg', 'png'];
  $ekstensifile      = explode('.', $namaFile); //kasi nama file.ekstensi
  $ekstensifile      = strtolower(end($ekstensifile)); 

  if (!in_array($ekstensifile, $ekstensifileValid)) {
    //pesan gagal
    echo "<script>
          alert('Format File Tidak Valid');
          document.location.href = 'index.php?target=admin';
          </script>";
    die();
  }

  // cek ukuran file 4 mb
  if ($ukuranFile > 4096000){
    //pesan gagal
    echo "<script>
          alert('Size File Max 4 MB');
          document.location.href = 'index.php?target=admin';
          </script>";
    die();
  }

  // generate nama file baru, mencegah malware
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensifile;

  //pindah ke folder Uploads
  move_uploaded_file($tmpName, 'uploads/' . $namaFileBaru);
  return $namaFileBaru;

  
}



//fungsi menghapus paket
function delete_paket($id)
{  
    global $db;

    //query hapus data paket

    $query = "DELETE FROM paket WHERE id = $id";
    
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}
