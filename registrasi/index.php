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

    <link rel="shortcut icon" href="../assets/img/smk.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/login/css/bootstrap.min.css">

    <style>
    @font-face{
        font-family: "Quicksand";
        src:url("../assets/font/Quicksand/static/Quicksand-Regular.ttf");
    }


    body {
        font-family: "Quicksand", sans-serif;
        margin-top: 20px;
        background-color: #fff;
    }

    .content{
        padding: 3rem 0;
    }

    .content a{
        text-decoration: none;
        color: darkgrey;
    }

    .content a:hover{
          color: darkblue;
    }

    label{
        font-size: 14px;
    }

    .form-control{
        font-size: 14px;
    }
    </style>

    <title>Login - SIBL Komputer</title>
</head>

<body>



    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="../assets/login/images/regis.png" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="mb-4">
                                <h3>Registrasi Akun</h3>
                            </div>
                            <!-- validasi ketika si user salah password -->
                            <?php
                                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                                {
                                    echo $_SESSION['val'];
                                    unset($_SESSION['val']);
                                }
                            ?>
                            <form action="../proses/save_registrasi.php" class="needs-validation" method="post" autocomplete="off" novalidate>
                                <div class="form-group first">
                                    <label for="nama">Nama</label>
                                    <input type="text" name="nama" class="form-control" required>
                                    <div class="invalid-feedback">Nama Wajib Di Isi</div>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Jenis Kelamin</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="inlineRadio1" value="Laki-Laki" required>
                                        <label class="form-check-label" for="inlineRadio1">L</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin"
                                            id="inlineRadio2" value="Perempuan" required>
                                        <label class="form-check-label" for="inlineRadio2">P</label>
                                    </div>
                                </div>
                                <div class="form-group first">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                    <div class="invalid-feedback">Username Wajib Di Isi</div>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <div class="invalid-feedback">Wajib Di Isi</div>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Konfirmasi Password</label>
                                    <input type="password" name="kon_pass" class="form-control" required>
                                    <div class="invalid-feedback">Wajib Di Isi</div>
                                </div>
                                <div class="form-group last mb-4">
                                    <label for="password">Level</label>
                                    <select name="level" class="form-control" required>
                                        <option value="">-- Pilih Level --</option>
                                        <option>Admin</option>
                                        <option>Petugas Lab</option>
                                        <option value="Kepsek">Kepala Sekolah</option>
                                        <option>Siswa</option>
                                    </select>
                                    <div class="invalid-feedback">Wajib Pilih Salah Satu</div>
                                </div>
                                <button type="submit" name="Registrasi" class="btn btn-block btn-primary"> Registrasi
                                </button>

                                <div class="mt-2 text-center">
                                    Sudah Punya Akun ? <a href="../">Login</a>
                                </div>
                            </form>
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
</body>

</html>