<?php
    include '../koneksi/koneksi.php';
    session_start();

    if(isset($_POST['tambah']))
    {
        $nama_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_alat']));

        // foto alat
        $foto_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_alat']['name']));
        $tmp_foto = $_FILES['foto_alat']['tmp_name'];
        $size = $_FILES['foto_alat']['size'];
        $ex = pathinfo($foto_alat, PATHINFO_EXTENSION);
        $x = array('jpg','jpeg','png');
        $rename = rand().'_'.$foto_alat;
        $dir = '../assets/img/buy/'.$rename;

        $tanggal_pengajuan = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_pengajuan']))));
        $tanggal_pembelian = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_pembelian']))));
        $volume = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['volume']));
        $satuan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['satuan']));
        $harga_satuan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['harga_satuan']));
        $jumlah = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jumlah']));
        $status_pengajuan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_pengajuan']));
        $status_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_alat']));

        if(empty($_FILES['foto_alat']['name']))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Foto Kosong 
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=lap_buy');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Foto Kosong 
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=lap_buy');
            }
        }else{
            if(!in_array($ex, $x))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-info bg-info text-white">
                                            <div class="alert-message">
                                                <b>Gagal !</b> Extensi Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=lap_buy');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-info bg-info text-white">
                                            <div class="alert-message">
                                                <b>Gagal !</b> Extensi Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=lap_buy');
                }
            }else{
                if($size > 3000000)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-info bg-info text-white">
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ukuran Melebihi 3 MB
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=lap_buy');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-info bg-info text-white">
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ukuran Melebihi 3 MB
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=lap_buy');
                    }
                }else{
                    move_uploaded_file($tmp_foto, $dir);

                    $tambah = mysqli_query($koneksi, "INSERT INTO rencana_anggaran VALUES(NULL, '$nama_alat','$rename','$tanggal_pengajuan','$tanggal_pembelian','$volume','$satuan','$harga_satuan','$jumlah','$status_pengajuan','$status_alat')");

                    if($tambah)
                    {
                        if($_SESSION['level'] == "Admin")
                        {
                            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                    <div class="alert-message">
                                                        <b>Berhasil!</b> Tambah Data Anggaran
                                                    </div>
                                                </div>';
                                                header('location: ../admin/?page=lap_buy');
                        }
                        elseif($_SESSION['level'] == "Petugas Lab")
                        {
                            $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                    <div class="alert-message">
                                                        <b>Berhasil!</b> Tambah Data Anggaran
                                                    </div>
                                                </div>';
                                                header('location: ../petugas_lab/?page=lap_buy');
                        }
                    }
                }
            }
        }


    }
?>