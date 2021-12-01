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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    <h1>Nama Member</h1>

    <ul>

        <?php foreach ($garis00 as $nama) : ?>

            <li> <a href= "latihan3lagi.php?stgname=<?= $nama["stgname"];?>&bday=<?= $nama["bday"];?>
                &countries=<?= $nama["countries"];?>&rlname=<?= $nama["rlname"];?>&foto=<?= $nama["foto"];?> ">
                <?php echo $nama["stgname"]; ?> 
            </a> </li>

        <?php endforeach?>


    </ul>
    
</body>
</html>