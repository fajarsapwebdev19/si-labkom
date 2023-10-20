<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $nama_pc = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_pc']));
            $motherboard = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['motherboard']));
            $ram = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['ram']));
            $processor = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['processor']));
            $keyboard = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['keyboard']));
            $mouse = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['mouse']));
            $status_jaringan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_jaringan']));
            $monitor = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['monitor']));
            $model_hdd = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['model_hdd']));
            $kapasitas_hdd = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kapasitas_hdd']));
            $system_operasi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['system_operasi']));
            $status_pc = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_pc']));


            $update = mysqli_query($koneksi, "UPDATE pc SET nama_pc='$nama_pc', motherboard='$motherboard', ram='$ram', processor='$processor', keyboard='$keyboard', mouse='$mouse', status_jaringan='$status_jaringan', monitor='$monitor', hdd_model='$model_hdd', kapasitas_hdd='$kapasitas_hdd', system_operasi='$system_operasi', status_pc='$status_pc' WHERE id='$id'");

            if($update)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                            <div class="alert-message">
                                                <b>Berhasil !</b> Data PC Berhasil Di Ubah
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                            <div class="alert-message">
                                                <b>Berhasil !</b> Data PC Berhasil Di Ubah
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }
        }
    }
?>