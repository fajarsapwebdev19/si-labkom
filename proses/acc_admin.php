<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['acc']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $kondisi_awal = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kondisi_awal']));
            $kondisi_akhir = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kondisi_akhir']));
            $status = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status']));

            $acc = mysqli_query($koneksi, "UPDATE selesai_peminjaman_alat SET kondisi_awal='$kondisi_awal', kondisi_akhir='$kondisi_akhir', status='$status' WHERE id='$id'");
            if($acc)
            {
                if($status == "Terima")
                {
                    $message = "Berhasil!";
                    $isi = "Terima Pengajuan Selesai Peminjaman Alat";
                }
                elseif($status == "Tolak")
                {
                    $message = "Berhasil!";
                    $isi = "Tolak Pengajuan Selesai Peminjaman Alat";
                }

                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../admin/?page=ver_bck');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                            <div class='alert-message'>
                                                <b>$message</b> $isi
                                            </div>
                                        </div>";
                                        header('location: ../petugas_lab/?page=ver_bck');
                }
            }
        }
    }
?>
