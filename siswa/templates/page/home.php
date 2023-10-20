<div class="container-fluid p-0">

    <!-- Title -->

    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Dashboard</h3>
            
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php

                if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                {
                    echo $_SESSION['val'];
                    unset($_SESSION['val']);
                }
            ?>
        </div>
    </div>


    

    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Admin</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $q = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Admin'");
                            echo mysqli_num_rows($q);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Kepala Sekolah</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $p = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Kepsek'");
                            echo mysqli_num_rows($p);                        
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Petugas Lab</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $pl = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Petugas Lab'");
                            echo mysqli_num_rows($pl);
                        ?>
                    </h1>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col mt-0">
                            <h5 class="card-title">Siswa</h5>
                        </div>

                        <div class="col-auto">
                            <div class="stat text-primary">
                                <i class="align-middle" data-feather="user"></i>
                            </div>
                        </div>
                    </div>
                    <h1 class="mt-1 mb-3">
                        <?php
                            $s = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Siswa'");
                            echo mysqli_num_rows($s);
                        ?>
                    </h1>
                </div>
            </div>
        </div>

        <!-- End Jumlah User -->
        
        <!-- Rekap Alat -->

        <div class="col-12 col-sm-12">

            <?php
                // data awal
                $username = $siswa['username'];
                $q = mysqli_query($koneksi, "SELECT * FROM identitas_siswa WHERE username='$username'");
                $c = mysqli_fetch_assoc($q);
            ?>
            <!-- container -->
            <div class="container">
                <div class="modal fade" id="exampleModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Identitas Siswa</h5>
                            </div>
                            <div class="modal-body">

                                <div class="alert alert-info bg-info text-white">
                                    <div class="alert-message">
                                        <b><em class="fas fa-info"></em> Informasi</b>
                                        <p>Diwajibkan melakukan perubahan identitas dan isilah sesuai data diri kalian. Apabila tidak melakukan perubahan identitas dan data diri tidak sesuai maka admin akan memblokir akun siswa yang tidak melakukan update data !!!</p>
                                    </div>
                                </div>
                                
                                <form action="../proses/update_iden.php" class="needs-validation" method="post" autocomplete="off" novalidate>
                                    <label for="" class="col-form-label">
                                        Nama
                                    </label>
                                    <input type="text" name="nama" class="form-control" value="<?= $c['nama'] ?>" required>
                                    <label for="" class="col-form-label">
                                        Jenis Kelamin
                                    </label>
                                    <?php
                                        if(empty($c['jenis_kelamin']))
                                        {
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        L
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" required>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        P
                                                    </label>
                                                </div>
                                            <?php
                                        }elseif($c['jenis_kelamin'] == "Laki-Laki")
                                        {
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki" checked required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        L
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" required>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        P
                                                    </label>
                                                </div>
                                            <?php
                                        }elseif($c['jenis_kelamin'] == "Perempuan")
                                        {
                                            ?>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault1" value="Laki-Laki" required>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        L
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="flexRadioDefault2" value="Perempuan" check required>
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        P
                                                    </label>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                    <label for="" class="col-form-label">
                                        NISN
                                    </label>
                                    <input type="text" name="nisn" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
                                    <label for="" class="col-form-label">
                                        Jurusan
                                    </label>
                                    <select name="jurusan" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php 
                                            $jurus = mysqli_query($koneksi, "SELECT * FROM tb_jurusan");
                                            foreach($jurus as $j):
                                        ?>
                                            <option><?= $j['jurusan'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <label for="" class="col-form-label">
                                        Kelas
                                    </label>
                                    <select name="tingkat" class="form-control" required>
                                        <option value="">-- Pilih --</option>
                                        <?php
                                            

                                            $select = $c['tingkat'];
                                            $value = mysqli_query($koneksi, "SELECT * FROM tb_kelas");
                                            foreach($value as $kelas):
                                        ?>
                                            
                                        <option <?php if($c['tingkat'] == $kelas['kelas']){echo 'selected'; }?>><?= $kelas['kelas'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <input type="hidden" name="username" value="<?= $siswa['username'] ?>">
                                    <div class="modal-footer">
                                        <button type="submit"  name="update" class="btn btn-info">Update Identitas</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end container -->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Rekap Alat</h5>
                </div>
                <div class="card-body pt-2 pb-3">
                    <table class="table table-responsive-sm">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Alat</th>
                                <th>Jumlah Alat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $no = 1;
                                $db = mysqli_query($koneksi, "SELECT * FROM alat_praktik UNION SELECT * FROM komponen_komputer");
                                while($data = mysqli_fetch_object($db)):
                            ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $data->nama_alat; ?></td>
                                    <td><?= $data->jumlah; ?></td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- End Rekap Alat -->
    </div>
</div>

