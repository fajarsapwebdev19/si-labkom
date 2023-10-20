<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['active']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $sts = "Aktif";

            $active = mysqli_query($koneksi, "UPDATE user SET sts_akun='$sts' WHERE id='$id'");

            if($active)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil</b> Aktifkan Akun !
                                        </div>
                                    </div>';
                header('location: ../admin/?page=acn_ptl');
            }
        }
    }
?>