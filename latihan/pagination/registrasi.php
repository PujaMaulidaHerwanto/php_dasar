<?php

require 'function.php';

    if (isset($_POST["daftar"])) {
        
        if ( register($_POST) > 0 ) {
            echo "
                <script>
                    alert('Selamat Datang');
                    document.location.href = 'login.php';
                </script>
            ";
        }
        else {
            echo mysqli_error($conn);
        }

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>

    <style>
        label{
            display: block;
        }
        li{
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <h1>Halaman Registrasi</h1>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username"> Username : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> Password : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2"> Konfirmasi Password : </label>
                <input type="password" name="password2" id="password2">
            </li>
            <li>
                <button type="submit" name="daftar">Daftar!</button>
            </li>
        </ul>

    </form>
    
</body>
</html>