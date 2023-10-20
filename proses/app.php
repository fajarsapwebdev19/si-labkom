<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['app']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status']));

            $table = "penggunaan_komputer";
            $sql = "UPDATE $table SET status='$status' WHERE id='$id'";
            $app = mysqli_query($koneksi, $sql);

            $pesan_berhasil = '<b>Berhasil !</b> Approve Pengajuan Penggunaan Komputer';

            if($app)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'>
                                                $pesan_berhasil
                                            </div>
                                        </div>";
                                        header('location: ../admin/?page=ver_mkp');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'>
                                                $pesan_berhasil
                                            </div>
                                        </div>";
                                        header('location: ../petugas_lab/?page=ver_mkp');
                }
            }
        }
    }
?>