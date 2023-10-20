<?php

session_start();
include '../koneksi/koneksi.php';

if(isset($_POST['ajukan']))
{
    $nama_pengguna = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_pengguna']));
    $komputer = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['komputer']));
    $tanggal_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tanggal_penggunaan']));
    $waktu_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['waktu_penggunaan']));
    $status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status']));
    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
    $kon_selesai = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_selesai']));

    $table = "penggunaan_komputer";
    $query = "INSERT INTO $table VALUES(NULL, '$nama_pengguna','$komputer','$tanggal_penggunaan','$waktu_penggunaan','$status','$username','$kon_selesai')";
    $ajukan = mysqli_query($koneksi, $query);


    if($ajukan)
    {
        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                <div class="alert-message">
                                    <b>Berhasil</b> Pengajuan Penggunaan Komputer Di Tambahkan !
                                </div>
                            </div>';
                            header('location: ../siswa/?page=pgn_kom');
    }
    
}