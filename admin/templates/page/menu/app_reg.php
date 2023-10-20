<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Approval Registrasi Akun</h3>
        </div>
    </div>



    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Menunggu Approval</h5>
                </div>

                <div class="container">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>
                </div>

                <div class="card-body">
                    <nav class="mb-4">
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                aria-selected="true">Antrian</button>
                            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                aria-selected="false">Terima</button>
                            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                                aria-selected="false">Tolak</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                            aria-labelledby="nav-home-tab">
                            <div class="table-responsive">
                                <table class="table table-hover nowrap" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status Akun</th>
                                            <th class="text-center">Verval</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $adm = mysqli_query($koneksi, "SELECT * FROM user WHERE sts_akun='Tidak Aktif' AND registrasi_status='Antrian'");
                                        ?>
                                        <?php foreach($adm as $a) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a['nama'] ?></td>
                                                <td><?php
                                                        if(empty($a['jenis_kelamin']))
                                                        {
                                                            echo '';
                                                        }
                                                        elseif($a['jenis_kelamin'] == "Laki-Laki")
                                                        {
                                                            echo 'L';
                                                        }
                                                        elseif($a['jenis_kelamin'] == "Perempuan"){
                                                            echo 'P';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $a['username'] ?></td>
                                                <td><?= $a['password'] ?></td>
                                                <td>
                                                    <?php 
                                                        if(empty($a['sts_akun']))
                                                        {
                                                        }
                                                        elseif($a['sts_akun'] == "Aktif")
                                                        {
                                                            echo '<span class="badge bg-success">Aktif</span>';
                                                        }
                                                        elseif($a['sts_akun'] == "Tidak Aktif")
                                                        {
                                                            echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#app<?= $a['id'] ?>" data-bs-toggle="modal"
                                                        class="btn btn-success btn-sm"> <i class="fas fa-check"></i> </a>
                                                </td>
                                                <?php include 'btn_app/verval.php'; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="table-responsive">
                                <table class="table table-hover nowrap" id="example2">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Status Akun</th>
                                            <th class="text-center">Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $no = 1;
                                            $adm = mysqli_query($koneksi, "SELECT * FROM user WHERE sts_akun='Aktif' AND registrasi_status='Terima'");
                                        ?>
                                        <?php foreach($adm as $a) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $a['nama'] ?></td>
                                                <td><?php
                                                        if(empty($a['jenis_kelamin']))
                                                        {
                                                            echo '';
                                                        }
                                                        elseif($a['jenis_kelamin'] == "Laki-Laki")
                                                        {
                                                            echo 'L';
                                                        }
                                                        elseif($a['jenis_kelamin'] == "Perempuan"){
                                                            echo 'P';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?= $a['username'] ?></td>
                                                <td><?= $a['password'] ?></td>
                                                <td>
                                                    <?php 
                                                        if(empty($a['sts_akun']))
                                                        {
                                                        }
                                                        elseif($a['sts_akun'] == "Aktif")
                                                        {
                                                            echo '<span class="badge bg-success">Aktif</span>';
                                                        }
                                                        elseif($a['sts_akun'] == "Tidak Aktif")
                                                        {
                                                            echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                        }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <a href="#info<?= $a['id'] ?>" data-bs-toggle="modal"
                                                        class="btn btn-info btn-sm"> <i class="fas fa-info"></i> </a>
                                                </td>
                                                <?php include 'btn_app/info.php'; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                            <button class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#mergered">
                                Merger Data
                            </button>
                            <?php include 'btn_app/merger.php'; ?>
                                <div class="table-responsive">
                                    <table class="table table-hover nowrap" id="example3">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>JK</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Status Akun</th>
                                                <th class="text-center">Detail</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $no = 1;
                                                $adm = mysqli_query($koneksi, "SELECT * FROM user WHERE sts_akun='Tidak Aktif' AND registrasi_status='Tolak'");
                                            ?>
                                            <?php foreach($adm as $a) : ?>
                                                <tr>
                                                    <td><?= $no++; ?></td>
                                                    <td><?= $a['nama'] ?></td>
                                                    <td><?php
                                                            if(empty($a['jenis_kelamin']))
                                                            {
                                                                echo '';
                                                            }
                                                            elseif($a['jenis_kelamin'] == "Laki-Laki")
                                                            {
                                                                echo 'L';
                                                            }
                                                            elseif($a['jenis_kelamin'] == "Perempuan"){
                                                                echo 'P';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td><?= $a['username'] ?></td>
                                                    <td><?= $a['password'] ?></td>
                                                    <td>
                                                        <?php 
                                                            if(empty($a['sts_akun']))
                                                            {
                                                            }
                                                            elseif($a['sts_akun'] == "Aktif")
                                                            {
                                                                echo '<span class="badge bg-success">Aktif</span>';
                                                            }
                                                            elseif($a['sts_akun'] == "Tidak Aktif")
                                                            {
                                                                echo '<span class="badge bg-danger">Tidak Aktif</span>';
                                                            }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#info<?= $a['id'] ?>" data-bs-toggle="modal"
                                                                class="btn btn-info btn-sm"> <i class="fas fa-info"></i> </a>
                                                    </td>
                                                    <?php include 'btn_app/info.php'; ?>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Title -->
</div>