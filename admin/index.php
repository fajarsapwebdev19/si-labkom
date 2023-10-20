<?php
    session_start();
    include '../koneksi/koneksi.php';
    
    // apabila si user belum melakukan login

    if(!$_SESSION['login'] == "Oke")
    {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close"><b>Anda Belum Login !</b></div>';
        header('location: ../');
    }

    // apabila akun tidak aktif maka ke halaman login

    if($_SESSION['sts_akun'] == 'Tidak Aktif')
    {
        $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-black" id="auto-close"><b>Akun Tidak Aktif !</b></div>';
        header('location: ../');
    }

    // ambil data user dari database berdasarkan session username

    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM user WHERE username='$username'";
    $q = mysqli_query($koneksi, $SQL);
    $admin = mysqli_fetch_assoc($q);

    // jika keadaan si user sudah tidak aktif maka keluarkan secara paksa

    if($admin['sts_akun'] == "Tidak Aktif")
    {
        echo '<script>
            alert("Upps !!! Akun Di Blokir Secara Paksa");
            document.location.href="../";
        </script>';
    }

    // jika sesi abis maka status akan otomatis offline jika user kembali ke halaman dashboard dan akan di paksa keluar
    
    if(empty($_COOKIE['online'] == 'true'))
    {

        $offline = mysqli_query($koneksi, "UPDATE user SET on_status='Offline' WHERE username='$username'");

        $_SESSION['val'] = '<div class="alert alert-danger text-white bg-danger">
                                <b>Sesi Login Anda Habis !</b>
                            </div>';
        
        header('location: ../logout.php');
        
    }

    // security login
    // ketika user mencoba masuk ke halaman admin apabila level usernya adalah bukan admin

    if($_SESSION['level'] == "Petugas Lab")
    {
        if($_SESSION['level'] !='Admin')
        {
            ?>
            <script>
            alert('Anda Bukan Seorang Admin !!!');
            document.location.href = '../petugas_lab';
            </script>
            <?php
        }
    }
    elseif($_SESSION['level'] == "Kepsek")
    {
        if($_SESSION['level'] !='Admin')
        {
            header('location: ../kepsek/');
        }
    }
    elseif($_SESSION['level'] == "Siswa")
    {
        if($_SESSION['level'] !='Admin')
        {
            header('location: ../siswa/');
        }
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
    <meta name="keywords"
        content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="../assets/img/smk.png" type="image/x-icon">

    <link rel="canonical" href="../assets/admin/index.htm">

    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">

    <title><?php include 'templates/title/title.php'; echo $title;?></title>

    <link href="../assets/admin/css2.css?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Choose your prefered color scheme -->
    <!-- <link href="css/light.css" rel="stylesheet"> -->
    <link href="../assets/admin/css/dark.css" rel="stylesheet">

    <link class="js-stylesheet" href="../assets/admin/css/light.css" rel="stylesheet">

    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="../assets/datepicker/datepicker/css/datepicker.min.css">


    <style>
    @font-face {
        font-family: "Quicksand";
        src: url('../assets/font/Quicksand/static/Quicksand-Regular.ttf');
    }
    body {
        font-family: "Quicksand", sans-serif;
        opacity: 0;
    }
    </style>

    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-120946860-10', {
        'anonymize_ip': true
    });
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


    <script src="../assets/admin/js/app.js"></script>
    <script src="../assets/jquery-3.5.1.js"></script>
    <script src="../assets/datepicker/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function() {
            // datepicker plugin
            $('.date-picker').datepicker({
                autoclose: true,
                todayHighlight: true,
                format: 'dd-mm-yyyy'
            });
        } );

        
    </script>

    <script src="../assets/titik.js"></script>
    <script src="../assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="../assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
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

    <script>
        $(document).ready(function(){
            $("#volume, #harga_satuan").keyup(function(){
                var volume = $("#volume").val();
                var harga_satuan = $("#harga_satuan").val();

                var total = parseInt(harga_satuan) * parseInt(volume);
                // $("#total").val(total);

                if(!isNaN(total)){
                    $("#total").val(total);
                }else{
                    $("#total").val();
                }
            })
        })
    </script>

    

</body>

</html>