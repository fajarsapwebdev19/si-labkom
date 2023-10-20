<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['merge']))
    {
        $reg_sts = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['registrasi_status']));

        $mergered = mysqli_query($koneksi, "DELETE FROM user WHERE registrasi_status='$reg_sts'");

        if($mergered)
        {
            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                    <div class="alert-message">
                                        <b>Berhasil !</b> Mergered Data
                                    </div>
                                </div>';
                                header('location: ../admin/?page=app_reg');
        }
    }
?>