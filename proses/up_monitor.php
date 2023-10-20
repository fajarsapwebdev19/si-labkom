<?php
    session_start();
    include '../koneksi/koneksi.php';

    if(isset($_POST['update']))
    {
        if(isset($_POST['id']))
        {
            $id = $_POST['id'];
            $foto_monitor = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_monitor']['name']));
            $tmp_monitor = $_FILES['foto_monitor']['tmp_name'];
            $ex = array('png','jpg','jpeg');
            $extend = pathinfo($foto_monitor, PATHINFO_EXTENSION);
            $size = $_FILES['foto_monitor']['size'];
            $rename = rand().'_'.$foto_monitor;
            $dir = '../assets/img/komponen/'.$rename;

            if(empty($_FILES['foto_monitor']['name']))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alet alert-danger bg-danger text-white"> 
                                            <div class="alert-message">
                                                <b>Gagal !</b> Tidak Ada Foto
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alet alert-danger bg-danger text-white"> 
                                            <div class="alert-message">
                                                <b>Gagal !</b> Tidak Ada Foto
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }else{
                if(!in_array($extend, $ex))
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alet alert-info bg-info text-white"> 
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ektensi Tidak Sesuai
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=detailpc');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alet alert-info bg-info text-white"> 
                                                <div class="alert-message">
                                                    <b>Gagal !</b> Ektensi Tidak Sesuai
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=detailpc');
                    }
                }else{
                    if($size > 3000000)
                    {
                       if($_SESSION['level'] == "Admin")
                       {
                            $_SESSION['val'] = '<div class="alet alert-danger bg-danger text-white"> 
                                                    <div class="alert-message">
                                                        <b>Gagal !</b> Ukuran Melebihi 3 MB
                                                    </div>
                                                </div>';
                                                header('location: ../admin/?page=detailpc');
                       }
                       elseif($_SESSION['level'] == "Petugas Lab")
                       {
                            $_SESSION['val'] = '<div class="alet alert-danger bg-danger text-white"> 
                                                    <div class="alert-message">
                                                        <b>Gagal !</b> Ukuran Melebihi 3 MB
                                                    </div>
                                                </div>';
                                                header('location: ../petugas_lab/?page=detailpc');
                       }
                    }else{
                        $q = mysqli_query($koneksi, "SELECT * FROM pc WHERE id='$id'");

                        $data = mysqli_fetch_assoc($q);

                        $m_file = $data['foto_monitor'];

                        unlink('../assets/img/komponen/'.$m_file);

                        move_uploaded_file($tmp_monitor, $dir);

                        $update = mysqli_query($koneksi, "UPDATE pc SET foto_monitor='$rename' WHERE id='$id'");

                        if($update)
                        {
                            if($_SESSION['level'] == "Admin")
                            {
                                $_SESSION['val'] = '<div class="alet alert-success bg-success text-white"> 
                                                        <div class="alert-message">
                                                            <b>Berhasil !</b> Update Foto Monitor
                                                        </div>
                                                    </div>';
                                                    header('location: ../admin/?page=detailpc');
                            }
                            elseif($_SESSION['level'] == "Petugas Lab")
                            {
                                $_SESSION['val'] = '<div class="alet alert-success bg-success text-white"> 
                                                        <div class="alert-message">
                                                            <b>Berhasil !</b> Update Foto Monitor
                                                        </div>
                                                    </div>';
                                                    header('location: ../petugas_lab/?page=detailpc');
                            }
                        }
                    }
                }
            }
        }
    }