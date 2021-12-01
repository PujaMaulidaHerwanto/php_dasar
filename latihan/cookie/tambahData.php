<?php

    //cek session
    session_start();

    //cek apakah user sudah login
    if (!isset($_SESSION["login"])) {
        header("Location: login.php");
        exit;
    }


    require 'function.php';

    if (isset($_POST["submit"])) {

        // var_dump($_POST); 
        // die;

        // result
            // array(5) {
            //     ["stgname"]=>
            //     string(2) "sc"
            //     ["rlname"]=>
            //     string(3) "jsc"
            //     ["bday"]=>
            //     string(6) "130901"
            //     ["countries"]=>
            //     string(11) "South Korea"
            //     ["submit"]=>
            //     string(0) ""
            // }

            // var_dump($_FILES);
            // die;

            //result
            // array(1) {
            //     ["foto"]=>
            //     array(5) {
            //       ["name"]=>
            //       string(12) "Sungchan.jpg"
            //       ["type"]=>
            //       string(10) "image/jpeg"
            //       ["tmp_name"]=>
            //       string(26) "C:\xampp74\tmp\php48F2.tmp"
            //       ["error"]=>
            //       int(0)
            //       ["size"]=>
            //       int(49763)
            //     }
            //   }

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
                    alert('Data Gagal Ditambahkan!');
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

    <form action="" method="POST" enctype="multipart/form-data">

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
                <input type="file" name="foto" id="foto">
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah Data!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>