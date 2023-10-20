<?php
    if(empty($_GET['page']))
    {
        include 'menu/home.php';
    }

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
        require 'menu/rkp_kom.php';
        break;

        case 'rkp_apl';
        require 'menu/rkp_apl.php';
        break;

        case 'note_pkm';
        require 'menu/note_pkm.php';
        break;

        case 'note_ppr';
        require 'menu/note_ppr.php';
        break;

        case 'detailpc';
        require 'menu/detailpc.php';
        break;

        case 'lap_buy';
        require 'menu/lap_buy.php';
        break;

        case 'profile';
        require 'menu/profile.php';
        break;

        case 'update_password';
        require 'menu/update_password.php';
        break;
    }
?>