<?php

    $angka = [
        [23, 3, 7],
        [22, 11, 1],
        [13, 5, 4]
    ];

//cara menampilkan array dimensi

// echo $angka[0][2];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan lagi</title>
    <style>
        .kotak{
            width : 50px;
            height : 50px;
            background-color : magenta;
            text-align : center;
            line-height : 50px;
            margin : 3px;
            float : left;
            transition : 1s;
        }

        .kotak:hover{
            transform: rotate(360deg);
            border-radius : 50%;
        }

        .clear{
            clear : both;
        }
    </style>
</head>
<body>
    
    <?php foreach($angka as $ar1) : ?>

        <?php foreach($ar1 as $isi) { ?>

            <div class="kotak"><?php echo $isi?></div>

        <?php } ?>
        
        <div class="clear"></div>

    <?php endforeach?>



</body>
</html>