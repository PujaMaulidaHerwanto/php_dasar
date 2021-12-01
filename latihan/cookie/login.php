<?php

    session_start();
    require 'function.php';

    //cek cookie

    if (isset($_COOKIE['coo']) && isset($_COOKIE['key'])) {
        $id = $_COOKIE['coo'];
        $key = $_COOKIE['key'];

        //ambilusername berdasarkan id

        $result = mysqli_query($conn, "SELECT username FROM user WHERE
                                id = $id");
        
        $row = mysqli_fetch_assoc($result);

        // cek cookie dan username
        if ($key === hash('sha256', $row['username'])) {
            $_SESSION['login'] = true;
        }

    }

    if (isset($_SESSION['login'])) {
        header("Location: index.php");
        exit;
    }

    if (isset($_POST['login'])) {

        $username = $_POST["username"];
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT * FROM user WHERE
                        username = '$username'
                    ");
        
        if (mysqli_num_rows($result) === 1 ) {
            $row = mysqli_fetch_assoc($result);

            //mengecek pass itu sama tidak dengan ver hash nya
           if ( password_verify($password, $row["password"]) ) {

            // cek remember me
            if (isset($_POST["remember"])) {

                setcookie('coo', $row['id'], time() + 60 );
                setcookie('key', hash('sha256', $row['username']), time() + 60 );
            }

            // //set session
            $_SESSION["login"] = true;


            echo "
                    <script>
                        alert('Selamat Datang');
                        document.location.href = 'index.php';
                    </script>
                ";
           } 
        }
        
        $error = true;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <style>
        li{
            margin-top: 10px;
        }
        p{
            color: red;
            font-weight: bold;
        }

    </style>

</head>
<body>
    
    <h1>Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <p> Username/Password yang anda masukan salah </p>
    <?php endif?>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username"> USERNAME : </label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password"> PASSWORD : </label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember"> Remember Me : </label>
            </li>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>

    </form>
    
</body>
</html>