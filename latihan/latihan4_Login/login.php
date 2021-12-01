<?php

//cek apakah button sublit sudah di klik atau belum

if ( isset($_POST["submit"] ) ) {
    // cek username dan password nya
    if ($_POST["username"] == "admin" && $_POST["password"] == "323") {
        // redirect ke halaman admin
        header("Location: admin.php");
        exit;
    }
    else {
        $gagal = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h1>
        Form Login
    </h1>
    
    <?php if ( isset($gagal ) ) : ?>
        <p style="color: red; font-style: italic;">Username atau Password yang anda masukan salah</p>
    <?php endif ?>


    <form action="" method="POST">

        <li>
            <label for="username">Username : </label>
            <input type="text" name="username" id="username">
        </li>

        <li>
            <label for="pass">Password   : </label>
            <input type="password" name="password" id="pass">
        </li>

        <li>
            <button type="submit" name="submit"> Login </button>
        </li>

    </form>
    
</body>
</html>