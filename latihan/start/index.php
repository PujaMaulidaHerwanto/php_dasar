<?php

    //Koneksi ke database
    require 'function.php';

    //ambil data dari db (query)
    $members = query("SELECT * FROM members");

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

    <h1> Data Member </h1>

    <p><a href="tambahData.php">Tambah Data Member</a></p>

    <form action="" method="post">
        <input type="text" name="keyword" size="30" placeholder="Cari data" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <br>

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