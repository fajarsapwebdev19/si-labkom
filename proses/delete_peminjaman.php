<?php
    session_start();
    require('../koneksi/koneksi.php');

    if(isset($_POST['delete'])){
        if(isset($_POST['id'])){
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));

            $delete = mysqli_query($koneksi, "DELETE FROM peminjaman_alat_praktik WHERE id='$id'");

            if($delete){
                $message = "Berhasil!";
                $isi = "Hapus Data Pengajuan Peminjaman Alat Lab";

                $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                        <div class='alert-message'>
                                            <b>$message</b> $isi
                                        </div>
                                    </div>";
                                    header('location: ../siswa/?page=pgn_apl');
            }
        }
    }
?>