<!-- php-db -->
<?php

$title = 'Tambah Paket';

include 'config/app.php';

// cek apakah button dapat ditekan
if (isset($_POST['tambah'])) {
    if (isset($_POST['confirmCheckbox'])) {
        if (create_paket($_POST) > 0) {
            echo "<script>
                    alert('Data Paket berhasil ditambahkan');
                    document.location.href = 'index.php?target=admin';
                  </script>";
        } else {
            echo "<script>
                    alert('Data Paket gagal ditambahkan');
                    document.location.href = 'index.php?target=admin';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Anda harus menyetujui bahwa Anda yakin untuk mengisi form ini.');
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
                    <div class="collapse navbar-collapse" id="navbarNavLightDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                    More
                                </button>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                    <li>
                                        <?php if (isset($_SESSION['namauser'])): ?>
                                            <a class="dropdown-item" href="index.php?target=admin">CRUD</a>
                                        <?php else: ?>
                                            <a class="dropdown-item" href="index.php?target=crud">CRUD</a>
                                        <?php endif; ?>
                                    </li>
                                    <li><a class="dropdown-item" href="form_input.html">Form</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
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
  <div class="container mt-5">
    <h2 style="text-align: center;">Tambah Data Paket Perjalanan Wisata </h2>
    <hr> 
    <div class="row justify-content-center">
    <div class="col-md-8 mt-5">
        <div class="mb-3">
            <label for="id_paket" class="form-label"><b>Nama Paket:</b></label>
            <select name="id_paket" id="id_paket" class="form-control">
            <option value="">-- pilih paket --</option>
            <?php
              $data_paket = mysqli_query($db, "SELECT * FROM jenis WHERE id_paket IN ('PW001', 'PW002', 'PW003')");
              while($row = mysqli_fetch_assoc($data_paket)) {
                echo "<option value='".$row['id_paket']."'>".$row['nama_paket']."</option>";
              }
          ?>
         
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label"><b>Harga Paket:</b></label>
            <input type="number" class="form-control" id="harga" name="harga" required min="4500000" placeholder="min 4.5 juta"/>
        </div>
        <div class="mb-3">
            <label for="destinasi" class="form-label"><b>Destinasi:</b></label>
            <input type="text" class="form-control" id="destinasi" name="destinasi" required placeholder="dalam/luar negeri"/>
        </div>
        <div class="mb-3">
            <label for="lama_perjalanan" class="form-label"><b>Lama Perjalanan:</b></label>
            <input type="number" class="form-control" id="lama_perjalanan" name="lama_perjalanan" min="1" placeholder="min 1 hari"/>
        </div>
        <div class="mb-3">
            <label for="tanggal_input" class="form-label"><b>Tanggal:</b></label>
            <input type="date" class="form-control" id="tanggal_input" name="tanggal_input" required/>
        </div>
        <div class="mb-3">
            <label for="deskripsi" class="form-label"><b>Deskripsi:</b></label>
            <textarea type="text" class="form-control" id="deskripsi" name="deskripsi" required placeholder="deskripsi tambahan"></textarea>
        </div>
        <div class="mb-3">
            <label for="gambar" class="form-label" style="display: flex; align-items: center;"><b>Upload Foto Paket:</b></label>
            <input type="file" class="form-control" id="foto" name="foto" required/>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="confirmCheckbox" name="confirmCheckbox" required>
            <label class="form-check-label" for="confirmCheckbox">Apakah Anda yakin ingin mengisi form ini?</label>
        </div>
        <div class="form-group mt-5">
        <button type="submit" name="tambah" class="btn btn-primary" style="float: left p-3;">Simpan Data</button>
        <button type="reset" class="btn btn-outline-danger" style="float: right p-3; ">Hapus Data</button>
        </div>
        </div>
        </div>
    </div>
    </form>
    <script>
    function validateForm() {
        const checkbox = document.getElementById('confirmCheckbox');
        if (!checkbox.checked) {
            alert('Anda harus menyetujui bahwa Anda yakin untuk mengisi form ini.');
            return false;
        }
        return true;
    }
    </script>
    </div>
   </div>

   <!-- Admin end -->
   <!-- Footer -->
   <?php include 'footer.php'; ?>
   <!-- Footer end -->
