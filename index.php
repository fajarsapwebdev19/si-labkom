<?php
    session_start();
    include 'proses_login.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="assets/login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="assets/login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/login/css/bootstrap.min.css">

    <!-- Style -->
    <link rel="stylesheet" href="assets/login/css/style.css">

    <!-- icon -->

    <link rel="shortcut icon" href="assets/img/smk.png" type="image/x-icon">

    <style>
        @font-face {
         font-family: "Quicksand";
         src: url('assets/font/Quicksand/static/Quicksand-Regular.ttf');
        }

        body{
            background-color: #fff;
            font-family: Quicksand,sans-serif;
        }

        .content{
            padding: 4rem 0;
        }

        .content a{
            text-decoration: none;
        }

        .content a:hover{
            color: darkblue;
        }

        .content .text-link{
            font-size: 14px;
        }

        .form-control{
            font-size: 10px;
        }
    </style>

    <title>Login - SIBL Komputer</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/login/images/lab.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Login Sistem Informasi Barang Lab Komputer</h3>
                                <h2>SMK PGRI NEGLASARI</h2>
                                <p class="mb-4">Aplikasi Sistem Informasi Barang Lab Komputer</p>
                            </div>
                            <!-- validasi ketika si user salah password -->
                            <?php
                                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                                {
                                    echo $_SESSION['val'];
                                    unset($_SESSION['val']);
                                }
                                elseif(isset($_SESSION['val_siswa']) && $_SESSION['val_siswa'] !='')
                                {
                                    echo $_SESSION['val_siswa'];
                                    unset($_SESSION['val_siswa']);
                                }
                                
                                echo $val;
                            ?>
                            <form action="" method="post" class="needs-validation" novalidate autocomplete="off">
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>

                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-block btn-primary"> Login </button>

                                <div class="mt-3 text-center text-link">
                                    Belum Punya Akun ? <a href="registrasi/">Registrasi</a>
                                </div>
                                <div class="mt-3 text-center text-link">
                                    Tidak Bisa Login ? <a href="cek_akun/">Cek Akun Disini</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/login/js/jquery-3.3.1.min.js"></script>
    <script src="assets/login/js/popper.min.js"></script>
    <script src="assets/login/js/bootstrap.min.js"></script>
    <script src="assets/login/js/main.js"></script>
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

        window.setTimeout(function(){
            $("#auto-close").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 10000);
    </script>
</body>

</html>