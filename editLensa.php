<?php
include 'function.php';


$distributorNameAndID = getDataIDAndNameDistributor();


$idLensa = $_GET["idLensa"];

$lensa = getDataLensaFirst($idLensa);
$lens = mysqli_fetch_array($lensa);


if (isset($_POST["UpdatedataLensa"])) {
    if (updateDataLensa($_POST, $idLensa) > 0) {
        echo "
            <script>
            alert('Data Berhasil Dipdate');
            
            document.location.href = 'admin.php';
            </script>
        ";
    } else {
        echo "
            <script>
             alert('Data Gagal Diupdate');
          
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
        <h1>Edit Distributor</h1>

        <div class="row">


            <div class="column">
                <h2>Edit Data Lensa</h2>
                <!-- form tambah L-->
                <form class="form-edit" action="" method="post" style="padding: 10px;margin-top: 20px">

                    <label for="kodeLensa"> Kode Lensa : </label>
                    <input type="text" name="kodeLensa" id="kodeLensa" style="margin-bottom: 10px;" value="<?php echo $lens["kode"] ?>"> <br>

                    <label for="jenis">Jenis :</label>
                    <input type="text" name="jenis" id="jenis" style="margin-bottom: 10px;" value="<?php echo $lens["jenis"] ?>"> <br>


                    <label for="brand">Brand :</label>
                    <input type="text" name="brand" id="brand" style="margin-bottom: 10px;" value="<?php echo $lens["brand"] ?>"> <br>

                    <label for="harga">Harga :</label>
                    <input type="number" name="harga" id="harga" style="margin-bottom: 10px;" value="<?php echo $lens["harga"] ?>"> <br>

                    <label for="stok">Stok :</label>
                    <input type="number" name="stok" id="stok" style="margin-bottom: 10px;" value="<?php echo $lens["stok"] ?>"> <br>



                    <label for="distributor">Distributor :</label>

                    <select name="distributor" id="distributor" style="margin-bottom: 10px;">
                        <option selected value="<?php echo $lens["id_distributor"] ?>"><?php echo $lens["nama_distributor"] ?></option>


                        <?php while ($d = mysqli_fetch_array($distributorNameAndID)) : ?>
                            <option value="<?= $d['id'] ?>"><?= $d['nama'] ?></option>
                        <?php endwhile; ?>


                    </select> <br>

                    <button name="UpdatedataLensa" type="submit" style="margin-top: 10px; padding: 5px; width: 100px ; height: 30px ; border-radius: 10px;">simpan</button>


                </form>
                <!-- akhir -->
            </div>
        </div>










    </main>

    <footer>


    </footer>

</body>

</html>