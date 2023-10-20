<?php

if(isset($_GET['page']))
{
    $page = $_GET['page'];
}
else{
    $page = 1;
}

if(empty($_GET['page']))
{
    $title = 'Dashboard - Siswa';
}

switch($page)
{
    case 'pgn_kom';
    $title = 'Penggunaan - Komputer';
    break;

    case 'pgn_apl';
    $title = 'Penggunaan - Alat Praktik Lab';
    break;

    case 'rwt_pgn';
    $title = 'Riwayat Penggunaan';
    break;

    case 'profile';
    $title = 'Profile - Siswa';
    break;

    case 'update_password';
    $title = 'Update Password - Siswa';
    break;
}