<div class="container-fluid p-0">
    <!-- Title -->
    <div class="row mb-2 mb-xl-3">
        <div class="col-auto d-none d-sm-block">
            <h3>Rekap Data</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">

                <!-- card header -->
                <div class="card-header">
                    <h5 class="card-title mb-0" style="color: black;">Komponen Komputer</h5>
                </div>

                <!-- container validation alert -->
                <div class="container">
                    <?php
                        if(isset($_SESSION['val']) && $_SESSION['val'] !='')
                        {
                            echo $_SESSION['val'];
                            unset($_SESSION['val']);
                        }
                    ?>

                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add"> <i
                            class="fas fa-plus"></i> Tambah </button>

                    <!-- modal -->

                    <div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false"
                        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Komponen Komputer</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="../proses/save_komponen.php" method="post" enctype="multipart/form-data" autocomplete="off">
                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-2 col-md-2 col-form-label">Nama Alat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_alat" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-2 col-md-2 col-form-label">Jenis Alat</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jenis_alat" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-2 col-md-2 col-form-label">Foto Alat</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="foto_alat" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-3">
                                            <label for="" class="col-sm-2 col-md-2 col-form-label">Jumlah</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="jumlah_alat" class="form-control">
                                            </div>
                                        </div>

                                        <input type="hidden" name="jumlah_terpakai" value="0">

                                        <div class="modal-footer">
                                            <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                            <button type="button" class="btn btn-danger"
                                                data-bs-dismiss="modal">Cancel</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- card body -->
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover nowrap" id="example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Foto Alat</th>
                                    <th>Jumlah</th>
                                    <th>Jumlah Terpakai</th>
                                    <th>Detail</th>
                                    <th>Update</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                    $SQL = "SELECT * FROM komponen_komputer";
                                    $q = mysqli_query($koneksi, $SQL);
                                ?>
                                <?php foreach($q as $data) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['nama_alat'] ?></td>
                                        <td><?= $data['jenis_alat'] ?></td>
                                        <td><img src="../assets/img/komponen/<?= $data['foto_alat'] ?>" width="50"></td>
                                        <td><?= $data['jumlah'] - $data['jumlah_terpakai'] ?></td>
                                        <td><?= $data['jumlah_terpakai'] ?></td>
                                        <td><a href="#info<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-info btn-sm"> <i class="fas fa-info"></i> </a></td>
                                        <td><a href="#update<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-primary btn-sm"> <i class="fas fa-pen"></i> </a></td>
                                        <td><a href="#delete<?= $data['id'] ?>" data-bs-toggle="modal" class="btn btn-danger btn-sm"> <i class="fas fa-trash-alt"></i> </a></td>
                                        <?php
                                            include 'btn_rkp/info.php';
                                            include 'btn_rkp/update.php';
                                            include 'btn_rkp/delete.php';
                                        ?>
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