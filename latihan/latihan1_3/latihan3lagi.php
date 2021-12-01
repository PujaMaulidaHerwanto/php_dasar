<?php

// mengecek data yang masuk
//jika tidak ada data yang dikirimkan dari variable $_GET
 //user akan dikembalikan ke halaman awal

 if ( !isset($_GET["stgname"]) ||
    !isset($_GET["bday"]) ||
    !isset($_GET["countries"]) ||
    !isset($_GET["rlname"]) ||
    !isset($_GET["foto"])) {
 
    header("Location: latihan3.php");

    exit;
 }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <style>
        img{
            width: 100px;
            height: 130px;
        }
    </style>
</head>
<body>

        <h1>List Detail Member</h1>

    <ul>
        <li> <img src="../img/?= $_GET["foto"];?>"> </li>
        <li> <?= $_GET["stgname"];?> </li>
        <li> <?= $_GET["bday"];?> </li>
        <li> <?= $_GET["countries"];?> </li>
        <li> <?= $_GET["rlname"];?> </li>
    </ul>



    <a href="latihan3.php"> Kembali ke halaman sebelumnya</a>
</body>
</html>