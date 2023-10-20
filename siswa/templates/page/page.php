<?php
    if(empty($_GET['page']))
    {
        include 'home.php';
    }

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }

    $ex = '.php';

    switch($page)
    {
        case 'pgn_kom';
        include 'pgn_kom'.$ex;
        break;

        case 'pgn_apl';
        include 'pgn_apl'.$ex;
        break;

        case 'rwt_pgn';
        include 'rwt_pgn'.$ex;
        break;

        case 'profile';
        include 'profile'.$ex;
        break;

        case 'update_password';
        include 'update_password'.$ex;
        break;
    }
    
?>