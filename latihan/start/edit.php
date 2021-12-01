<?php

require 'function.php';

    $id = $_GET["id"];
    
    $mem = query("SELECT * FROM members WHERE id = $id")[0];

    if (isset($_POST["submit"])) {

        if (edit($_POST) > 0 ) {
            echo "
                    <script>
                        alert('Data Berhasil Diubah!');
                        document.location.href = 'index.php';
                    </script>
            ";
        }
        else {
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'index.php';
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
    <title>Edit Data</title>
</head>
<body>

    <h1> Edit Data Member</h1>

    <form action="" method="POST">

        <input type="hidden" name="id" value="<?= $mem["id"]; ?>">

        <ul>
            <li>
                <label for="stgname"> Stage Name : </label>
                <input type="text" name="stgname" id="stgname" value="<?= $mem["stgname"]; ?>">
            </li>
            <li>
                <label for="rlname"> Name : </label>
                <input type="text" name="rlname" id="rlname" required value="<?= $mem["rlname"]; ?>">
            </li>
            <li>
                <label for="bday"> Birth Date : </label>
                <input type="text" name="bday" id="bday" value="<?= $mem["bday"]; ?>">
            </li>
            <li>
                <label for="countries"> Countries : </label>
                <input type="text" name="countries" id="countries" value="<?= $mem["countries"]; ?>">
            </li>
            <li>
                <label for="foto"> Picture : </label>
                <input type="text" name="foto" id="foto" value="<?= $mem["foto"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Edit Data!</button>
            </li>
        </ul>
    </form>
    
</body>
</html>