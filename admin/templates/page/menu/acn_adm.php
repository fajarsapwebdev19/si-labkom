<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Manajemen Akun</h3>
        </div>
    </div>



    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Akun Admin</h5>
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
                                    <th>User Status</th>
                                    <th class="text-center">Block</th>
                                    <th class="text-center">Active</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $adm = mysqli_query($koneksi, "SELECT * FROM user WHERE level='Admin' AND sts_akun='Aktif' AND registrasi_status='Terima' UNION SELECT * FROM user WHERE level='Admin' AND registrasi_status='Terima' AND sts_akun='Tidak Aktif'");
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
                                    <td><?= $a['on_status'] ?></td>
                                    <td class="text-center">
                                        <?php
                                            if(empty($a['sts_akun']))
                                            {

                                            }
                                            elseif($a['sts_akun'] == "Aktif")
                                            {
                                                ?>
                                        <a href="#block<?= $a['id'] ?>" data-bs-toggle="modal"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-window-close"></i> </a>
                                        <?php
                                            }elseif($a['sts_akun'] == "Tidak Aktif")
                                            {
                                                ?>
                                        <button disabled data-bs-toggle="modal"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-window-close"></i> </button>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center">
                                        <?php
                                            if(empty($a['sts_akun']))
                                            {

                                            }
                                            elseif($a['sts_akun'] == "Aktif")
                                            {
                                                ?>
                                        <button disabled data-bs-toggle="modal" class="btn btn-success btn-sm"> <i
                                                class="fas fa-check"></i> </button>
                                        <?php
                                            }elseif($a['sts_akun'] == "Tidak Aktif")
                                            {
                                                ?>
                                        <a href="#active<?= $a['id'] ?>" data-bs-toggle="modal"
                                            class="btn btn-success btn-sm"> <i class="fas fa-check"></i> </a>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                    <td class="text-center"><a href="#delete<?= $a['id'] ?>" data-bs-toggle="modal"
                                            class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </a></td>
                                    <?php include 'btn/block.php';?>
                                    <?php include 'btn/delete.php'; ?>
                                    <?php include 'btn/active.php'; ?>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Title -->
</div>