<!-- php-db -->
<?php

$title = 'Edit Paket';

include 'config/app.php';

// ambil id dri url
$id = (int)$_GET['id'];

// query ambil data paket
$paket = select("SELECT * FROM paket WHERE id = $id")[0];

// cek apakah button edit dapat ditekan
if (isset($_POST['ubah'])) {
    if (update_paket($_POST) > 0) {
        echo "<script>
                alert('Data Paket berhasil diubah');
                document.location.href = 'index.php?target=admin';
              </script>";
    } else {
        echo "<script>
                alert('Data Paket gagal diubah');
                document.location.href = 'index.php?target=admin';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagabondia</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- font google -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" >
    <!-- My CSS -->
    <link rel="stylesheet" href="style2.css">
    

</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg sticky-top" id="navbar">
      <div class="container">
        <a class="navbar-brand" href="index.php" id="logo"><span>Vagabondia</span> Travel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span><i class="fa-solid fa-bars"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=gallery">Gallery</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=packages">Packages</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php?target=kredit">Simulasi</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown" href="index.php?target=admin">Admin</a>
            </li>
          </ul>
          <form class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Search">
            <button class="btn btn-outline-success" type="button">Search</button>
          </form>
        </div>
      </div>
    </nav>
   
    <!-- Navbar End -->
<!-- Admin -->
<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $paket['id']; ?>">
    <input type="hidden" name="fotoLama" value="<?= $paket['foto']; ?>">

  <div class="container mt-5">
    <div class="row justify-content-center">
    <div class="col-md-8 mt-5">
    <h2>Edit Data Paket</h2>
    <hr> 
        <div class="mb-3">
        <label for="id_paket" class="form-label"><b>Nama Paket:</b></label>
            <select name="id_paket" id="id_paket" class="form-control" required>
            <?php
              $data_paket = mysqli_query($db, "SELECT * FROM jenis WHERE id_paket IN ('PW001', 'PW002', 'PW003')");
              while($row = mysqli_fetch_assoc($data_paket)) {
                  // cek apakah id_paket sama dengan yang di database
                  $selected = ($row['id_paket'] == $paket['id_paket']) ? 'selected' : '';
                  echo "<option value='".$row['id_paket']."' $selected>".$row['nama_paket']."</option>";
              }
          ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label"><b>Harga Paket:</b></label>
            <input type="number" class="form-control" id="harga" name="harga" min="4500000" value="<?= $paket['harga']; ?>" required />
        </div>
        <div class="mb-3">
            <label for="destinasi" class="form-label"><b>Destinasi:</b></label>
            <input type="text" class="form-control" id="destinasi" name="destinasi" value="<?= $paket['destinasi']; ?>" required/>
        </div>
        <div class="mb-3">
            <label for="lama_perjalanan" class="form-label"><b>Lama Perjalanan (hari):</b></label>
            <input type="number" class="form-control" id="lama_perjalanan" name="lama_perjalanan" min="1" value="<?= $paket['lama_perjalanan']; ?>" required />
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label"><b>Deskripsi:</b></label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required ><?= $paket['deskripsi']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label"><b>Upload Foto Paket:</b></label>
            <input type="file" class="form-control" id="foto" name="foto"/>
            <p>
              <small>Gambar Sebelumnya</small>
            </p>
            <img src="uploads/<?= $paket['foto']; ?>" alt="foto" width="100px" />
          </div>
          <br>
        <div class="form-group mt-5">
        <button type="submit" name="ubah" class="btn btn-primary" style="float: left p-3;">Ubah</button>
        <button type="reset" class="btn btn-outline-danger" style="float: right p-3;">Reset Data</button>
        </div>
    </div>
    </div>
   </div>
</form>

   <!-- Admin end -->
   <!-- Footer -->
   <?php include 'footer.php'; ?>
   <!-- Footer end -->
