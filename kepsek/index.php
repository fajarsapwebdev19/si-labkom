<?php
    session_start();
    include '../koneksi/koneksi.php';

    // jika user iseng melakukan redirect ke halaman dashboard maka akan di lempar kembali ke halaman login
    if(!$_SESSION['login'] == 'Oke')
    {
        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white"><b>Anda Belum Login !</b></div>';
        header('location: ../');
    }elseif($_SESSION['sts_akun'] == "Tidak Aktif")
    {
        $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-black" id="auto-close">Akun Tidak Aktif</div>';
        header('location: ../');
    }
    
    $username = $_SESSION['username'];
    $SQL = "SELECT * FROM user WHERE username='$username'";
    $q = mysqli_query($koneksi, $SQL);
    $kepsek = mysqli_fetch_assoc($q);

    if($_SESSION['level'] == "Admin")
    {
        if($_SESSION['level'] !='Kepsek')
        {
            header('location: ../admin/');
        }
    }
    elseif($_SESSION['level'] == "Petugas Lab")
    {
        if($_SESSION['level'] !='Kepsek')
        {
            header('location: ../petugas_lab/');
        }
    }
    elseif($_SESSION['level'] == "Siswa")
    {
        if($_SESSION['level'] !='Kepsek')
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

    <link rel="stylesheet" href="../assets/DataTables/DataTables-1.11.3/css/dataTables.bootstrap5.min.css">

	<!-- Choose your prefered color scheme -->
	<!-- <link href="css/light.css" rel="stylesheet"> -->
	<link href="../assets/admin/css/dark.css" rel="stylesheet">

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
            <div class="content">
                <?php require 'templates/page/page.php'; ?>
            </div>
        </div>
    </div>
<script src="../assets/admin/js/app.js"></script>
<script src="../assets/jquery-3.5.1.js"></script>
<script src="../assets/DataTables/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
<script src="../assets/DataTables/DataTables-1.11.3/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function(){
        $('#example').DataTable();
    });
    $(document).ready(function(){
        $('#example2').DataTable();
    });
    $(document).ready(function(){
        $('#example3').DataTable();
    });
</script>
</body>
</html>