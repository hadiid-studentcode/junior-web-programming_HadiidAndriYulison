<?php
include 'function.php';


$idDistributor = $_GET["idDistributor"];

$distributor = getDataDistributorFirst($idDistributor);
$dist = mysqli_fetch_array($distributor);

if (isset($_POST["UpdatedataDistributor"])) {
    if (updateDataDistributor($_POST, $idDistributor) > 0) {
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
                <h2>Edit Data Distributor</h2>
                <!-- form tambah -->
                <form class="form-edit" action="" method="post" style="padding: 10px;margin-top: 20px">

             

                    <label for="kodeDistributor">Kode Distributor : </label>
                    <input type="text" name="kodeDistributor" id="kodeDistributor" style="margin-bottom: 10px;" value="<?php echo $dist["kode"] ?>"> <br>

                    <label for="nama">Nama :</label>
                    <input type="text" name="nama" id="nama" style="margin-bottom: 10px;" value="<?php echo $dist["nama"] ?>"> <br>

                    <label for="alamat">Alamat :</label>
                    <input type="text" name="alamat" id="alamat" style="margin-bottom: 10px;" value="<?php echo $dist["alamat"] ?>"> <br>


                    <label for="Email">Email :</label>
                    <input type="text" name="email" id="email" style="margin-bottom: 10px;" value="<?php echo $dist["email"] ?>"> <br>


                    <label for="telp">Telepon :</label>
                    <input type="text" name="telp" id="telp" style="margin-bottom: 10px;" value="<?php echo $dist["telepon"] ?>"> <br>

                    <label for="pic">PIC :</label>
                    <input type="text" name="pic" id="pic" style="margin-bottom: 10px;" value="<?php echo $dist["pic"] ?>"> <br>

                    <button name="UpdatedataDistributor" type="submit" style="margin-top: 10px; padding: 5px; width: 100px ; height: 30px ; border-radius: 10px;">Update Data</button>


                </form>

                <!-- akhir -->
            </div>
        </div>










    </main>

    <footer>


    </footer>

</body>

</html>