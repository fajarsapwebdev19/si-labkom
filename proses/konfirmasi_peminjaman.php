<?php
    session_start();
    require '../koneksi/koneksi.php';

    if(isset($_POST['konfir']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $konfirmasi_selesai = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_selesai']));

            // ambil data dari database
            $db = mysqli_query($koneksi, "SELECT * FROM peminjaman_alat_praktik WHERE id='$id'");
            $data = mysqli_fetch_assoc($db);

            $nama_peminjam = $data['nama_peminjam'];
            $alat_yang_dipinjam = $data['alat_yang_dipinjam'];
            $jumlah_alat = $data['jumlah_alat'];
            $tanggal_peminjaman = $data['tanggal_peminjaman'];
            $waktu_peminjaman = $data['waktu_peminjaman'];
            $kondisi_awal = "";
            $kondisi_akhir = "";
            $status_admin = $data['status'];
            $username = $data['username'];
            $status = "Menunggu";

            $konfirmasi = mysqli_query($koneksi, "UPDATE peminjaman_alat_praktik SET konfirmasi_selesai='$konfirmasi_selesai' WHERE id='$id'");
            $konfirmasi .= mysqli_query($koneksi, "INSERT INTO selesai_peminjaman_alat VALUES(NULL, '$nama_peminjam','$alat_yang_dipinjam','$jumlah_alat','$tanggal_peminjaman','$waktu_peminjaman','$kondisi_awal','$kondisi_akhir','$status_admin','$status','$username')");

            if($konfirmasi)
            {
                $message = "Berhasil!";
                $isi = "Konfirmasi Selesai Menggunakan Alat Praktik";

                $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                        <div class='alert-message'>
                                            <b>$message</b> $isi
                                        </div>
                                    </div>";
                                    header('location: ../siswa/?page=pgn_apl');
            }
        }
    }
?>