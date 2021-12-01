 <?php
 
 // Variabel Scope / Lingkup Variabel

$x = 10; // variabel lokal untuk seisi halaman ini

function tampil(){
    $x = 20; 
    // variabel lokal untuk function itu saja 
    echo $x;
}

function tampilX(){
    global $x;
    // mengambil $x diluar function
    echo $x;
}

tampil();
echo "<br>";
echo $x;
echo "<br>";
tampilX();

?>