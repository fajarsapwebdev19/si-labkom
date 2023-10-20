<?php
    session_start();
    require ('../koneksi/koneksi.php');

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $jumlah_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jumlah_alat']));
            $tanggal_peminjaman = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tanggal_peminjaman']));
            $waktu_peminjaman = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['waktu_peminjaman']));

            $update = mysqli_query($koneksi, "UPDATE peminjaman_alat_praktik SET jumlah_alat='$jumlah_alat', tanggal_peminjaman='$tanggal_peminjaman', waktu_peminjaman='$waktu_peminjaman' WHERE id='$id'");

            if($update)
            {
                $message = "Berhasil!";
                $isi = "Update Peminjaman Alat Praktik";

                $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                        <div class='alert-message'><b>$message</b> $isi</div>
                                    </div>";
                                    header('location: ../siswa/?page=pgn_apl');
            }
        }
    }
?>