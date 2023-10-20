<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(!$_SESSION['login'] == 'Oke')
    {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white" id="auto-close"><b>Anda Belum Login !</b></div>';
        header('location: ../');
    }
    // jika akun tidak aktif maka user ketika melakukan login akan di tolak dan di arahkan ke halaman login
    if($_SESSION['sts_akun'] == 'Tidak Aktif')
    {
        $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-black" id="auto-close"><b>Akun Tidak Aktif !</b></div>';
        header('location: ../');
    }

    // ambil data user berdasarkan session username dari database

    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM user WHERE username='$username'";
    $q = mysqli_query($koneksi, $SQL);
    $petugas = mysqli_fetch_assoc($q);

    // jika akun di blokir secara paksa oleh admin kemudian user melakukan reload maka otomatis akan di lempar ke halaman admin

    if($petugas['sts_akun'] == "Tidak Aktif")
    {
        ?>
            <script>
                alert('Maaf, Akun Anda Terblokir Oleh Admin Dan Tidak Aktif');
                document.location.href="../";
            </script>
        <?php
    }

    // security login

    if($_SESSION['level'] == "Admin")
    {
        if($_SESSION['level'] !='Petugas Lab')
        {
            header('location: ../admin/');
        }
    }
    elseif($_SESSION['level'] == "Kepsek")
    {
        if($_SESSION['level'] !='Petugas Lab')
        {
            header('location: ../kepsek/');
        }
    }
    elseif($_SESSION['level'] == "Siswa")
    {
        if($_SESSION['level'] !='Petugas Lab')
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
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="../assets/img/smk.png" type="image/x-icon">

	<link rel="canonical" href="../assets/admin/index.htm">

	<title><?php include 'templates/title/title.php'; echo $title;?></title>

	<link href="../assets/admin/css2.css?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<link href="../assets/admin/css/dark.css" rel="stylesheet">

    <!-- datatables -->

    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">

    <link class="js-stylesheet" href="../assets/admin/css/light.css" rel="stylesheet">

   
	<style>
        @font-face{
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

<script src="../assets/admin/js/app.js"></script>
<script src="../assets/jquery-3.5.1.js"></script>
<script src="../assets/titik.js"></script>
<script src="../assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $("#example").DataTable();
    });

    $(document).ready(function() {
        $("#example2").DataTable();
    });

    $(document).ready(function(){
        $("#example3").DataTable();
    })
</script>

<script>
    $(document).ready(function(){
        $("#volume, #harga_satuan").keyup(function(){
            var volume = $("#volume").val();
            var harga_satuan = $("#harga_satuan").val();

            var total = parseInt(harga_satuan) * parseInt(volume);

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