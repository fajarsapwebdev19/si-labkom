<?php
    if(empty($_GET['page']))
    {
        include 'menu/home.php';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    

    $ex = '.php';

    switch($page)
    {
        // Manajemen Akun

        case 'acn_adm';
        include 'menu/acn_adm'.$ex;
        break;

        case 'acn_ptl';
        include 'menu/acn_ptl'.$ex;
        break;

        case 'acn_ks';
        include 'menu/acn_ks'.$ex;
        break;

        case 'acn_sw';
        include 'menu/acn_sw'.$ex;
        break;

        // Menu Rekap

        case 'rkp_kom';
        include 'menu/rkp_kom'.$ex;
        break;

        case 'rkp_apl';
        include 'menu/rkp_apl'.$ex;
        break;

        // Menu Verifikasi

        case 'ver_mkp';
        include 'menu/ver_mkp'.$ex;
        break;

        case 'ver_skm';
        include 'menu/ver_skm'.$ex;
        break;

        case 'ver_alt';
        include 'menu/ver_alt'.$ex;
        break;

        case 'ver_bck';
        include 'menu/ver_bck'.$ex;
        break;

        // Menu Catatan

        case 'note_pkm';
        include 'menu/note_pkm'.$ex;
        break;

        case 'note_ppr';
        include 'menu/note_ppr'.$ex;
        break;

        // Menu Detail Pc , Approv Registrasi , Laporan Pembelian Alat

        case 'detailpc';
        include 'menu/detailpc'.$ex;
        break;

        case 'app_reg';
        include 'menu/app_reg'.$ex;
        break;

        case 'lap_buy';
        include 'menu/lap_buy'.$ex;
        break;
        
        // profile

        case 'profile';
        include 'menu/profile'.$ex;
        break;

        case 'update_password';
        include 'menu/update_pass'.$ex;
        break;
    }
?>