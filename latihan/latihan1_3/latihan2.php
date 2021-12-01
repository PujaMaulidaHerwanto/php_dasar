<?php

$garis00 = [
        [
            "foto" => "Renjun.jpg",
            "stgname" => "Renjun",
            "bday" => "230300",
            "countries" => "Chinese",
            "rlname" => "Huang Ren Jun"
        ],
        [
            "stgname" => "Jeno",
            "bday" => "230400",
            "foto" => "Jeno.jpg",
            "countries" => "South Korea",
            "rlname" => "Lee Jeno"
        ],
        [
            "foto" => "Jaemin.jpg",
            "stgname" => "Jaemin",
            "bday" => "130800",
            "countries" => "South Korea",
            "rlname" => "Na Jaemin"
        ],
        [
            "foto" => "Yangyang.jpg",
            "stgname" => "Yangyang",
            "bday" => "101000",
            "countries" => "Chinese",
            "rlname" => "Liu Yangyang"
        ]

    ];

    //Array Associative sama saja seperti array biasa hanya yang membedakan 
    // key pada array associative berbentuk string dan dibuat sendiri oleh kita
    //urutan dalam array associative tidak berpengaruh!!

    //cara menampilkan nya :
    // echo $garis00["stgname"];

    // echo $garis00[2]["stgname"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>00z</title>
    <style>
        body{
            margin : 20px;
        }
        img{
            width :100px;
            height :100px;
        }
    </style>
</head>
<body>

    <h1>It's NCT's 00z</h1>

    <?php foreach($garis00 as $nama) :?>
        <ul>
            <li>
                <img src="../img/<?php echo $nama["foto"];?>">
            </li>
            <li> Name          : <?php echo $nama["stgname"]; ?> </li>
            <li> Birthday Date : <?php echo $nama["bday"]; ?> </li>
            <li> Countries     : <?php echo $nama["countries"]; ?> </li>
            <li> Birth Name    : <?php echo $nama["rlname"]; ?> </li>
        </ul>
    <?php endforeach?>

</body>
</html>