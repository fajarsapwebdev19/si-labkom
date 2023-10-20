<?php
    session_start();
    include '../koneksi/koneksi.php';

    // jika user tidak melakukan login dan iseng langsung ke halaman dashboad sesuai admin maka akan di lempar ke halaman login kembali
    if(!$_SESSION['login'] == "Oke")
    {
        $_SESSION['val_siswa'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close"><b>Anda Belum Login !</b></div>';
        header('location: ../');
    }
    // jika akun tidak aktif maka sistem akan menolak dan mengembalikannya ke halaman login
    else if($_SESSION['sts_akun'] == "Tidak Aktif")
    {
        $_SESSION['val_siswa'] = '<div class="alert alert-warning bg-warning text-black" id="auto-close"><b>Akun Tidak Aktif !</b></div>';
        header('location: ../');
    }

    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM user WHERE username='$username'";
    $q = mysqli_query($koneksi, $SQL);
    $siswa = mysqli_fetch_assoc($q);

    if($siswa['sts_akun'] == "Tidak Aktif")
    {
        echo '<script>
            alert("Upps !!! Akun Di Blokir Secara Paksa");
            document.location.href="../logout.php";
        </script>';
    }

    if($_SESSION['level'] == 'Admin')
    {
        if($_SESSION['level'] != 'Siswa')
        {
            header('location: ../admin/');
        }
    }
    elseif($_SESSION['level'] == 'Petugas Lab')
    {
        if($_SESSION['level'] != 'Siswa')
        {
            header('location: ../petugas_lab/');
        }
    }
    elseif($_SESSION['level'] == 'Kepsek')
    {
        if($_SESSION['level'] != 'Siswa')
        {
            header('location: ../kepsek/');
        }
    }


    if(empty($_COOKIE['online'] == 'true'))
    {

        $offline = mysqli_query($koneksi, "UPDATE user SET on_status='Offline' WHERE username='$username'");

        $_SESSION['val'] = '<div class="alert alert-danger text-white bg-danger">
                                <b>Sesi Login Anda Habis !</b>
                            </div>';
        
        header('location: ../logout.php');
        
    }

    
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../assets/img/smk.png" type="image/x-icon">

	<link rel="canonical" href="../assets/admin/index.htm">

	<title><?php include 'templates/title/title.php'; echo $title;?></title>

	<link href="../assets/admin/css2.css?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<link href="../assets/admin/css/dark.css" rel="stylesheet">

    <link class="js-stylesheet" href="../assets/admin/css/light.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../assets/datepicker/datepicker/css/datepicker.min.css">

    <!-- <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css"> -->

   
	<style>
        @font-face {
            font-family: "Quicksand";
            src:url('../assets/font/Quicksand/static/Quicksand-Regular.ttf');
        }
        
		body {
            font-family: "Quicksand", sans-serif;
			opacity: 0;
		}
	</style>

<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-120946860-10', { 'anonymize_ip': true });
</script>

	</head>
<!--
  HOW TO USE: 
  data-theme: default (default), dark, light, colored
  data-layout: fluid (default), boxed
  data-sidebar-position: left (default), right
  data-sidebar-layout: default (default), compact
-->

<body data-theme="default" data-layout="fluid" data-sidebar-position="left" data-sidebar-layout="default">
    <div class="wrapper">
        <?php include 'templates/sidebar/sidebar.php'; ?>

        <div class="main">
            <?php include 'templates/header/header.php'; ?>
            <main class="content">
                <?php include 'templates/page/page.php'; ?>
            </main>
        </div>
    </div>
<script src="../assets/jquery-3.5.1.js"></script>
<!-- <script src="../assets/bootstrap/js/bootstrap.min.js"></script> -->
<script src="../assets/admin/js/app.js"></script>

<script src="../assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/datepicker/datepicker/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function(){
        $(".tgl").datepicker({
            autoHighlight: true,
            autoClose: true,
            format: 'dd-mm-yyyy'
        });
    });

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
        $(document).ready(function() {
            $('#example').DataTable();
        });

        $(document).ready(function() {
            $('#example2').DataTable();
        });

        $(document).ready(function() {
            $('#example3').DataTable();
        });
    </script>

    <?php
            
        $username = $siswa['username'];
        $q = mysqli_query($koneksi, "SELECT * FROM identitas_siswa WHERE username='$username'");
        $c = mysqli_fetch_assoc($q);
        
        if($c['kon_update'] == "N")
        {
            ?>
                <script type="text/javascript">
                    var myModal = new bootstrap.Modal(document.getElementById("exampleModal"), {});
                    document.onreadystatechange = function () {
                    myModal.show();
                    };
                    
                    function getkey(e) {
                        if (window.event)
                            return window.event.keyCode;
                        else if (e)
                            return e.which;
                        else
                            return null;
                    }

                    function goodchars(e, goods, field) {
                        var key, keychar;
                        key = getkey(e);
                        if (key == null) return true;

                        keychar = String.fromCharCode(key);
                        keychar = keychar.toLowerCase();
                        goods   = goods.toLowerCase();

                        // check goodkeys
                        if (goods.indexOf(keychar) != -1)
                            return true;
                        // control keys
                        if ( key==null || key==0 || key==8 || key==9 || key==27 )
                            return true;
                            
                        if (key == 13) {
                            var i;
                            for (i = 0; i < field.form.elements.length; i++)
                                if (field == field.form.elements[i])
                                    break;
                                    i = (i + 1) % field.form.elements.length;
                                    field.form.elements[i].focus();
                                return false;
                            };
                            // else return false
                        return false;
                    }
                </script>
            <?php
               
        }
                
    ?>


</body>
</html> 