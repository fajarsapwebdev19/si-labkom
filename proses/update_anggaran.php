<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = mysqli_real_escape_string($koneksi, $_POST['id']);
            $nama_alat = mysqli_escape_string($koneksi, htmlspecialchars($_POST['nama_alat']));

            // foto alat
            $foto_alat = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_alat']['name']));
            $tmp_alat = $_FILES['foto_alat']['tmp_name'];
            $size = $_FILES['foto_alat']['size'];
            $ex = pathinfo($foto_alat, PATHINFO_EXTENSION);
            $x = array('png','jpg','jpeg');
            $rename = rand().'_'.$foto_alat;
            $dir = '../assets/img/buy/'.$rename;

            $tanggal_pengajuan = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_pengajuan']))));
            $tanggal_pembelian = mysqli_real_escape_string($koneksi, htmlspecialchars(date('Y-m-d', strtotime($_POST['tanggal_pembelian']))));
            $satuan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['satuan']));
            $harga_satuan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['harga_satuan']));
            $volume = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['volume']));
            $jumlah = $harga_satuan * $volume;


            if(empty($foto_alat))
            {
                $update = mysqli_query($koneksi, "UPDATE rencana_anggaran SET nama_alat='$nama_alat', tanggal_pengajuan='$tanggal_pengajuan', tanggal_pembelian='$tanggal_pembelian', volume='$volume', satuan='$satuan', harga_satuan='$harga_satuan', jumlah='$jumlah' WHERE id='$id'");

                if($update)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil !</b> Update Data Rencana Anggaran
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=lap_buy');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                <div class="alert-message">
                                                    <b>Berhasil !</b> Update Data Rencana Anggaran
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=lap_buy');
                    }
                }
            }else{
                if(!in_array($ex,$x))
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ektensi Tidak Sesuai
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=lap_buy');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ektensi Tidak Sesuai
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=lap_buy');
                    }
                }else{
                    if($size > 3000000)
                    {
                       if($_SESSION['level'] == "Admin")
                       {
                            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                    <div class="alert-message">
                                                        <b>Gagal !</b> Ukuran Foto Melebihi 3 MB
                                                    </div>
                                                </div>';
                                                header('location: ../admin/?page=lap_buy');
                       }
                       elseif($_SESSION['level'] == "Petugas Lab")
                       {
                            $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                                    <div class="alert-message">
                                                        <b>Gagal !</b> Ukuran Foto Melebihi 3 MB
                                                    </div>
                                                </div>';
                                                header('location: ../petugas_lab/?page=lap_buy');
                       }
                    }else{
                        $select = mysqli_query($koneksi, "SELECT * FROM rencana_anggaran WHERE id='$id'");
                        $data = mysqli_fetch_assoc($select);

                        $foto_dir = $data['foto_alat'];

                        unlink('../assets/img/buy/'.$foto_dir);

                        move_uploaded_file($tmp_alat, $dir);

                        $update = mysqli_query($koneksi, "UPDATE rencana_anggaran SET nama_alat='$nama_alat', foto_alat='$rename', tanggal_pengajuan='$tanggal_pengajuan', tanggal_pembelian='$tanggal_pembelian', volume='$volume', satuan='$satuan', harga_satuan='$harga_satuan', jumlah='$jumlah' WHERE id='$id'");

                        if($update)
                        {
                            if($_SESSION['level'] == "Admin")
                            {
                                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                        <div class="alert-message">
                                                            <b>Berhasil !</b> Update Data Rencana Anggaran
                                                        </div>
                                                    </div>';
                                                    header('location: ../admin/?page=lap_buy');
                            }
                            elseif($_SESSION['level'] == "Petugas Lab")
                            {
                                $_SESSION['val'] = '<div class="alert alert-success bg-success text-white">
                                                        <div class="alert-message">
                                                            <b>Berhasil !</b> Update Data Rencana Anggaran
                                                        </div>
                                                    </div>';
                                                    header('location: ../petugas_lab/?page=lap_buy');
                            }
                        }
                    }
                }
            }
        }
    }
?>