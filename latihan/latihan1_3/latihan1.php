<?php

$dreamies = [
    ["Mark", "020899", "Canada", "Mark Lee // Lee Min Hyung"],
    ["Renjun", "230300", "Chinese", "Huang Ren jun"],
    ["Jeno", "230400", "South Korea", "Lee Je No"]

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just About Dream</title>
</head>
<body>

    <h1>NCT Dream </h1>

    <?php foreach($dreamies as $member) : ?>
        <ul>
            <li> <?php echo $member[0]; ?> </li>
            <li> <?php echo $member[1]; ?> </li>
            <li> <?php echo $member[2]; ?> </li>
            <li> <?php echo $member[3]; ?> </li>
        </ul>
    <?php endforeach?>
</body>
</html>