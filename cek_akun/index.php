<?php
    session_start();
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/login/css/bootstrap.min.css">

    <style>
    @font-face {
        font-family: "Quicksand";
        src: url('../assets/font/Quicksand/static/Quicksand-Regular.ttf');
    }
    body {
        font-family: "Quicksand", sans-serif;
        margin-top: 10px;
        background-color: #fff;
    }

    .form-cek{
        margin-top: 80px;
    }

    .text-area{
        text-align: center;
    }

    .text-area a{
        color: darkgrey;
        text-decoration: none;
    }

    .text-area a:hover{
        color: darkblue;
    }


    </style>

    <title>Login - SIBL Komputer</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/login/images/cek_akun.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center form-cek">
                        <div class="col-md-8" style="height: 150px;">
                            <div class="mb-4">
                                <h3>Cek Keaktifan Akun</h3>
                            </div>
                            <!-- validasi ketika si user salah password -->
                            <?php
                                include '../koneksi/koneksi.php';
                                
                                if(isset($_POST['cek']))
                                {
                                    $username = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['username']));

                                    $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
                                    $cek = mysqli_num_rows($data);

                                    if(empty($_POST['username']))
                                    {
                                        $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white' id='auto-close'>
                                                                Username Kosong ! Harap isikan terlebih dahulu
                                                            </div>";
                                    }else{
                                        if($cek > 0)
                                        {
                                            $sts = mysqli_fetch_object($data);

                                            if($sts->registrasi_status == "Antrian")
                                            {
                                                $_SESSION['val'] = "<div class='alert alert-warning bg-warning text-dark' id='auto-close'>Username <b>$username</b> Sedang Dalam Antrian</div>";
                                            }
                                            elseif($sts->registrasi_status == "Terima")
                                            {
                                                if($sts->sts_akun == "Aktif")
                                                {
                                                    $_SESSION['val'] = "<div class='alert alert-success bg-success text-white' id='auto-close'>Username <b>$username</b> Sudah Aktif Dan Terdaftar Pada Database Silahkan Login</div>";
                                                }
                                                elseif($sts->sts_akun == "Tidak Aktif")
                                                {
                                                    $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white' id='auto-close'>Username <b>$username</b> Tidak Aktif Dan Terdaftar Pada Database Silahkan Hubungi Admin Jika Ingin Mengaktifkan Kembali</div>";
                                                }
                                                
                                            }
                                            elseif($sts->registrasi_status == "Tolak")
                                            {
                                                $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white' id='auto-close'>Username <b>$username</b> Di Tolak Oleh Admin Hubungi Admin Jika Ingin Melakukan Registrasi Kembali</div>";
                                            }
                                        }else{
                                            $_SESSION['val'] = "<div class='alert alert-danger bg-danger text-white' id='auto-close'>
                                                    Username <b>$username</b> Tidak Terdaftar Pada Database
                                                </div>";
                                        }
                                    }
                                }
                            ?>
                            <?php
                                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                                {
                                    echo $_SESSION['val'];
                                    unset($_SESSION['val']);
                                }
                            ?>
                            <form action="" class="needs-validation" method="post" autocomplete="off" novalidate>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" name="username" class="form-control">
                                </div>
                                <button type="submit" name="cek" class="btn btn-block btn-primary"> Cek Akun </button>
                            </form>
                            <div class="mt-2 text-area">
                            <a href="../">Kembali Kehalaman Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="../assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="../assets/login/js/popper.min.js"></script>
    <script src="../assets/login/js/bootstrap.min.js"></script>
    <script src="../assets/login/js/main.js"></script>
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
            });
        }, false);
        })();
    </script>

    <script>
         window.setTimeout(function(){
            $("#auto-close").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    </script>
</body>

</html>