<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['pengajuan']))
    {
        $nama_peminjam = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_peminjam']));
        $alat_yang_dipinjam = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['alat_yang_dipinjam']));
        $jumlah_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jumlah_alat']));
        $tanggal_peminjaman = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tanggal_peminjaman']));
        $waktu_peminjaman = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['waktu_peminjaman']));
        $status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status']));
        $konfirmasi_selesai = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_selesai']));
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));

        $sql = "INSERT INTO peminjaman_alat_praktik VALUES(NULL,'$nama_peminjam','$alat_yang_dipinjam','$jumlah_alat','$tanggal_peminjaman','$waktu_peminjaman','$status','$konfirmasi_selesai','$username')";
        $ajukan = mysqli_query($koneksi, $sql);

        if($ajukan)
        {
            $message = "Berhasil !";
            $isi = "Melakukan Pengajuan Peminjaman Alat Praktik";

            $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                    <div class='alert-message'><b>$message</b> $isi</div>
                                </div>";
                                header('location: ../siswa/?page=pgn_apl');
        }
    }
?>