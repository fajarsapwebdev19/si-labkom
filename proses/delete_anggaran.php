<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['delete']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));

            $select = mysqli_query($koneksi, "SELECT * FROM rencana_anggaran WHERE id='$id'");

            $data = mysqli_fetch_assoc($select);

            $foto_dir = $data['foto_alat'];
            
            unlink('../assets/img/buy/'.$foto_dir);

            $delete = mysqli_query($koneksi, "DELETE FROM rencana_anggaran WHERE id='$id'");

            if($delete)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                            <div class="alert-message">
                                                <b>Berhasil !</b> Hapus Data Anggaran
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=lap_buy');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                            <div class="alert-message">
                                                <b>Berhasil !</b> Hapus Data Anggaran
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=lap_buy');
                }
            }
        }
    }
?>