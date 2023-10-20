<?php 
    include '../koneksi/koneksi.php';
    session_start();

    if(isset($_POST['save']))
    {
        $rand = rand();
        $nama_pc = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['nama_pc']));
        $mouse = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['mouse']));
        
        // foto pc
        $foto_pc = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_pc']['name']));
        $tmp_fotopc = $_FILES['foto_pc']['tmp_name'];
        $size_fotopc = $_FILES['foto_pc']['size'];
        $ex = array('png','jpg','jpeg');
        $extend_pc = pathinfo($foto_pc, PATHINFO_EXTENSION);
        $rename_pc = $rand.'_'.$foto_pc;
        $dir_pc = '../assets/img/komponen/'.$rename_pc;

        $motherboard = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['motherboard']));
        $keyboard = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['keyboard']));

        // foto monitor
        $foto_monitor = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_monitor']['name']));
        $tmp_fotomonitor = $_FILES['foto_monitor']['tmp_name'];
        $size_fotomonitor = $_FILES['foto_monitor']['size'];
        $extend_monitor = pathinfo($foto_monitor, PATHINFO_EXTENSION);
        $rename_monitor = $rand.'_'.$foto_monitor;
        $dir_monitor = '../assets/img/komponen/'.$rename_monitor;

        $processor = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['processor']));
        $monitor = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['monitor']));
        $system_operasi = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['system_operasi']));
        $ram = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['ram']));
        $status_jaringan = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_jaringan']));
        $status_pc = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['status_pc']));
        $hdd_model = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['hdd_model']));
       
        $foto_mouse = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_mouse']['name']));
        $tmp_fotomouse = $_FILES['foto_mouse']['tmp_name'];
        $size_mouse = $_FILES['foto_mouse']['size'];
        $extend_mouse = pathinfo($foto_mouse, PATHINFO_EXTENSION);
        $rename_mouse = $rand.'_'.$foto_mouse;
        $dir_mouse = '../assets/img/komponen/'.$rename_mouse;

        $kapasitas_hdd = mysqli_real_escape_string($koneksi, htmlspecialchars($_POST['kapasitas_hdd']));
        
        $foto_keyboard = mysqli_real_escape_string($koneksi, htmlspecialchars($_FILES['foto_keyboard']['name']));
        $tmp_fotokeyboard = $_FILES['foto_keyboard']['tmp_name'];
        $size_keyboard = $_FILES['foto_keyboard']['size'];
        $extend_keyboard = pathinfo($foto_keyboard, PATHINFO_EXTENSION);
        $rename_keyboard = $rand.'_'.$foto_keyboard;
        $dir_keyboard = '../assets/img/komponen/'.$rename_keyboard;

        // upload foto pc

        if(empty($_FILES['foto_pc']['name']))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=detailpc');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=detailpc');
            }
        }else{
            // jika tidak sesuai dengan ektensi
            if(!in_array($extend_pc, $ex))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Pc Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Pc Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }else{
                // jika ukuran terlalu besar
                if($size_fotomonitor > 3000000)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Pc Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=detailpc');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Pc Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=detailpc');
                    }
                }else{
                    move_uploaded_file($tmp_fotopc, $dir_pc);
                }
            }
        }

        // upload foto monitor
        if(empty($_FILES['foto_monitor']['name']))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=detailpc');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=detailpc');
            }
        }else{
            if(!in_array($extend_monitor, $ex))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Monitor Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Monitor Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }else{
                if($size_fotomonitor > 3000000)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Monitor Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=detailpc');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Monitor Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=detailpc');
                    }
                }else{
                    move_uploaded_file($tmp_fotomonitor, $dir_monitor);
                }
            }
        }


        // upload foto mouse
        if(empty($_FILES['foto_mouse']['name']))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=detailpc');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=detailpc');
            }
        }else{
            if(!in_array($extend_mouse, $ex))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Mouse Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Mouse Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
            }else{
                if($size_mouse > 3000000)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Mouse Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=detailpc');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Mouse Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=detailpc');
                    }
                }else{
                    move_uploaded_file($tmp_fotomouse, $dir_mouse);
                }
            }
        }

        if(empty($_FILES['foto_keyboard']['name']))
        {
            if($_SESSION['level'] == "Admin")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=detailpc');
            }
            elseif($_SESSION['level'] == "Petugas Lab")
            {
                $_SESSION['val'] = '<div class="alert alert-danger bg-danger text-white">
                                        <div class="alert-message">
                                            <b>Gagal !</b> Tidak Ada File Yang Di Upload
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=detailpc');
            }
            
        }else{
            if(!in_array($extend_keyboard, $ex))
            {
                if($_SESSION['level'] == "Admin")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Keyboard Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../admin/?page=detailpc');
                }
                elseif($_SESSION['level'] == "Petugas Lab")
                {
                    $_SESSION['val'] = '<div class="alert alert-warning bg-warning">
                                            <div class="alert-message">
                                                <b>Gagal!</b> Ekstensi File Foto Keyboard Tidak Sesuai
                                            </div>
                                        </div>';
                                        header('location: ../petugas_lab/?page=detailpc');
                }
                
            }else{
                if($size_fotomonitor > 3000000)
                {
                    if($_SESSION['level'] == "Admin")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Keyboard Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../admin/?page=detailpc');
                    }
                    elseif($_SESSION['level'] == "Petugas Lab")
                    {
                        $_SESSION['val'] = '<div class="alert alert-danger bg-danger">
                                                <div class="alert-message">
                                                    <b>Gagal!</b> Ukuran File Foto Keyboard Diatas 3MB
                                                </div>
                                            </div>';
                                            header('location: ../petugas_lab/?page=detailpc');
                    }
                    
                }else{
                    move_uploaded_file($tmp_fotokeyboard, $dir_keyboard);
                }
            }
        }


        $save = mysqli_query($koneksi, "INSERT INTO pc VALUES(NULL, '$nama_pc','$motherboard','$ram','$processor','$keyboard','$mouse','$status_jaringan','$monitor','$hdd_model','$kapasitas_hdd','$system_operasi','$rename_pc','$rename_monitor','$rename_mouse','$rename_keyboard','$status_pc')");

        if($save)
        {
           if($_SESSION['level'] == "Admin")
           {
                $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                        <div class="alert-message">
                                            <b>Berhasil!</b> Data Pc Di Tambah
                                        </div>
                                    </div>';
                                    header('location: ../admin/?page=detailpc');
           }
           elseif($_SESSION['level'] == "Petugas Lab")
           {
                $_SESSION['val'] = '<div class="alert alert-success text-white bg-success">
                                        <div class="alert-message">
                                            <b>Berhasil!</b> Data Pc Di Tambah
                                        </div>
                                    </div>';
                                    header('location: ../petugas_lab/?page=detailpc');
           }
        }
        
    }
?>