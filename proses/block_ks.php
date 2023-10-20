<?php
    session_start();

    include '../koneksi/koneksi.php';

    if(isset($_POST['block']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $sts = "Tidak Aktif";

            $block = mysqli_query($koneksi, "UPDATE user SET sts_akun='$sts' WHERE id='$id'");

            if($block)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil</b>  Blokir Akun !
                                        </div>
                                    </div>';
                header('location: ../admin/?page=acn_ks');
            }
        }
    }
?>