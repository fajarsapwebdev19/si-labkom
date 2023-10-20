<?php
    session_start();
    include '../koneksi/koneksi.php';
    
    if(isset($_POST['delete']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            
            $delete = mysqli_query($koneksi, "DELETE FROM user WHERE id='$id'");

            if($delete)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil</b> Hapus Akun
                                        </div>
                                    </div>';
                header('location: ../admin/?page=acn_adm');
            }
        }
    }
?>