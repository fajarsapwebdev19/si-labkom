<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $nama_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_alat']));
            $jenis_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jenis_alat']));
            $jumlah_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['jumlah_alat']));

            $foto_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_alat']['name']));
            $tmp_foto = $_FILES['foto_alat']['tmp_name'];
            $size = $_FILES['foto_alat']['size'];
            $ex = pathinfo($foto_alat, PATHINFO_EXTENSION);
            $x = array('jpg','jpeg','png');
            $rename = rand().'_'.$foto_alat;

            $dir = '../assets/img/alat_praktik/'.$rename;

            if(empty($foto_alat))
            {
                $up = mysqli_query($koneksi, "UPDATE alat_praktik SET nama_alat='$nama_alat', jenis_alat='$jenis_alat', jumlah='$jumlah_alat' WHERE id='$id'");

                if($up)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil</b> Update Data Alat Praktik !
                                                </div>  
                                            </div>';
                        header('location: ../admin/?page=rkp_apl');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil</b> Update Data Alat Praktik !
                                                </div>  
                                            </div>';
                        header('location: ../petugas_lab/?page=rkp_apl');
                    }
                }
            }
            else{
                if(!in_array($ex, $x))
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
                        // foto_file dari database server
                        $server = mysqli_query($koneksi, "SELECT * FROM alat_praktik WHERE id='$id'");
                        $data = mysqli_fetch_assoc($server);

                        $foto_files = $data['foto_alat'];

                        // hapus file
                        unlink('../assets/img/alat_praktik/'.$foto_files);

                        // upload ke file 
                        move_uploaded_file($tmp_foto, $dir);

                        // query data update
                        $update = mysqli_query($koneksi, "UPDATE alat_praktik SET nama_alat='$nama_alat',jenis_alat='$jenis_alat',foto_alat='$rename',jumlah='$jumlah_alat' WHERE id='$id'");

                        if($update)
                        {
                            if($_SESSION['level'] == "Admin")
                            {
                                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                        <div class="alert-message">
                                                            <b>Berhasil</b> Update Data Alat Praktik !
                                                        </div>  
                                                    </div>';
                                header('location: ../admin/?page=rkp_apl');
                            }
                            elseif($_SESSION['level'] == "Petugas Lab")
                            {
                                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                        <div class="alert-message">
                                                            <b>Berhasil</b> Update Data Alat Praktik !
                                                        </div>  
                                                    </div>';
                                header('location: ../petugas_lab/?page=rkp_apl');
                            }
                        }
                    }
                }
            }
        }
    }