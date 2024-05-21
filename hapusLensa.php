<?php


require 'function.php';


$idLensa = $_GET["deleteLensa"];


if (hapusLensa($idLensa) > 0) {
    echo "
            <script>
            alert('Data Lensa Berhasil Dihapus');
            document.location.href = 'admin.php';
            </script>
        ";
} else {
    echo "
            <script>
            alert('Data Lensa Gagal Dihapus');
            document.location.href = 'admin.php';
            </script>
        ";
}
