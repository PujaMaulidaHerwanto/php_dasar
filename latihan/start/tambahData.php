<?php

require 'function.php';

    if (isset($_POST["submit"])) {

        if (tambah($_POST) > 0 ) {
            echo "
                    <script>
                        alert('Data Berhasil Ditambahkan!');
                        document.location.href = 'index.php';
                    </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'tambahData.php';
                </script>
                
        ";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>
<body>

    <h1> Tambah Data Member</h1>

    <form action="" method="POST">

        <ul>
            <li>
                <label for="stgname"> Stage Name : </label>
                <input type="text" name="stgname" id="stgname">
            </li>
            <li>
                <label for="rlname"> Name : </label>
                <input type="text" name="rlname" id="rlname" required>
            </li>
            <li>
                <label for="bday"> Birth Date : </label>
                <input type="text" name="bday" id="bday">
            </li>
            <li>
                <label for="countries"> Countries : </label>
                <input type="text" name="countries" id="countries">
            </li>
            <li>
                <label for="foto"> Picture : </label>
                <input type="text" name="foto" id="foto">
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>