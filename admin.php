<?php
include 'function.php';

$lensa = getLensa();
$distributorNameAndID = getDataIDAndNameDistributor();
$distributor = getDistributor();


if (isset($_GET["cari"])) {
    $search = $_GET['data_search'];
    $lensaSearch = getDataSearch($search);
}




if (isset($_POST["tambahdataLensa"])) {
    if (tambahLensa($_POST) > 0) {
        echo "
            <script>
            alert('Data Berhasil Dimasukkan');
            
            document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
             alert('Data Gagal Dimasukkan');
          
            document.location.href = 'admin.php';
            </script>
        ";
    }
}


if (isset($_POST["tambahdataDistributor"])) {
    if (tambahdataDistributor($_POST) > 0) {
        echo "
            <script>
            alert('Data Berhasil Dimasukkan');
            
            document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
             alert('Data Gagal Dimasukkan');
          
            document.location.href = 'admin.php';
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kacamata</title>
    <link rel="stylesheet" href="./assets/css/styles.css">
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
        <h1>Halaman Admin</h1>

        <div class="row">
            <div class="column">
                <h2>Tambah Data Lensa</h2>
                <!-- form tambah -->
                <form class="form-tambah" action="" method="post" style="padding: 10px;margin-top: 20px">

                    <label for="kodeLensa"> Kode Lensa : </label>
                    <input type="text" name="kodeLensa" id="kodeLensa" style="margin-bottom: 10px;"> <br>

                    <label for="jenis">Jenis :</label>
                    <input type="text" name="jenis" id="jenis" style="margin-bottom: 10px;"> <br>


                    <label for="brand">Brand :</label>
                    <input type="text" name="brand" id="brand" style="margin-bottom: 10px;"> <br>

                    <label for="harga">Harga :</label>
                    <input type="number" name="harga" id="harga" style="margin-bottom: 10px;"> <br>

                    <label for="stok">Stok :</label>
                    <input type="number" name="stok" id="stok" style="margin-bottom: 10px;"> <br>



                    <label for="distributor">Distributor :</label>

                    <select name="distributor" id="distributor" style="margin-bottom: 10px;">
                        <?php while ($d = mysqli_fetch_array($distributorNameAndID)) : ?>
                            <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                        <?php endwhile; ?>

                    </select> <br>

                    <button name="tambahdataLensa" type="submit" style="margin-top: 10px; padding: 5px; width: 100px ; height: 30px ; border-radius: 10px;">simpan</button>


                </form>

                <!-- akhir -->
            </div>
            <div class="column">
                <h2>Tambah Data Distributor</h2>
                <!-- form tambah -->
                <form class="form-tambah" action="" method="post" style="padding: 10px;margin-top: 20px">
                    <label for="kodeDistributor">Kode Distributor : </label>
                    <input type="text" name="kodeDistributor" id="kodeDistributor" style="margin-bottom: 10px;"> <br>

                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" style="margin-bottom: 10px;"> <br>

                    <label for="alamat">Alamat :</label>
                    <input type="text" name="alamat" id="alamat" style="margin-bottom: 10px;"> <br>


                    <label for="Email">Email :</label>
                    <input type="text" name="email" id="email" style="margin-bottom: 10px;"> <br>


                    <label for="telp">Telepon :</label>
                    <input type="text" name="telp" id="telp" style="margin-bottom: 10px;"> <br>

                    <label for="pic">PIC :</label>
                    <input type="text" name="pic" id="pic" style="margin-bottom: 10px;"> <br>

                    <button name="tambahdataDistributor" type="submit" style="margin-top: 10px; padding: 5px; width: 100px ; height: 30px ; border-radius: 10px;">simpan</button>


                </form>

                <!-- akhir -->
            </div>
        </div>






        <div class="row">

            <div class="column">

                <h2>Data Lensa</h2>

                <table id="tables">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Jenis Lensa</th>
                        <th>Brand Lensa</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Distributor</th>
                        <th>Action</th>
                    </tr>




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
                            <td>
                                <button> <a style="text-decoration: none;" href="hapusLensa.php?deleteLensa=<?= $lens['id']; ?>">Delete</a></button>
                                <button> <a style="text-decoration: none;" href="editLensa.php?idLensa=<?= $lens['id']; ?>">Update</a></button>


                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>




                </table>
            </div>
            <div class="column">
                <h2>Data Distributor</h2>

                <table id="tables">
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Nama Distributor</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>PIC</th>
                        <th>Action</th>
                    </tr>




                    <?php $i = 1; ?>
                    <?php while ($di = mysqli_fetch_array($distributor)) : ?>

                        <tr>
                            <td><?= $i; ?></td>
                            <td><?= $di['kode']; ?></td>
                            <td><?= $di['nama']; ?></td>
                            <td><?= $di['alamat']; ?></td>
                            <td><?= $di['email']; ?></td>
                            <td><?= $di['telepon']; ?></td>
                            <td><?= $di['pic']; ?></td>
                            <td>
                                <button> <a style="text-decoration: none;" href="hapusDistributor.php?deleteDistributor=<?= $di['id']; ?>">Delete</a></button>
                                <button> <a style="text-decoration: none;" href="editDistributor.php?idDistributor=<?= $di['id']; ?>">Update</a></button>


                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endwhile; ?>




                </table>
            </div>
        </div>




    </main>

    <footer>
        <p>Copyright &copy; 2024</p>

    </footer>

</body>

</html>