<!-- PHP-Admin -->
<?php 

include 'config/app.php';

$data_paket = select("SELECT paket.*, jenis.nama_paket AS nama_paket FROM paket INNER JOIN jenis ON paket.id_paket=jenis.id_paket ORDER BY paket.id DESC");

if (!isset($_SESSION['namauser'])) {
    header('Location: login.php');
    exit;
}


?>
<!-- Admin -->
<section id="admin">
  <div class="container">
      <div class="row text-left mb-7 mt-3">
            <div class="col-mt-5">
                <h2 style="text-align: left;">Data Paket Perjalanan Wisata </h2>
                <hr>
                <a href="form-tambah.php" class="btn btn-primary mb-1" method="post" enctype="multipart/form-data">Tambah</a>
                <table class="table table-bordered table-striped mt-5" id="table">
                  <thead>
                    <tr>
                      <th style="text-align: center;">No</th>
                      <th style="text-align: center;">Nama Paket</th>
                      <th style="text-align: center;">Harga Paket</th>
                      <th style="text-align: center;">Destinasi</th>
                      <th style="text-align: center;">Lama Perjalanan</th>
                      <th style="text-align: center;">Tanggal Input</th>
                      <th style="text-align: center;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_paket as $paket) : ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $paket['nama_paket']; ?></td>
                      <td>Rp <?= number_format($paket['harga'],0,',','.'); ?></td>
                      <td><?= $paket['destinasi']; ?></td>
                      <td><?= $paket['lama_perjalanan']; ?> hari</td>
                      <td><?= date('d/m/y | H:i:s', strtotime($paket['tanggal_input'])); ?></td>
                      <td width="20%" class="text-center">
                        <a href="detail-paket-admin.php?id=<?= $paket['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                        <a href="form-edit.php?id=<?= $paket['id']; ?>" class="btn btn-outline-info btn-sm">Edit</a>
                        <a href="hapus-paket.php?id=<?= $paket['id']; ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin Data Paket akan dihapus?');">Hapus</a>
                        
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>  
            </div>
        </div>
</section>
   <!-- Admin end -->
   <!-- Footer -->
  <?php
  include 'footer.php';
  ?>
   <!-- Footer end -->
