<?php
include 'vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf();
ob_start(); 
$nama_dokumen = "FORMULIR PENDAFTARAN SISWA BARU";
?>

<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= $nama_dokumen ?></title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>


    <div class="container" style="padding-bottom:60px;">
        <div class="jumbotron jumbotron-fluid" style="background-color:white;">
            <div class="container">
                <h2 class="text-center">Formulir Pendaftaran Siswa Baru</h2>
                <h3 class="text-center">SMK PGRI NEGLASARI</h3>
                <h6 class="text-center" font-size:2px;>Jl. Marsekal Surya Darma No.1A, RT.003/RW.006, Selapajang Jaya,
                    Kec.
                    Neglasari, Kota
                    Tangerang, Banten
                    15127</h6>
                <div class="garis print" style="margin-top:2px;">

                </div>
                <div class="container pt-4">
                    <?php
                include '../koneksi/koneksi.php';
                include '../cek/cekuser.php';
                $id = $_GET["id"];
                function query($query) {
                    global $koneksi;
                    $result = mysqli_query($koneksi, $query);
                    $rows = [];
                    while( $row = mysqli_fetch_assoc($result) ) {
                        $rows[] = $row;
                    }
                    return $rows;
                }
                // akhir query

                // query datasiswa
                $data = query("SELECT * FROM siswa WHERE id = $id")[0];
            ?>
                    <p>Tanggal Daftar : <?= $data['tanggal_pendaftaran']?></p>
                    <table width="1350" cellpadding="10" style="font-size: 28px;">

                        <tr>
                            <th scope="col">Nama Lengkap</th>
                            <th>:</th>
                            <th><?= $data['nama']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Jenis Kelamin</th>
                            <th>:</th>
                            <th><?=$data['jenis_kelamin']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NISN</th>
                            <th>:</th>
                            <th><?= $data['nisn']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NIK</th>
                            <th>:</th>
                            <th><?=$data['nik']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tempat, Tanggal Lahir</th>
                            <th>:</th>
                            <th><?=$data['tempat_lahir']?>, <?=$data['tanggal_lahir']?></th>
                        </tr>
                        <tr>
                            <th scope="col">No Registrasi Akta Lahir</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_akta']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Agama</th>
                            <th>:</th>
                            <th scope="col"><?=$data['agama']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Kewarganegaraan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['kewarganegaraan']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Negara</th>
                            <th>:</th>
                            <th scope="col"><?=$data['negara']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Berkebutuhan Khusus</th>
                            <th>:</th>
                            <th scope="col"><?=$data['berkebutuhan_khusus_siswa']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Alamat Jalan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['alamat']?></th>
                        </tr>
                        <tr>
                            <th scope="col">RT / RW</th>
                            <th>:</th>
                            <th scope="col"><?=$data['rt']?> / <?= $data['rw']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Dusun</th>
                            <th>:</th>
                            <th scope="col"><?=$data['dusun']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Kelurahan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['kelurahan']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Kecamatan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['kecamatan']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Kode Pos</th>
                            <th>:</th>
                            <th scope="col"><?=$data['kodepos']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tempat Tinggal</th>
                            <th>:</th>
                            <th scope="col"><?=$data['tempat_tinggal']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Transportasi</th>
                            <th>:</th>
                            <th scope="col"><?=$data['transportasi']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nomor KKS (Kartu Keluarga Sejahtera)</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_kks']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Anak Keberapa</th>
                            <th>:</th>
                            <th scope="col"><?=$data['anak_ke']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Penerima KPS / PKH</th>
                            <th>:</th>
                            <th scope="col"><?=$data['penerima_kps']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nomor KPS / PKH</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_kps']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Layak PIP</th>
                            <th>:</th>
                            <th scope="col"><?=$data['layak_pip']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Penerima KIP</th>
                            <th>:</th>
                            <th scope="col"><?=$data['penerima_kip']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nomor KIP</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_kip']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Tertera KIP</th>
                            <th>:</th>
                            <th scope="col"><?=$data['nama_kip']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Terima Fisik KIP</th>
                            <th>:</th>
                            <th scope="col"><?=$data['fisik_kip']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Ayah</th>
                            <th>:</th>
                            <th><?=$data['nama_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NIK Ayah</th>
                            <th>:</th>
                            <th><?=$data['nik_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tahun Lahir Ayah</th>
                            <th>:</th>
                            <th><?=$data['tahun_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pendidikan Terakhir Ayah</th>
                            <th>:</th>
                            <th><?=$data['pendidikan_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pekerjaan Ayah</th>
                            <th>:</th>
                            <th><?=$data['pekerjaan_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Penghasilan Bulanan Ayah</th>
                            <th>:</th>
                            <th scope="col"><?=$data['penghasilan_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Berkebutuhan Khusus Ayah</th>
                            <th>:</th>
                            <th scope="col"><?=$data['berkebutuhan_khusus_ayah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Ibu</th>
                            <th>:</th>
                            <th style="padding-right:480px;"><?=$data['nama_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NIK Ibu</th>
                            <th>:</th>
                            <th><?=$data['nik_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tahun Lahir Ibu</th>
                            <th>:</th>
                            <th><?=$data['tahun_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pendidikan Terakhir Ibu</th>
                            <th>:</th>
                            <th><?=$data['pendidikan_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pekerjaan Ibu</th>
                            <th>:</th>
                            <th><?=$data['pekerjaan_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Penghasilan Bulanan Ibu</th>
                            <th>:</th>
                            <th scope="col"><?=$data['penghasilan_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Berkebutuhan Khusus Ibu</th>
                            <th>:</th>
                            <th scope="col"><?=$data['berkebutuhan_khusus_ibu']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nama Wali</th>
                            <th>:</th>
                            <th style="padding-right:480px;"><?=$data['nama_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NIK Wali</th>
                            <th>:</th>
                            <th><?=$data['nik_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tahun Lahir Wali</th>
                            <th>:</th>
                            <th><?=$data['tahun_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pendidikan Terakhir Wali</th>
                            <th>:</th>
                            <th><?=$data['pendidikan_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Pekerjaan Wali</th>
                            <th>:</th>
                            <th><?=$data['pekerjaan_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Penghasilan Bulanan Wali</th>
                            <th>:</th>
                            <th scope="col"><?=$data['penghasilan_wali']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nomor Telpon Siswa</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_hp']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Nomor Whatsapp Siswa</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_wa']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Email Siswa</th>
                            <th>:</th>
                            <th scope="col"><?=$data['email']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tinggi Dan Berat Badan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['tinggi']?> CM Dan <?=$data['berat']?> KG</th>
                        </tr>
                        <tr>
                            <th scope="col">Jarak Rumah Kesekolah Dan Sebutkan</th>
                            <th>:</th>
                            <th scope="col"><?=$data['jarak_rumah']?> Dan <?=$data['sebutkan']?> KM</th>
                        </tr>
                        <tr>
                            <th scope="col">Waktu Tempuh</th>
                            <th>:</th>
                            <th scope="col"> <?= $data['jam']?> Jam <?=$data['menit']?> Menit</th>
                        </tr>
                        <tr>
                            <th scope="col">Jumlah Saudara Kandung</th>
                            <th>:</th>
                            <th scope="col"><?=$data['jumlah_saudara']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Jurusan</th>
                            <th>:</th>
                            <th style="padding-right:380px;"><?=$data['jurusan']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Jenis Pendaftaran</th>
                            <th>:</th>
                            <th><?=$data['jenis_pendaftaran']?></th>
                        </tr>
                        <tr>
                            <th scope="col">NIS</th>
                            <th>:</th>
                            <th><?=$data['nis']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Tanggal Masuk Sekolah</th>
                            <th>:</th>
                            <th><?=$data['tanggal_masuk']?></th>
                        </tr>
                        <tr>
                            <th scope="col">Asal Sekolah</th>
                            <th>:</th>
                            <th><?=$data['asal_sekolah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">No Ujian Nasional</th>
                            <th>:</th>
                            <th><?=$data['no_ujian']?></th>
                        </tr>
                        <tr>
                            <th scope="col">No Seri Ijazah</th>
                            <th>:</th>
                            <th><?=$data['no_ijazah']?></th>
                        </tr>
                        <tr>
                            <th scope="col">No SKHUN</th>
                            <th>:</th>
                            <th scope="col"><?=$data['no_skhun']?></th>
                        </tr>
                    </table>
                    <?php

                function hariIndo ($hariInggris) {
                switch ($hariInggris) {
                    case 'Sunday':
                    return 'Minggu';
                    case 'Monday':
                    return 'Senin';
                    case 'Tuesday':
                    return 'Selasa';
                    case 'Wednesday':
                    return 'Rabu';
                    case 'Thursday':
                    return 'Kamis';
                    case 'Friday':
                    return 'Jumat';
                    case 'Saturday':
                    return 'Sabtu';
                    default:
                    return 'hari tidak valid';
                }
                }
                $hariBahasaInggris = date('l');
                $hariBahasaIndonesia = hariIndo($hariBahasaInggris);
                ?>
                    <br>
                    <div class="container text-right">
                        <b class="text-right">Tangerang</b>, <?= $hariBahasaIndonesia ?> <?= date('d-m-yy')?>
                        <p><b>Orang Tua / Wali Murid</b></p>
                        <br><br><br>
                        <b style="text-align:left;"><u><?= $data['nama_ayah']?></u></b>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<?php
 $html = ob_get_contents(); 
 ob_end_clean();
 $mpdf->WriteHTML(utf8_encode($html));
 $mpdf->Output();
?>