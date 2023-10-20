<?php
session_start();
include 'koneksi/koneksi.php';

$username = $_SESSION['username'];

$q = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");

$data = mysqli_fetch_assoc($q);

$username = $data['username'];

$offline = mysqli_query($koneksi, "UPDATE user SET on_status='Offline' WHERE username='$username'");


session_reset();
session_unset();

header('location: ../si_baranglab/');