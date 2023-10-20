<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $nama_pengguna = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_pengguna']));
            // $komputer = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['komputer']));
            $tanggal_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tanggal_penggunaan']));
            $waktu_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['waktu_penggunaan']));

            $table = "penggunaan_komputer";
            $sql = "UPDATE $table SET tanggal_penggunan='$tanggal_penggunaan', waktu_penggunan='$waktu_penggunaan' WHERE id='$id'";
            $update = mysqli_query($koneksi, $sql);

            if($update)
            {
                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                        <div class="alert-message">
                                            <b>Berhasil !</b> Ubah Data Pengajuan !
                                        </div>
                                    </div>';
                                    header('location: ../siswa/?page=pgn_kom');
            }
        }
    }
?>