<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['validasi']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $sts_akun = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['sts_akun']));
            $registrasi_status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['registrasi_status']));

            $validasi = mysqli_query($koneksi, "UPDATE user SET sts_akun='$sts_akun', registrasi_status='$registrasi_status' WHERE id='$id'");

            if($validasi)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil</b> Validasi Registrasi Akun
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=app_reg');
            }
        }
    }