<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));
        $password_lama = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password']));
        $password_baru = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['password_baru']));
        $konfirmasi_password = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['konfirmasi_password']));

        // ambil data dari database
        $db = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password_lama'");
        $cek_pass = mysqli_num_rows($db);
        
        // cek apakah password lama sesuai atau tidak
        if($cek_pass > 0)
        {
            // jika password baru dan konfirmasi password sesuai
            if($password_baru == $konfirmasi_password)
            {
                // jika password baru dalam keadaan kosong
                if(empty($password_baru))
                {
                    $message = "Gagal !";
                    $isi = "Password Baru Kosong !";

                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../admin/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../petugas_lab/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Kepsek")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../kepsek/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Siswa")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../siswa/?page=update_password');
                    }
                }else{
                    // lakukan update jika sudah terisi dan sesuai

                    $update = mysqli_query($koneksi, "UPDATE user SET password='$password_baru' WHERE username='$username'");

                    if($update)
                    {
                        $message = "Berhasil !";
                        $isi = "Update Password";

                        if($_SESSION['level'] == "Admin")
                        {
                            $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                                    <div class='alert-message'>
                                                        <b>$message</b> $isi
                                                    </div>
                                                </div>";
                                                header('location: ../admin/?page=update_password');
                        }
                        elseif($_SESSION['level'] == "Petugas Lab")
                        {
                            $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                                    <div class='alert-message'>
                                                        <b>$message</b> $isi
                                                    </div>
                                                </div>";
                                                header('location: ../petugas_lab/?page=update_password');
                        }
                        elseif($_SESSION['level'] == "Kepsek")
                        {
                            $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                                    <div class='alert-message'>
                                                        <b>$message</b> $isi
                                                    </div>
                                                </div>";
                                                header('location: ../kepsek/?page=update_password');
                        }
                        elseif($_SESSION['level'] == "Siswa")
                        {
                            $_SESSION['val'] = "<div class='alert alert-success bg-success text-white'>
                                                    <div class='alert-message'>
                                                        <b>$message</b> $isi
                                                    </div>
                                                </div>";
                                                header('location: ../siswa/?page=update_password');
                        }
                    }
                }
            }
            else{
                // jika konfirmasi password dalam keadaan kosong
                if(empty($konfirmasi_password))
                {
                   $message = "Gagal !";
                   $isi = "Konfirmasi Password Kosong !";

                   if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../admin/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../petugas_lab/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Kepsek")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../kepsek/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Siswa")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../siswa/?page=update_password');
                    }
                }else{
                     // jika tidak sama
                    $message = "Gagal !";
                    $isi = "Konfirmasi Password Tidak Sesuai";

                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../admin/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../petugas_lab/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Kepsek")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../kepsek/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Siswa")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../siswa/?page=update_password');
                    }
                }
            }
        }
        else{
            // jika password lama dalam keadaan kosong !
            if(empty($password_lama)){
                $message = "Gagal !";
                $isi = "Password Lama Kosong !";
    
                if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../admin/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../petugas_lab/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Kepsek")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../kepsek/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Siswa")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../siswa/?page=update_password');
                    }
            }else{
                // jika tidak sesuai
                $message = "Gagal !";
                $isi = "Password Lama Tidak Sesuai";

                if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../admin/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../petugas_lab/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Kepsek")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../kepsek/?page=update_password');
                    }
                    elseif($_SESSION['level'] == "Siswa")
                    {
                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white'>
                                                <div class='alert-message'>
                                                    <b>$message</b> $isi
                                                </div>
                                            </div>";
                                            header('location: ../siswa/?page=update_password');
                    }
                }
        }
    }
?>