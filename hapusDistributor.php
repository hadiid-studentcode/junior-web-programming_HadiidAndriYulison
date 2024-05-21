<?php


require 'function.php';


$idDistributor = $_GET["deleteDistributor"];


if (hapusDistributor($idDistributor) > 0) {
    echo "
            <script>
            alert('Data Distributor Berhasil Dihapus');
            document.location.href = 'admin.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('Data Distributor Gagal Dihapus');
            document.location.href = 'admin.php';
            </script>
        ";
}
