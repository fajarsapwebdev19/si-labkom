<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['terima']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $status = "Terima";

            $verifikasi = mysqli_query($koneksi, "UPDATE peminjaman_alat_praktik SET status='$status' WHERE id='$id'");

            if($verifikasi)
            {
                $message = "Berhasil!";
                $isi = "Approv Data Peminjaman Alat Praktik";

                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../admin/?page=ver_alt');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../petugas_lab/?page=ver_alt');
                }
            }
        }
    }elseif(isset($_POST['tolak']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $status = "Tolak";

            $verifikasi = mysqli_query($koneksi, "UPDATE peminjaman_alat_praktik SET status='$status' WHERE id='$id'");

            if($verifikasi)
            {
                $message = "Berhasil!";
                $isi = "Tolak Data Peminjaman Alat Praktik";

                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../admin/?page=ver_alt');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../admin/?page=ver_alt');
                }
            }
        }
    }
?>