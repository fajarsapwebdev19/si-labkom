<?php
    session_start();
    include '../koneksi/koneksi.php';
    
    if(isset($_POST['oke']))
    {
        if(isset($_POST['id'])){
            $id = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['id']));
            $nama_pengguna = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_pengguna']));
            $komputer = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['komputer']));
            $tanggal_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tanggal_penggunaan']));
            $waktu_penggunaan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['waktu_penggunaan']));
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
            $konfirmasi_selesai = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_selesai']));
            $kondisi_awal = "";
            $kondisi_akhir = "";
            $status_admin = "Terima";
            $status = "Menunggu";
            

            $sql = "UPDATE penggunaan_komputer SET konfirmasi_selesai='$konfirmasi_selesai' WHERE id='$id'";
            $sql2 = "INSERT INTO selesai_penggunaan_komputer VALUES(NULL, '$nama_pengguna','$komputer','$tanggal_penggunaan','$waktu_penggunaan','$konfirmasi_selesai','$kondisi_awal','$kondisi_akhir','$status_admin','$status','$username')";
            $konfirmasi = mysqli_query($koneksi, $sql);
            $konfirmasi .= mysqli_query($koneksi, $sql2);

            if($konfirmasi)
            {   
                $pesan = "Berhasil";
                $isi = "Melakukan Konfirmasi Selesai";
                $_SESSION['val'] = "<div class='alert alert-success text-white bg-success'>
                                        <div class='alert-message'>
                                            <b>$pesan</b> $isi                                    
                                        </div>
                                    </div>";
                                    header('location: ../siswa/?page=pgn_kom');
            }
        }
    }
?>