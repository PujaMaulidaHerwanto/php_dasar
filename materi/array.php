<?php
    $angka = [23, 13, 7, 5, 8, 4, 5, 22, 11];

    //array itu pasangan ataran key dan value
    //key nya itu index yang dimulai dari 0
    //elemen pada array boleh memiliki tipe data yang berbeda
    // kalau ada error "array to string bla bla bla" itu karena Array gak bisa di tampilkan pakai echo
    // maka dari itu coba pakai var_dump atau print_r

    //cara menampilkan 1 elemen array
    // echo $angka[1];

    //pegulangan pada array
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan</title>
    <style>
        .kotak{
            width : 50px;
            height : 50px;
            background-color : magenta;
            text-align : center;
            line-height : 50px;
            margin : 3px;
            float : left;
        }

        .clear{
            clear : both;
        }
    </style>
</head>
<body>
    <?php for ($i=0; $i < count($angka); $i++) { ?>
        <div class="kotak"> <?php echo $angka[$i]; ?> </div>
    <?php } ?>
      
    <div class="clear"></div>
    
    <?php foreach($angka as $isinya) { ?>
        <div class="kotak"> <?php echo $isinya ?> </div>
    <?php } ?>
    
    <div class="clear"></div>
    
    <?php foreach($angka as $isinya) : ?>
        <div class="kotak"> <?= $isinya ?> </div>
    <?php endforeach ?>

</body>
</html>