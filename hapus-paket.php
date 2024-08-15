<?php

include 'config/app.php';

// menerima id paket yg dipilih user
$id = (int)$_GET['id'];

if (delete_paket($id) > 0) {
    echo "<script>
            alert('Data barang berhasil dihapus');
            document.location.href = 'index.php?target=admin';
            </script>";
} else {
    echo "<script>
            alert('Data barang gagal dihapus');
            document.location.href = 'index.php?target=admin';
            </script>";
}
