<?php
    include '../koneksi/koneksi.php';
    session_start();

    if(isset($_POST['tambah']))
    {
        $nama_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_alat']));
        $jenis_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_alat']));
        $jumlah = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jumlah_alat']));
        $jumlah_terpakai = $_POST['jumlah_terpakai'];
        $rand = rand();

        $foto_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($rand.'_'.$_FILES['foto_alat']['name']));
        $tmp_foto = $_FILES['foto_alat']['tmp_name'];
        $size = $_FILES['foto_alat']['size'];
        $ex = array('jpg','jpeg','png');
        $x = pathinfo($foto_alat, PATHINFO_EXTENSION);
        $dir = '../assets/img/alat_praktik/'.$foto_alat;

        if(!in_array($x, $ex))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-black">
                                        <div class="alert-message">
                                            <b>Gagal</b> Extensi Foto Tidak Sesuai
                                        </div>
                                    </div>';

                header('location: ../admin/?page=rkp_apl');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-warning bg-warning text-black">
                                        <div class="alert-message">
                                            <b>Gagal</b> Extensi Foto Tidak Sesuai
                                        </div>
                                    </div>';

                header('location: ../petugas_lab/?page=rkp_apl');
            }
        }else{
            if($size > 3000000)
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                            <div class="alert-message">
                                                <b>Gagal</b> Ukuran Foto Terlalu Besar
                                            </div>
                                        </div>';

                    header('location: ../admin/?page=rkp_apl');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                            <div class="alert-message">
                                                <b>Gagal</b> Ukuran Foto Terlalu Besar
                                            </div>
                                        </div>';

                    header('location: ../petugas_lab/?page=rkp_apl');
                }
            }else{
                move_uploaded_file($tmp_foto, $dir);

                $add = mysqli_query($koneksi, "INSERT INTO alat_praktik VALUES(NULL, '$nama_alat','$jenis_alat','$foto_alat','$jumlah','$jumlah_terpakai')");

                if($add)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil</b> Tambah Data Komponen !
                                                </div>
                                            </div>';

                        header('location: ../admin/?page=rkp_apl');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil</b> Tambah Data Komponen !
                                                </div>
                                            </div>';

                        header('location: ../petugas_lab/?page=rkp_apl');
                    }
                }
            }
        }
    }
?>