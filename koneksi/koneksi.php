<?php
    date_default_timezone_set("Asia/Jakarta");
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'si_labkom';

    $koneksi = mysqli_connect($server, $username, $password, $database);
?>