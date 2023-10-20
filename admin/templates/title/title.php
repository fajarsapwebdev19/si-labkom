<?php
    if(empty($_GET['page']))
    {
        $title = 'Dashboard - Admin';
    }
    

    if(isset($_GET['page']))
    {
        $page = $_GET['page'];
    }
    else{
        $page=1;
    }

    switch($page)
    {
        case 'acn_adm';
        $title = 'Manajemen Akun - Admin';
        break;

        case 'acn_ptl';
        $title = 'Manajemen Akun - Petugas Lab';
        break;

        case 'acn_ks';
        $title = 'Manajemen Akun - Kepala Sekolah';
        break;

        case 'acn_sw';
        $title = 'Manajemen Akun - Siswa';
        break;

        case 'rkp_kom';
        $title = 'Rekap Data - Komponen Komputer';
        break;

        case 'rkp_apl';
        $title = 'Rekap Data - Alat Praktik Lab';
        break;

        case 'ver_mkp';
        $title = 'Verifikasi - Menggunakan PC';
        break;

        case 'ver_skm';
        $title = 'Verifikasi - Selesai Menggunakan PC';
        break;

        case 'ver_alt';
        $title = 'Verifikasi - Peminjaman Alat';
        break;

        case 'ver_bck';
        $title = 'Verifikasi - Pengembalian Alat';
        break;

        case 'note_pkm';
        $title = 'Catatan - Penggunaan Komputer';
        break;

        case 'note_ppr';
        $title = 'Catatan - Penggunaan Alat';
        break;

        case 'detailpc';
        $title = 'Detail & Info Pc';
        break;

        case 'app_reg';
        $title = 'Approval Registrasi';
        break;

        case 'lap_buy';
        $title = 'Laporan Pembelian Alat';
        break;

        case 'profile';
        $title = 'Profile - Admin';
        break;

        case 'update_password';
        $title = 'Update Password - Admin';
        break;
    }
?>