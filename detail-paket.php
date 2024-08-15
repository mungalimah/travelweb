<!-- php-db -->
<?php

$title = 'Detail Paket';

include 'config/app.php';

// ambil id dri url
$id = (int)$_GET['id'];

//menampilkan data paket
$paket = select("SELECT * FROM paket INNER JOIN jenis ON paket.id_paket = jenis.id_paket WHERE id = $id")[0];
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
<!-- detail -->
<section id="detail">
  <div class="container">
      <div class="row text-left mb-5 mt-2">
            <div class="col">
                <h2>Data <?= $paket['nama_paket']; ?></h2>
                <hr>
                <table class="table table-bordered table-striped mt-5">
                  <tr>
                    <td>Nama Paket</td>
                    <td>: <?= $paket['nama_paket']; ?></td>
                  </tr>
                  <tr>
                    <td>Harga Paket</td>
                    <td>: Rp <?= number_format($paket['harga'],0,',','.'); ?></td>
                  </tr>
                  <tr>
                    <td>Destinasi Wisata</td>
                    <td>: <?= $paket['destinasi']; ?></td>
                  <tr>
                    <td>Lama Perjalanan</td>
                    <td>: <?= $paket['lama_perjalanan']; ?> hari</td>
                  </tr>
                  <tr>
                    <td>Tanggal Input</td>
                    <td>: <?= date('d/m/y | H:i:s', strtotime($paket['tanggal_input'])); ?></td>
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td>: <?= $paket['deskripsi']; ?></td>
                  </tr>
                  <tr>
                    <td width="35%">Foto Paket</td>
                    <td><a href="uploads/<?= $paket['foto']; ?>">
                        <img src="uploads/<?= $paket['foto']; ?>" alt="foto" width="50%">
                        </a>
                    </td>
                  </tr>  
                  <tr>
                    <td>Konfirmasi</td>
                    <td>: <?= ($paket['confirmCheckbox'] ? 'Confirmed' : 'Not Confirmed')  ?></td>
                  </tr>
                </table>  
                <br>
                <a href="index-user.php?target=crud" class="btn btn-success" style="float: right;">Kembali</a>
            </div>
        </div>
</section>
   <!-- detail end -->
   <!-- Footer -->
   <?php include 'footer.php'; ?>
   <!-- Footer end -->
