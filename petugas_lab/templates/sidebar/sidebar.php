<?php
    if(empty($_GET['page']))
    {
        include 'menu/home.php';
    }

    $ex = '.php';

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else
    {
        $page = 1;
    }

    switch($page)
    {
        case 'rkp_kom';
        include 'menu/rkp_kom'.$ex;
        break;

        case 'rkp_apl';
        include 'menu/rkp_apl'.$ex;
        break;

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

        case 'note_pkm';
        include 'menu/note_pkm'.$ex;
        break;

        case 'note_ppr';
        include 'menu/note_ppr'.$ex;
        break;

        case 'detailpc';
        include 'menu/detailpc.php';
        break;

        case 'lap_buy';
        include 'menu/lap_buy.php';
        break;

        case 'profile';
        include 'menu/profile.php';
        break;

        case 'update_password';
        include 'menu/update_password.php';
        break;
    }
    
?>