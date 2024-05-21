<?php
include 'function.php';

$lensa = getLensa();

// $data = mysqli_fetch_array($lensa);

// var_dump($data);die;


if (isset($_GET["cari"])) {

    // cek apakah data berhasil ditambahkan atau tidak

    $search = $_GET['data_search'];


    $lensaSearch = getDataSearch($search);

    // var_dump(mysqli_fetch_array($lensaSearch)); die;


}





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
        <div style="text-align: center;">
            <h1 style="text-align: center;">Selamat Datang di Toko Kacamata </h1>
            <img style="width: 200px" src="./assets/images/icon.png" alt="">


        </div>


        <nav>
            <ul>
                <li><a class="active" href="index.php">Home</a></li>
                <li><a href="admin.php">Admin</a></li>
                <li><a href="pemesanan.php">Pemesanan</a></li>
            </ul>

        </nav>
    </header>

    <main>
        <h1>Data Lensa Yang Tersedia</h1>

        <foFrm action="" method="get" class="search-form">
            <input type="text" id="myInput" name="data_search" placeholder="jenis lensa/nama lensa.." class="search" value="<?php if (isset($_GET['data_search'])) {
                                                                                                                                echo $_GET['data_search'];
                                                                                                                            }  ?>">
            <button type="submit" name="cari">Cari</button>
        </foFrm>


        <table id="tables">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Jenis Lensa</th>
                <th>Brand Lensa</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Distributor</th>
            </tr>

            <?php if (isset($lensaSearch)) : ?>

                <?php $i = 1; ?>
                <?php while ($lensrch = mysqli_fetch_array($lensaSearch)) : ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $lensrch['kode']; ?></td>
                        <td><?= $lensrch['jenis']; ?></td>
                        <td><?= $lensrch['brand']; ?></td>
                        <td><?= $lensrch['harga']; ?></td>
                        <td><?= $lensrch['stok']; ?></td>
                        <td><?= $lensrch['nama_distributor']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>

            <?php else : ?>


                <?php $i = 1; ?>
                <?php while ($lens = mysqli_fetch_array($lensa)) : ?>

                    <tr>
                        <td><?= $i; ?></td>
                        <td><?= $lens['kode']; ?></td>
                        <td><?= $lens['jenis']; ?></td>
                        <td><?= $lens['brand']; ?></td>
                        <td><?= $lens['harga']; ?></td>
                        <td><?= $lens['stok']; ?></td>
                        <td><?= $lens['nama_distributor']; ?></td>
                    </tr>
                    <?php $i++; ?>
                <?php endwhile; ?>


            <?php endif; ?>

        </table>

    </main>

    <footer>
     <p>Copyright &copy; 2024</p>

    </footer>

</body>

</html>