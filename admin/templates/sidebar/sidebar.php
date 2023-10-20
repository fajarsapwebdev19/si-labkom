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
        case 'acn_adm';
        include 'menu/acount_adm'.$ex;
        break;

        case 'acn_ptl';
        include 'menu/acount_ptl'.$ex;
        break;

        case 'acn_ks';
        include 'menu/acount_ks'.$ex;
        break;

        case 'acn_sw';
        include 'menu/acount_sw'.$ex;
        break;

        case 'rkp_kom';
        include 'menu/rekap_kom'.$ex;
        break;

        case 'rkp_apl';
        include 'menu/rekap_alat'.$ex;
        break;

        case 'ver_mkp';
        include 'menu/verifikasi_pmk'.$ex;
        break;

        case 'ver_skm';
        include 'menu/verifikasi_skm'.$ex;
        break;

        case 'ver_alt';
        include 'menu/verifikasi_alt'.$ex;
        break;

        case 'ver_bck';
        include 'menu/verifikasi_bck'.$ex;
        break;

        case 'note_pkm';
        include 'menu/catatan_pkm'.$ex;
        break;

        case 'note_ppr';
        include 'menu/catatan_ppr'.$ex;
        break;

        case 'detailpc';
        include 'menu/detailpc'.$ex;
        break;

        case 'app_reg';
        include 'menu/approv_reg'.$ex;
        break;

        case 'lap_buy';
        include 'menu/lap_buy'.$ex;
        break;

        case 'profile';
        include 'menu/profile'.$ex;
        break;

        case 'update_password';
        include 'menu/up_pass'.$ex;
        break;
    }
?>