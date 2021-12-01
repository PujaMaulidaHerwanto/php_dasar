<?php

    //Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    //ambil data members (query members)
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);

        //wadah penampungan array
        $rows = [];

        while ( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data)
    {
        global $conn;

        //var data
        $stgname = htmlspecialchars($data["stgname"]);
        $rlname = htmlspecialchars($data["rlname"]);
        $bday = htmlspecialchars($data["bday"]);
        $countries = htmlspecialchars($data["countries"]);
        $foto = htmlspecialchars($data["foto"]);

        $query = "INSERT INTO members
                    VALUES
                    ('', '$stgname', '$rlname', '$bday', '$countries', '$foto')
                ";

        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);

    }

    function hapus($id)
    {
       global $conn;

       mysqli_query($conn, "DELETE FROM members WHERE id = $id");

       return mysqli_affected_rows($conn);
    }

    function edit($data)
    {
        global $conn;

        //var data
        $id = $data["id"];
        $stgname = htmlspecialchars($data["stgname"]);
        $rlname = htmlspecialchars($data["rlname"]);
        $bday = htmlspecialchars($data["bday"]);
        $countries = htmlspecialchars($data["countries"]);
        $foto = htmlspecialchars($data["foto"]);

        $query = "UPDATE members
                    SET
                    stgname = '$stgname',
                    rlname = '$rlname',
                    bday = '$bday',
                    countries = '$countries',
                    foto = '$foto'
                    WHERE id = $id
                ";

        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);


    }

    function cari($kunci)
    {
        $kueri = "SELECT * FROM members 
                    WHERE
                    
                    stgname LIKE '%$kunci%' OR
                    rlname LIKE '%$kunci%' OR
                    bday LIKE '%$kunci%' OR
                    countries LIKE '%$kunci%' 
                    ";
        return query($kueri);
    }


?>