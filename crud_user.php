<!-- PHP-Admin -->
<?php 

include 'config/app.php';

$data_paket = select("SELECT paket.*, jenis.nama_paket AS nama_paket FROM paket INNER JOIN jenis ON paket.id_paket=jenis.id_paket ORDER BY paket.id DESC");
?>
<!-- Admin -->
<section id="admin">
  <div class="container">
      <div class="row text-left mb-7 mt-3">
            <div class="col-mt-5">
                <h2>Data Paket Perjalanan Wisata </h2>
                <hr>
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
                      <td width="10%" class="text-center">
                        <a href="detail-paket.php?id=<?= $paket['id']; ?>" class="btn btn-success btn-sm">Detail</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>  
            </div>
        </div>

        <!-- button login -->
</section>
   <!-- Admin end -->
   <!-- Footer -->
  <?php
  include 'footer.php';
  ?>
   <!-- Footer end -->
