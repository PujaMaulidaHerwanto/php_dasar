<?php

    //Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    //ambil data dari db (query)
    $result = mysqli_query($conn, "SELECT * FROM members");

    //cara cek error
    if (!$result) {
        echo mysqli_error($conn);
    }

    //ambil data (fetch) member dari object result

    // $mem = mysqli_fetch_row($result);  mengambil data tapi dengan sistem array numeric
    // var_dump($mem);
    // var_dump($mem[3]);

    // $mem = mysqli_fetch_assoc($result);  Mengambil data dengan menggunakan sistem array associative
    // var_dump($mem);
    // var_dump($mem["stgname"]);

    // $mem = mysqli_fetch_array($result);   Mengambil data object dengan cara keduanya tapi datanya jadi double
    // var_dump($mem[1]);
    // var_dump($mem["rlname"]);

    // $mem = mysqli_fetch_object($result);   sistemnya hampir sama seperti assoc hanya cara memanggil salah satu datanya yang berbeda
    // var_dump($mem);
    // var_dump($mem->stgname);

    //cara mengambil seluruh datanya

    // while ($mem = mysqli_fetch_assoc($result) ) {
    //     var_dump($mem);
    // }
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

    <table border="1" cellpadding="10" cellspacing="0"> 

        <tr>
            <th> No. </th>
            <th> Action </th>
            <th> Birth Date </th>
            <th> Picture </th>
            <th> Name </th>
            <th> Birth Name </th>
            <th> Countries </th>
        </tr>

        <?php $i=1; ?>
        <?php while ($row = mysqli_fetch_assoc($result) ) : ?>
        <tr>

            <td> <?= $i?> </td>
            <td>
                <a href="#"> Edit </a>
                <span> | </span>
                <a href="#"> Hapus </a>
            </td>
            <td> <?= $row["bday"]; ?> </td>
            <td><img src="../img/<?= $row["foto"]; ?>" width="50"></td>
            <td> <?= $row["stgname"]; ?> </td>
            <td> <?= $row["rlname"]; ?> </td>
            <td> <?= $row["countries"]; ?> </td>

        </tr>
        <?php $i++; ?>
        <?php endwhile?>
    
    </table>
    
</body>
</html>