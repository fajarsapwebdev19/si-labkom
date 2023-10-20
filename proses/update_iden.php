<?php
    session_start();
    require '../koneksi/koneksi.php';
    if(isset($_POST['update']))
    {
       if(isset($_POST['username']))
       {
            $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
            $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_kelamin']));
            $nisn = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nisn']));
            $jurusan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jurusan']));
            $tingkat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['tingkat']));
            $update = "Y";
            $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
                        
            $update = mysqli_query($koneksi, "UPDATE identitas_siswa SET nama='$nama',jenis_kelamin='$jenis_kelamin',nisn='$nisn',jurusan='$jurusan',tingkat='$tingkat',kon_update='$update' WHERE username='$username'");
                        
            $update .= mysqli_query($koneksi, "UPDATE user SET nama='$nama', jenis_kelamin='$jenis_kelamin' WHERE username='$username'");
                        
            if($update)
            {
                $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                        <div class='alert-message'><b>Terima Kasih !</b> Sudah Melakukan Update Identitas</div>
                                    </div>";
                                    header('location: ../siswa/');
            }
       }            
    }
