<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['oke']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));

            $table = "penggunaan_komputer";
            $sql = "DELETE FROM $table WHERE id='$id'";
            $delete = mysqli_query($koneksi, $sql);

            if($delete)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil !</b> Hapus Data Pengajuan !
                                        </div>
                                    </div>';
                                    header('location: ../siswa/?page=pgn_kom');
            }
        }
    }
?>