<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['delete']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            
            $q = mysqli_query($koneksi, "SELECT * FROM pc WHERE id='$id'");

            $data = mysqli_fetch_assoc($q);

            $file_pc = $data['foto_pc'];
            $file_monitor = $data['foto_monitor'];
            $file_mouse = $data['foto_mouse'];
            $file_key = $data['foto_keyboard'];

            unlink('../assets/img/komponen/'.$file_pc);
            unlink('../assets/img/komponen/'.$file_monitor);
            unlink('../assets/img/komponen/'.$file_mouse);
            unlink('../assets/img/komponen/'.$file_key);

            $delete = mysqli_query($koneksi, "DELETE FROM pc WHERE id='$id'");

            if($delete)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                            <div class="alert-message">
                                                <b>Berhasil!</b> Delete Data Detail PC
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                            <div class="alert-message">
                                                <b>Berhasil!</b> Delete Data Detail PC
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }
        }
    }