<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['Registrasi']))
    {
        $nama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama']));
        $jenis_kelamin = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_kelamin']));
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
        $kon_pass = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kon_pass']));
        $level = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['level']));
        $status_akun = "Tidak Aktif";
        $on_status = "Offline";

        $nisn = "";
        $jurusan = "";
        $tingkat = "";
        $up_sts = "N";


        $db = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
        $cek_username = mysqli_num_rows($db);

        // cek username ada di database atau tidak jika ada maka akan menampilkan pesan error
        if($cek_username > 0)
        {
            $_SESSION['val'] = "<div class='alert alert-info bg-info text-white' id='auto-close'>Username <b>$username</b> Sudah Terdaftar Di Database</div>";
            header('location: ../registrasi/');
        }else{
            if($password == $kon_pass)
            {
                $reg = mysqli_query($koneksi, "INSERT INTO user VALUES(NULL, '$nama','$jenis_kelamin','$username','$password','$level','$status_akun','$on_status','Antrian')");

                
                if($_POST['level'] == "Siswa")
                {
                    $reg = mysqli_query($koneksi, "INSERT INTO identitas_siswa VALUES(NULL, '$nama', '$jenis_kelamin', '$nisn', '$jurusan', '$tingkat', '$up_sts', '$username')");
                }

                if($reg)
                {
                    $_SESSION['val'] = '<div class="alert alert-success bg-success text-white"><b>Registrasi Berhasil DiLakukan ! Silahkan Tunggu 1 x 24 Jam untuk konfirmasi akun lalu melakukan login. Terima Kasih</b></div>';
                    header('location: ../registrasi/');
                }
            }else{
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white"><b>Gagal ! Konfirmasi Password Tidak Sama</b></div>';
                    header('location: ../registrasi/');
            }
        }
    }
?>