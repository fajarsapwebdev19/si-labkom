<?php
    if(empty($_GET['page']))
    {
        include 'menu/home.php';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }


    switch($page)
    {
        case 'rkp_kom';
        include 'menu/rkp_kom.php';
        break;

        case 'rkp_apl';
        include 'menu/rkp_apl.php';
        break;

        case 'ver_mkp';
        include 'menu/ver_mkp.php';
        break;

        case 'ver_skm';
        include 'menu/ver_skm.php';
        break;

        case 'ver_alt';
        include 'menu/ver_alt.php';
        break;

        case 'ver_bck';
        include 'menu/ver_bck.php';
        break;

        case 'note_pkm';
        include 'menu/note_pkm.php';
        break;

        case 'note_ppr';
        include 'menu/note_ppr.php';
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