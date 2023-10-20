<?php
     include 'koneksi/koneksi.php';
     $val = '';
     
    if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($koneksi, $_POST['username']);
        $password = mysqli_real_escape_string($koneksi, $_POST['password']);

        $select = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

        $cek = mysqli_num_rows($select);

        if($cek > 0)
        {
            $data = mysqli_fetch_assoc($select);

            
            $_SESSION['level'] = $data['level'];

            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['sts_akun'] = $data['sts_akun'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['login'] = "Oke";
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['id'] = $data['id'];
                setcookie('online', 'true', time() + (60 * 300), '/');

                $username = $data['username'];

                $online = mysqli_query($koneksi, "UPDATE user SET on_status='Online' WHERE username='$username'");

                header('location: admin/');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['sts_akun'] = $data['sts_akun'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['login'] = "Oke";
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['id'] = $data['id'];
                setcookie('online', 'true', time() + (60 * 300), '/');

                $username = $data['username'];

                $online = mysqli_query($koneksi, "UPDATE user SET on_status='Online' WHERE username='$username'");
                header('location: petugas_lab/');
            }
            elseif($_SESSION['level'] == "Kepsek")
            {
                $_SESSION['sts_akun'] = $data['sts_akun'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['login'] = "Oke";
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['id'] = $data['id'];
                setcookie('online', 'true', time() + (60 * 300), '/');

                $username = $data['username'];

                $online = mysqli_query($koneksi, "UPDATE user SET on_status='Online' WHERE username='$username'");
                header('location: kepsek/');
            }
            elseif($_SESSION['level'] == "Siswa")
            {
                $_SESSION['sts_akun'] = $data['sts_akun'];
                $_SESSION['username'] = $data['username'];
                $_SESSION['login'] = "Oke";
                $_SESSION['nama'] = $data['nama'];
                $_SESSION['id'] = $data['id'];
                setcookie('online', 'true', time() + (60 * 300), '/');

                $username = $data['username'];

                $online = mysqli_query($koneksi, "UPDATE user SET on_status='Online' WHERE username='$username'");
                header('location: siswa/');
            }
        }else{
            $val = '<div class="alert alert-danger bg-danger text-white" id="auto-close"><b>Username Dan Password Salah !</b></div>';
        }
    }
?>