<?php
    include '../koneksi/koneksi.php';
    session_start();

    if(isset($_POST['delete']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];

            // foto_lama 
            $database  = mysqli_query($koneksi, "SELECT * FROM alat_praktik WHERE id='$id'");

            $data = mysqli_fetch_assoc($database);
            
            $foto_berkas = $data['foto_alat'];

            unlink('../assets/img/alat_praktik/'.$foto_berkas);

            $delete = mysqli_query($koneksi, "DELETE FROM alat_praktik WHERE id='$id'");

            if($delete)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                            <div class="alert-message">
                                                <b>Berhasil</b> Hapus Data Alat Praktik !
                                            </div>
                                        </div>';
                    header('location: ../admin/?page=rkp_apl');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                            <div class="alert-message">
                                                <b>Berhasil</b> Hapus Data Alat Praktik !
                                            </div>
                                        </div>';
                    header('location: ../petugas_lab/?page=rkp_apl');
                }
            }
        }
    }
?>