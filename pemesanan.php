<?php
include 'function.php';

$dataLensaDariStokKecil = getLensaStokKecil();
$totalStok = getTotalStok();


$stok = mysqli_fetch_array($totalStok);


// var_dump($data);die;




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacamata</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
    <link rel="icon" href="./assets/images/icon.png">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="pemesanan.php">Pemesanan</a></li>
            </ul>

        </nav>
    </header>

    <main>
        <h1>Laporan Lensa</h1>



        <table id="tables">
            <tr>
                <th>No</th>

                <th>Brand Lensa</th>

                <th>Stok</th>
                <th>Distributor</th>


            </tr>




            <?php $i = 1; ?>
            <?php while ($lens = mysqli_fetch_array($dataLensaDariStokKecil)) : ?>

                <tr>
                    <td><?= $i; ?></td>

                    <td><?= $lens['brand']; ?></td>

                    <td><?= $lens['stok']; ?></td>
                    <td><?= $lens['nama_distributor']; ?></td>

                </tr>
                <?php $i++; ?>
            <?php endwhile; ?>

            <tr>
                <td>
                    Total Stok : <?= $stok['total_stok'] ?>
                </td>
            </tr>




        </table>

    </main>

    <footer>
        <p>Copyright &copy; 2024</p>

    </footer>

</body>

</html>