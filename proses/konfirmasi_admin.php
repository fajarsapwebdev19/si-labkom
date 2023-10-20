<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['konfirmasi']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $kondisi_awal = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kondisi_awal']));
            $kondisi_akhir = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kondisi_akhir']));
            $status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status']));

            $konfirmasi = mysqli_query($koneksi, "UPDATE selesai_penggunaan_komputer SET kondisi_awal='$kondisi_awal', kondisi_akhir='$kondisi_akhir', status='$status' WHERE id='$id'");

            if($konfirmasi)
            {
                $message = "Berhasil !";
                $isi = "Konfirmasi Pengajuan Selesai Penggunaan Komputer";

                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'><b>$message</b> $isi</div>
                                        </div>";
                                        header('location: ../admin/?page=ver_skm');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'><b>$message</b> $isi</div>
                                        </div>";
                                        header('location: ../petugas_lab/?page=ver_skm');
                }
            }
        }
    }
?>