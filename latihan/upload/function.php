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

        //upload gambar
        $foto = upload();

        //cek apakah upload() mengirimkan data agar masuk ke var foto

        if ($foto === false) {
            return false;
        }

        $query = "INSERT INTO members
                    VALUES
                    ('', '$stgname', '$rlname', '$bday', '$countries', '$foto')
                ";

        mysqli_query($conn, $query);
        
        return mysqli_affected_rows($conn);

    }

    function upload()
    {
        $namaFoto = $_FILES['foto']['name'];
        $ukuranFoto = $_FILES['foto']['size'];
        $error = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        //cek ada gambar yang diupload apa tidak

        if ($error === 4) {
            echo "<script>
                alert('Masukan Gambar Terlebih Dahulu!');
            </script>";

            return false;
        }

        //cek beneran gambar apa bukan

        $ekstensiGambar = ['jpg', 'jpeg','png'];
        $ekstensiFoto = explode('.', $namaFoto);
        // Renjun.jpg => ['Renjun', 'jpg']
        $ekstensiFoto = strtolower(end($ekstensiFoto));
        //Jadi, setelah di expload atau dipecah, diambil ekstensi bagian akhir nya lalu dijadikan huruf kecil semua

        //mengecek apakah ekstensi foto nya sesuai dengan yang ada di dalam ekstensi gambar
        if (!in_array($ekstensiFoto, $ekstensiGambar)) {
            echo "<script>
                alert('Yang diupload bukan gambar');
            </script>";

            return false;
        }

        //cek size gambar
        if ($ukuranFoto > 1000000) {
            echo "<script>
                alert('Ukuran Gambar Terlalu Besar');
            </script>";

            return false;
        }

        //upload gambar

        // move_uploaded_file($tmpName, '../img/' . $namaFoto);

        // return $namaFoto;

        //buat nama gambar baru

        $namaFotoBaru = uniqid();
        $namaFotoBaru .= ".";
        $namaFotoBaru .= $ekstensiFoto;
        move_uploaded_file($tmpName, '../img/' . $namaFotoBaru);

        return $namaFotoBaru;

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
        $fotoLama = htmlspecialchars($data["fotoLama"]);

        //user ganti gambar apa tidak

        if ($_FILES['foto']['error'] === 4 ) {
        //jika user tidak mengganti foto maka, 
            $foto = $fotoLama;
        }
        else {
            $foto = upload();
        }
        

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