<?php 
    session_start();
    $koneksi = mysqli_connect("localhost","root","","kasur");

    if(mysqli_connect_errno()){
        echo "koneksi database gagal :". mysqli_connect_error();
    }


    ?>