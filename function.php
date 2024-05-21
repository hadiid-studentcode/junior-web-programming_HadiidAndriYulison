<?php

include 'koneksi.php';

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $row = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $row[] = $row;
    }
    return $row;
}

function getLensa()
{
    global $conn;
    $lensa = mysqli_query($conn, "SELECT lensa.*,distributor.nama as nama_distributor
FROM lensa
INNER JOIN distributor ON lensa.id_distributor = distributor.id");



    return $lensa;
}

function getDataSearch($cari)
{
    global $conn;

    $data = mysqli_query(
        $conn,
        "SELECT lensa.*,distributor.nama as nama_distributor
        FROM lensa
        INNER JOIN distributor ON lensa.id_distributor = distributor.id
        WHERE jenis LIKE '%" . $cari .
            "%' OR brand LIKE '%" . $cari . "%';"
    );


    return $data;
}

function getDataIDAndNameDistributor()
{

    global $conn;

    $data = mysqli_query(
        $conn,
        "select id,nama from distributor"
    );


    return $data;
}

function tambahLensa($data)
{


    global $conn;

    $kode = ($data['kodeLensa']);
    $brand = ($data['brand']);
    $jenis = $data['jenis'];
    $harga = ($data['harga']);
    $stok = ($data['stok']);
    $distributor = ($data['distributor']);


    // query insert data
    $query = "INSERT INTO lensa VALUES ('','$kode','$brand','$jenis','$harga','$stok','$distributor')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function tambahdataDistributor($data)
{
    global $conn;

    $kode = ($data['kodeDistributor']);
    $nama = ($data['nama']);
    $alamat = $data['alamat'];
    $email = ($data['email']);
    $telp = ($data['telp']);
    $pic = ($data['pic']);


    // query insert data
    $query = "INSERT INTO distributor VALUES ('','$kode','$nama','$alamat','$email','$telp','$pic')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function getDistributor()
{
    global $conn;
    $distributor = mysqli_query($conn, "SELECT * FROM distributor");



    return $distributor;
}

function hapusLensa($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM lensa WHERE id = $id");

    return mysqli_affected_rows($conn);
}
function hapusDistributor($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM distributor WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function getDataDistributorFirst($id)
{
    global $conn;
    $distributor = mysqli_query($conn, "SELECT * FROM `distributor` where id = $id");



    return $distributor;
}



function updateDataDistributor($data, $id)
{
    global $conn;

    $kode = ($data['kodeDistributor']);
    $nama = ($data['nama']);
    $alamat = $data['alamat'];
    $email = ($data['email']);
    $telp = ($data['telp']);
    $pic = ($data['pic']);

    // Build the SQL query
    $query = "UPDATE distributor SET kode='$kode', nama='$nama', alamat='$alamat', email='$email', telepon='$telp', pic='$pic' WHERE id=$id";

    // Execute the query
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function getDataLensaFirst($id)
{
    global $conn;
    $lensa = mysqli_query($conn, "SELECT lensa.*,distributor.nama as nama_distributor
FROM lensa
INNER JOIN distributor ON lensa.id_distributor = distributor.id
where lensa.id = $id");



    return $lensa;
}

function updateDataLensa($data, $id)
{
    global $conn;


    $kode = ($data['kodeLensa']);
    $brand = ($data['brand']);
    $jenis = $data['jenis'];
    $harga = ($data['harga']);
    $stok = ($data['stok']);
    $distributor = ($data['distributor']);

    // Build the SQL query
    $query = "UPDATE lensa SET kode='$kode', brand='$brand', jenis='$jenis', harga='$harga', stok='$stok', id_distributor='$distributor' WHERE id=$id";

    // Execute the query
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function getLensaStokKecil()
{

    global $conn;
    $lensa = mysqli_query($conn, "SELECT lensa.brand,lensa.stok,distributor.nama as nama_distributor
FROM lensa
INNER JOIN distributor ON lensa.id_distributor = distributor.id
ORDER BY stok ASC limit 1
;"



);



    return $lensa;
}

function getTotalStok(){
    global $conn;
    $stok = mysqli_query($conn, "SELECT SUM(stok) AS total_stok
FROM lensa;
");



    return $stok;
}
