<?php
    //cek session
    session_start();

    //cek apakah user sudah login
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }

    //Koneksi ke database
    require 'function.php';

    //pagination

    //KONFIGURASI PAGINATION
    
    $jmlhDataYangMauDiAmbil = 2;

    //ambil jumlah data yang kita punya
    $jumlahData = count(query("SELECT * FROM members"));

    //MENENTUKAN JUMLAH HALAMAN
    $jumlahHalaman = ceil($jumlahData / $jmlhDataYangMauDiAmbil);

    // menentukan halaman aktif
    // if (isset($_GET['halaman'])) {
    //     $halamanAktif = $_GET["halaman"];
    // }
    // else {
    //     $halamanAktif = 1;
    // }

    //menggunakan operator ternary
    $halamanAktif = ( isset($_GET['halaman']) ?  $_GET["halaman"] : 1 );
    // jika ada $_GET['halaman] bernilai TRUE $halamanAktif = $_GET['halaman] tpi jika FALSE $halamanAktif = 1

    //menentukan index awal yang akan ditampilkan

    // halaman = 2 data awal = 2
    //halaman = 3 data awal = 4
    $indexAwal = ($jmlhDataYangMauDiAmbil * $halamanAktif) - $jmlhDataYangMauDiAmbil;
    
    //ambil data dari db (query)
    $members = query("SELECT * FROM members LIMIT $indexAwal, $jmlhDataYangMauDiAmbil");
    // AMBIL DATA DARI TABEL MEMBER MENGGUNAKAN LIMIT DENGAN MENGAMBIL 2 DATA DARI INDEX 0

    //cari data
    if (isset( $_POST["cari"] ) ) 
    {
        $members = cari($_POST["keyword"]);
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Members</title>
</head>
<body>

    <p><a href="logout.php" onclick="
                return confirm('Keluar?');" > LOGOUT </a></p>

    <h1> Data Member </h1>

    <p><a href="tambahData.php">Tambah Data Member</a></p>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" placeholder="Cari data" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <br>

    <!-- NAVIGASI-->

    <?php if($halamanAktif > 1 ) : ?>
        <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for ($i=1; $i <= $jumlahHalaman; $i++) : ?>

        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" style="font-weight: bold; color:magenta;"> <?= $i; ?> </a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>"> <?= $i; ?> </a>
        <?php endif; ?>

    <?php endfor; ?>

    <?php if($halamanAktif < $jumlahHalaman ) : ?>
        <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
    <?php endif; ?>

    <br><br>

    <table border="1" cellpadding="10" cellspacing="0"> 

        <tr>
            <th> No. </th>
            <th> Action </th>
            <th> Birth Date </th>
            <th> Picture </th>
            <th> Stage Name </th>
            <th> Name </th>
            <th> Countries </th>
        </tr>

        <?php $i=1; ?>
        <?php foreach ($members as $row ) : ?>
        <tr>

            <td> <?= $i?> </td>
            <td>
                <a href="edit.php?id=<?= $row["id"]; ?>"> Edit </a>
                <span> | </span>
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
                return confirm('Anda yakin akan menghapus data ini?');"> Hapus </a>
            </td>
            <td> <?= $row["bday"]; ?> </td>
            <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
            <td> <?= $row["stgname"]; ?> </td>
            <td> <?= $row["rlname"]; ?> </td>
            <td> <?= $row["countries"]; ?> </td>

        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    
    </table>
    
</body>
</html>